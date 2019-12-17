<?php

defined('BASEPATH') or exit('No direct script access allowed');

class login extends CI_Controller
{

    public function index()
    {
        $this->load->view('mahasiswa/header');
        $this->load->view('mahasiswa/login');
        $this->load->view('mahasiswa/footer');
    }
}
    
    /* End of file login.php */
