<?php

defined('BASEPATH') or exit('No direct script access allowed');

class home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('home/home_model', 'home');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('cart');
    }

    private function showHomePage($data)
    {
        $this->load->view('template/home', $data);
    }

    public function index()
    {
        $data['title'] = "Kamar Buku";
        $data['book'] = $this->home->getDataBook();
        $data['pesanan'] = $this->home->getPesanan($this->session->userdata('id'));
        $data['logs'] = $this->session->userdata('level');
        $data['content'] = $this->load->view('home/homepage', $data, true);
        $this->showHomePage($data);
    }
    public function catalog()
    {

        $data['title'] = "Kamar Buku";
        $data['logs'] = $this->session->userdata('level');
        $data['pesanan'] = $this->home->getPesanan($this->session->userdata('id'));
        $data['book'] = $this->home->getDataBook();
        $data['content'] = $this->load->view('home/catalog', $data, true);
        $this->showHomePage($data);
    }
    public function detail($id)
    {
        $data['title'] = "Kamar Buku";
        $data['logs'] = $this->session->userdata('level');
        $data['pesanan'] = $this->home->getPesanan($this->session->userdata('id'));
        $data['book'] = $this->home->getDataId($id);
        $data['content'] = $this->load->view('home/detail', $data, true);
        $this->showHomePage($data);
    }
    public function pesan($id)
    {
        if ($this->session->userdata('level') == "user") {
            $buku = $this->db->get_where('book_list', array('id' => $id))->row();
            $jumlah = $this->input->post('stok');
            $data = array(
                'id'      => $id,
                'qty'     => $jumlah,
                'price'   => $buku->harga,
                'name'    => $buku->judul
            );
            $this->cart->insert($data);
            redirect('home/cart', 'refresh');
        } else {
            redirect('login', 'refresh');
        }
    }
    public function deletCart($id)
    {
        $data = array(
            'rowid'   => $id,
            'qty'     => 0
        );

        $this->cart->update($data);
        redirect('home/cart', 'refresh');
    }
    public function cart()
    {
        $data['title'] = "Kamar Buku";
        $data['pesanan'] = $this->home->getPesanan($this->session->userdata('id'));
        $data['logs'] = $this->session->userdata('level');
        $data['content'] = $this->load->view('home/cart', $data, true);
        $this->showHomePage($data);
    }
    public function pesan_proses()
    {
        foreach ($this->cart->contents() as $key) {
            $data = [
                'id_user' => $this->session->userdata('id'),
                'id_buku' => $key['id'],
                'harga' => $key['price'],
                'qty' => $key['qty']
            ];
            $this->home->inputPesanan($data);
            $this->deletCart($key['rowid']);
        }

        redirect('home/pesanan', 'refresh');
    }
    public function deletePesanan($id)
    {
        $this->home->deletePesanan($id);
        redirect('home/pesanan', 'refresh');
    }
    public function pesanan()
    {
        $data['title'] = "Kamar Buku";
        $data['logs'] = $this->session->userdata('level');
        $data['logs1'] = $this->session->userdata('id');
        $data['pesanan'] = $this->home->getPesanan($this->session->userdata('id'));
        $data['content'] = $this->load->view('home/pesanan', $data, true);
        $this->showHomePage($data);
    }
}
    
    /* End of file home.php */
