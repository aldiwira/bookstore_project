<?php

defined('BASEPATH') or exit('No direct script access allowed');

class home extends CI_Controller
{
    private $_userdata;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('home/home_model', 'home');
        $this->load->library('session');
        $this->_userdata = [
            'username'
        ];
    }

    private function showHomePage($data)
    {
        $this->load->view('template/home', $data);
    }

    public function index()
    {
        $data['title'] = "Kamar Buku";
        $data['book'] = $this->home->getDataBook();
        $data['logs'] = $this->session->userdata('level');
        $data['content'] = $this->load->view('home/homepage', $data, true);
        $this->showHomePage($data);
    }
    public function catalog()
    {

        $data['title'] = "Kamar Buku";
        $data['logs'] = $this->session->userdata('level');
        $data['book'] = $this->home->getDataBook();
        $data['content'] = $this->load->view('home/catalog', $data, true);
        $this->showHomePage($data);
    }
    public function detail($id)
    {
        $data['title'] = "Kamar Buku";
        $data['logs'] = $this->session->userdata('level');
        $data['book'] = $this->home->getDataId($id);
        $data['content'] = $this->load->view('home/detail', $data, true);
        $this->showHomePage($data);
    }
    public function buku($id)
    {
        $data['title'] = "Kamar Buku";
        $data['content'] = $this->load->view('home/homepage', $data, true);
        $this->showHomePage($data);
    }
    public function pesan($id)
    {
        if ($this->session->userdata('level') == "user") {
            if ($id != null) {
            } else {
                redirect('home/detail/' + $id);
            }
        } else {
            redirect('login');
        }
    }
}
    
    /* End of file home.php */
