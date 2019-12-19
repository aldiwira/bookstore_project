<?php

use GuzzleHttp\Client;

defined('BASEPATH') or exit('No direct script access allowed');

class admin_model extends CI_Model
{

    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/bookstore_project/api/',
            'http_errors' => false
        ]);
    }
    private function _uploadImage($nama)
    {
        $config['upload_path']          = './assets/upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $nama;
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('input_gambar')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }

    private function _deleteImage($id)
    {
        $product = $this->getbyidBook($id);
        var_dump($product['gambar']);
        if ($product['gambar'] != "default.jpg") {
            $filename = explode(".", $product['gambar'])[0];
            return array_map('unlink', glob(FCPATH . "assets/upload/$filename.*"));
        }
    }


    public function getAllBook()
    {
        $respose = $this->_client->request('GET', 'book');
        $result = json_decode($respose->getBody()->getContents(), true);
        return $result['data'];
    }
    public function getbyidBook($id)
    {
        $respone = $this->_client->request('GET', 'book', [
            'query' => [
                'id' => $id
            ]
        ]);
        $result = json_decode($respone->getBody()->getContents(), true);
        return $result['data'][0];
    }
    public function deleteById($id)
    {
        $this->_deleteImage($id);
        $respone = $this->_client->request('DELETE', 'book', [
            'form_params' => [
                'id' => $id
            ]
        ]);
        $result = json_decode($respone->getBody()->getContents(), true);
        return $result;
    }
    public function addNewBook()
    {
        $data = [
            'judul' => $this->input->post('judul'),
            'tahun_terbit' => $this->input->post('tahun_terbit'),
            'penulis' => $this->input->post('penulis'),
            'deskripsi' => $this->input->post('deskripsi'),
            'harga' => $this->input->post('harga'),
            'gambar' => $this->_uploadImage($this->input->post('judul'))
        ];
        $respone = $this->_client->request('POST', 'book', [
            'form_params' => $data
        ]);
        $result = json_decode($respone->getBody()->getContents(), true);
        return $result;
    }
    public function ubahBook()
    {
        if (!empty($_FILES["input_gambar"])) {
            $imgae = $this->_uploadImage($this->input->post('judul'));
        } else {
            $imgae = $this->input->post('old_image');;
        }
        $data = [
            'id' => $this->input->post('id'),
            'judul' => $this->input->post('judul'),
            'tahun_terbit' => $this->input->post('tahun_terbit'),
            'penulis' => $this->input->post('penulis'),
            'deskripsi' => $this->input->post('deskripsi'),
            'harga' => $this->input->post('harga'),
            'gambar' => $imgae
        ];
        $respone = $this->_client->request('PUT', 'book', [
            'form_params' => $data
        ]);
        $result = json_decode($respone->getBody()->getContents(), true);
        return $result;
    }
}
    
    /* End of file welcome_model.php */
