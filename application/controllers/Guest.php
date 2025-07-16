<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @property CI_Form_validation $form_validation
 * @property CI_Session $session
 * @property Guest_model $Guest_model
 * @property CI_Input $input
 */
class Guest extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Guest_model');
        $this->load->helper(['form', 'url']);
        $this->load->library('form_validation');

        // if (! is_admin_logged_in()) {
        //     show_404();  
        // }
    }

    public function index()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[guests.email]');
        $this->form_validation->set_message([
            'is_unique' => '{field} sudah pernah digunakan.',
        ]);
        $this->form_validation->set_rules('message', 'Pesan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layouts/headers');
            $this->load->view('guest_form');
            $this->load->view('layouts/footer');
        } else {
            $data = [
                'name'       => $this->input->post('name', true),
                'email'      => $this->input->post('email', true),
                'message'    => $this->input->post('message', true),
                'created_at' => date('Y-m-d H:i:s'),
            ];
            $this->Guest_model->insert($data);
            $this->session->set_flashdata('success', 'Pesan berhasil dikirim!');
            redirect('Guest');
        }
    }
}
