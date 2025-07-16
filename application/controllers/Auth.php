<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property CI_Session $session
 * @property CI_Input $input
 * @property User_model $User_model
 */
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('User_model');
    }

    public function login()
    {
        if ($this->input->post()) {
            $username = $this->input->post('username', true);
            $password = $this->input->post('password', true);

            $user = $this->User_model->get_by_username($username);

            if ($user && md5($password) === $user->password) {
                $this->session->set_userdata('logged_in', true);
                $this->session->set_userdata('username', $user->username);
                redirect('admin');
            } else {
                $this->session->set_flashdata('error', 'Username atau password salah!');
                redirect('auth/login');
            }
        }

        $this->load->view('layouts/headers');
        $this->load->view('auth_login');
        $this->load->view('layouts/footer');
    }

    public function logout()
    {
        $this->session->unset_userdata(['logged_in', 'username']);
        redirect('auth/login');
    }
}
