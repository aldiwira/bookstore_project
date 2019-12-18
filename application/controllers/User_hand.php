<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_hand extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('admin/user_handling_model', 'handling');
    }

    private function showAdminTemplate($data)
    {
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('template/footer');
    }

    public function index()
    {
        $data['title'] = "User List";
        $data['user'] = $this->handling->getAllUserData();
        $data['content'] = $this->load->view('admin/user/home', $data, true);
        $this->showAdminTemplate($data);
    }
    public function delete_user($id)
    {
        $this->handling->deleteUser($id);
        redirect('User_hand');
    }
    public function tambah_User()
    {
        $data['title'] = "Admin Ganteng";
        $data['level'] = ['admin', 'user', 'block'];
        $data['content'] = $this->load->view('admin/user/tambah', $data, true);

        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('level', 'level', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->showAdminTemplate($data);
        } else {
            $this->handling->addNewUser();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('User_hand');
        }
    }
    public function ubah_user($id)
    {
        $data['title'] = "user ganteng";
        $data['level'] = ['admin', 'user', 'block'];
        $data['user'] = $this->handling->getIdUserData($id);
        $data['content'] = $this->load->view('admin/user/edit', $data, true);


        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('level', 'level', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->showAdminTemplate($data);
        } else {
            $this->handling->ubah_user();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('User_hand');
        }
    }
}
    
    /* End of file User.php */
