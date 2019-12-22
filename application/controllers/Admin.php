<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/admin_model', 'admin');
        $this->load->library('form_validation');
        $this->load->library('session');
        if ($this->session->userdata('level') != "admin") {
            redirect('home', 'refresh');
        }
    }

    private function showAdminTemplate($data)
    {
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('template/footer');
    }

    public function index()
    {
        $data['title'] = "Admin Ganteng";
        $data['book'] = $this->admin->getAllBook();
        $data['content'] = $this->load->view('admin/home', $data, true);
        if ($this->input->post('keyword')) {
            $data['book'] = $this->admin->deleteById();
        }
        $this->showAdminTemplate($data);
    }
    public function delete_book($id)
    {
        $this->admin->deleteById($id);
        redirect('admin');
    }
    public function ubahdata($id)
    {
        $data['title'] = "Admin Ganteng";
        $data['book'] = $this->admin->getbyidBook($id);
        $data['content'] = $this->load->view('admin/ubah', $data, true);


        $this->form_validation->set_rules('judul', 'judul', 'required');
        $this->form_validation->set_rules('tahun_terbit', 'tahun_terbit', 'required');
        $this->form_validation->set_rules('penulis', 'penulis', 'required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->showAdminTemplate($data);
        } else {
            $this->admin->ubahBook();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('admin');
        }
    }
    public function detailbuku($id)
    {
        $data['title'] = "admin ganteng";
        $data['buku'] = $this->admin->getbyidBook($id);
        $data['content'] = $this->load->view('admin/detail', $data, true);
        $this->showAdminTemplate($data);
    }
    public function addNewBook()
    {
        $data['title'] = "Admin Ganteng";
        $data['content'] = $this->load->view('admin/tambah', $data, true);

        $this->form_validation->set_rules('judul', 'judul', 'required');
        $this->form_validation->set_rules('tahun_terbit', 'tahun_terbit', 'required');
        $this->form_validation->set_rules('penulis', 'penulis', 'required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');

        if ($this->form_validation->run() == false) {
            $this->showAdminTemplate($data);
        } else {
            $this->admin->addNewBook();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin');
        }
    }
}
    
    /* End of file Admin.php */
