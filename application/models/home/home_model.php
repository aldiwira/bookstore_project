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
}
    
    /* End of file home_model.php */
