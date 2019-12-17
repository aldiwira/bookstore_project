<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('welcome_model', 'welcome');
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function index()
	{
		$data['buku'] = $this->welcome->getAllBook();
		$this->load->view('./mahasiswa/header');
		$this->load->view('./mahasiswa/home', $data);
		$this->load->view('./mahasiswa/footer');
	}
	public function detail($id)
	{
		$data['buku'] = $this->welcome->getbyidBook($id);
		$this->load->view('./mahasiswa/header');
		$this->load->view('./mahasiswa/detail', $data);
		$this->load->view('./mahasiswa/footer');
	}
	public function tambah()
	{
		$this->form_validation->set_rules('judul', 'judul', 'required');
		$this->form_validation->set_rules('tahun_terbit', 'tahun_terbit', 'required');
		$this->form_validation->set_rules('penulis', 'penulis', 'required');
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
		$this->form_validation->set_rules('harga', 'harga', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('./mahasiswa/header');
			$this->load->view('./mahasiswa/tambah');
			$this->load->view('./mahasiswa/footer');
		} else {
			$this->welcome->addNewBook();
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('admin');
		}
	}
	public function ubah($id)
	{
		$data['book'] = $this->welcome->getbyidBook($id);
		$this->form_validation->set_rules('judul', 'judul', 'required');
		$this->form_validation->set_rules('tahun_terbit', 'tahun_terbit', 'required');
		$this->form_validation->set_rules('penulis', 'penulis', 'required');
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
		$this->form_validation->set_rules('harga', 'harga', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('./mahasiswa/header');
			$this->load->view('./mahasiswa/ubah', $data);
			$this->load->view('./mahasiswa/footer');
		} else {
			$this->welcome->ubahBook();
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('admin');
		}
	}
	public function delete($id)
	{
		$this->welcome->deleteById($id);
		redirect('admin');
	}
	public function login()
	{
		$this->load->view('./mahasiswa/header');
		$this->load->view('./mahasiswa/login');
		$this->load->view('./mahasiswa/footer');
	}
}
