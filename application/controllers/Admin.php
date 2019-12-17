<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model', 'admin');
        $this->load->library('form_validation');
        $this->load->library('session');
    }


    public function index()
    {
        $data['title'] = "Admin Ganteng";
        $data['book'] = $this->admin->getAllBook();
        $data['content'] = $this->load->view('admin/home', $data, true);
        if ($this->input->post('keyword')) {
            $data['book'] = $this->admin->deleteById();
        }
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('template/footer');
    }
}
    
    /* End of file Admin.php */
