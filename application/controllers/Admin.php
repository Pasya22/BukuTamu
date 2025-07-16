<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @property CI_Form_validation $form_validation
 * @property CI_Session $session
 * @property Guest_model $Guest_model
 * @property CI_Input $input
 */
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Guest_model');
        $this->load->helper('url');

        // if (! $this->session->userdata('logged_in')) {
        //     redirect('auth/login');
        // }
        // if (! is_admin_logged_in()) {
        //     show_404();  
        // }
    }

    public function index()
    {
        $filter_date    = $this->input->get('date');
        $data['guests'] = $this->Guest_model->get_all($filter_date);

        $this->load->view('layouts/headers');
        $this->load->view('admin_dashboard', $data);
        $this->load->view('layouts/footer');
    }

    public function export()
    {
        header("Content-Type: text/csv");
        header("Content-Disposition: attachment; filename=guestbook.csv");

        $guests = $this->Guest_model->get_all();
        $f      = fopen('php://output', 'w');
        fputcsv($f, ['Nama', 'Email', 'Pesan', 'Tanggal']);

        foreach ($guests as $g) {
            fputcsv($f, [$g->name, $g->email, $g->message, $g->created_at]);
        }
        fclose($f);
    }

    public function create()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('message', 'Pesan', 'required');

        if ($this->form_validation->run() === false) {
            $this->load->view('layouts/headers');
            $this->load->view('admin_create_form');
            $this->load->view('layouts/footer');
        } else {
            $data = [
                'name'       => $this->input->post('name', true),
                'email'      => $this->input->post('email', true),
                'message'    => $this->input->post('message', true),
                'created_at' => date('Y-m-d H:i:s'),
            ];

            $this->Guest_model->insert($data);
            $this->session->set_flashdata('success', 'Data buku tamu berhasil ditambahkan.');
            redirect('admin');
        }
    }

}
