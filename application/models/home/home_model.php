<?php

use GuzzleHttp\Client;

defined('BASEPATH') or exit('No direct script access allowed');

class home_model extends CI_Model
{
    private $_client;
    public function __construct()
    {
        parent::__construct();
        $this->_client = new Client([
            'base_uri' => 'http://localhost/bookstore_project_server/api/',
            'http_errors' => false
        ]);
    }

    public function getDataBook($judul = null)
    {
        $response = $this->_client->request('GET', 'book', [
            'query' => [
                'AUTH-KEY' => '63f9ebbd-4aee-4ba9-870b-0eae47f98103'
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    public function searchBook($judul = null)
    {
        $response = $this->_client->request('GET', 'book/search', [
            'query' => [
                'AUTH-KEY' => '63f9ebbd-4aee-4ba9-870b-0eae47f98103',
                'judul' => $judul
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
    public function getDataId($id)
    {
        $response = $this->_client->request('GET', 'book', [
            'query' => [
                'AUTH-KEY' => '63f9ebbd-4aee-4ba9-870b-0eae47f98103',
                'id' => $id
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'][0];
    }
    public function getPesanan($id)
    {
        $response = $this->_client->request('GET', 'transaksi/all', [
            'query' => [
                'AUTH-KEY' => '63f9ebbd-4aee-4ba9-870b-0eae47f98103',
                'id_user' => $id
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }
    public function inputPesanan($ko)
    {
        $data = [
            'id_user' => $ko['id_user'],
            'id_buku' => $ko['id_buku'],
            'harga' => $ko['harga'],
            'status_transaksi' => '0',
            'qty' => $ko['qty'],
            'AUTH-KEY' => 'ea6185df-b1af-4b1a-b1db-f83470297173'
        ];
        $respone = $this->_client->request('POST', 'transaksi', [
            'form_params' => $data
        ]);
        $result = json_decode($respone->getBody()->getContents(), true);
        return $result;
    }
    public function deletePesanan($id)
    {
        $respone = $this->_client->request('DELETE', 'transaksi', [
            'form_params' => [
                'id_transaksi' => $id,
                'AUTH-KEY' => 'ea6185df-b1af-4b1a-b1db-f83470297173'
            ]
        ]);
        $result = json_decode($respone->getBody()->getContents(), true);
        return $result;
    }
}
    
    /* End of file home_model.php */
