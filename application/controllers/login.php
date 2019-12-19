<?php

defined('BASEPATH') or exit('No direct script access allowed');

class login extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('login/login_model', 'login');
        $this->load->library('form_validation');
        $this->load->library('session');
    }


    public function index()
    {
        $data['title'] = "Login";
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('login/home', $data);
            $this->load->view('template/footer');
        } else {
            $cek = $this->login->Login_Auth();
            $this->session->set_userdata('user', $cek['username']);
            $this->session->set_userdata('level', $cek['level']);
            if ($this->session->userdata('level') == "admin") {
                redirect('admin');
            } else {
                $data['pesan'] = "username dan password anda salah";
                redirect('login');
            }
        }
    }
    public function register()
    {
        $data['title'] = "Register";
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('login/regis', $data);
            $this->load->view('template/footer');
        } else {
            $cek = $this->login->Login_Auth();
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login', 'refresh');
    }
}
    
    /* End of file login.php */
