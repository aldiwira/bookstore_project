<?php

use GuzzleHttp\Client;

defined('BASEPATH') or exit('No direct script access allowed');

class admin_model extends CI_Model
{

    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/bookstore_project/api/'
        ]);
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
            'harga' => $this->input->post('harga')
        ];
        $respone = $this->_client->request('POST', 'book', [
            'form_params' => $data
        ]);
        $result = json_decode($respone->getBody()->getContents(), true);
        return $result;
    }
    public function ubahBook()
    {
        $data = [
            'id' => $this->input->post('id'),
            'judul' => $this->input->post('judul'),
            'tahun_terbit' => $this->input->post('tahun_terbit'),
            'penulis' => $this->input->post('penulis'),
            'deskripsi' => $this->input->post('deskripsi'),
            'harga' => $this->input->post('harga'),
        ];
        $respone = $this->_client->request('PUT', 'book', [
            'form_params' => $data
        ]);
        $result = json_decode($respone->getBody()->getContents(), true);
        return $result;
    }
}
    
    /* End of file welcome_model.php */
