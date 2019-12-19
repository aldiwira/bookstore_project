<?php

use GuzzleHttp\Client;

defined('BASEPATH') or exit('No direct script access allowed');

class user_handling_model extends CI_Model
{
    private $_client;


    public function __construct()
    {
        parent::__construct();
        $this->_client = new Client([
            'base_uri' => 'http://localhost/bookstore_project/api/',
            'http_errors' => false
        ]);
    }
    public function getAllUserData()
    {
        $respose = $this->_client->request('GET', 'user_handling');
        $result = json_decode($respose->getBody()->getContents(), true);
        return $result['data'];
    }
    public function getIdUserData($id = null)
    {
        $respose = $this->_client->request('GET', 'user_handling', [
            'query' => [
                'id' => $id
            ]
        ]);
        $result = json_decode($respose->getBody()->getContents(), true);
        return $result['data'][0];
    }
    public function deleteUser($id)
    {
        $respone = $this->_client->request('DELETE', 'user_handling', [
            'form_params' => [
                'id' => $id
            ]
        ]);
        $result = json_decode($respone->getBody()->getContents(), true);
        return $result;
    }
    public function addNewUser()
    {
        $data = [
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'level' => $this->input->post('level')
        ];
        $respone = $this->_client->request('POST', 'user_handling', [
            'form_params' => $data
        ]);
        $result = json_decode($respone->getBody()->getContents(), true);
        return $result;
    }
    public function ubah_user()
    {
        $data = [
            'id' => $this->input->post('id'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'level' => $this->input->post('level')
        ];
        $respone = $this->_client->request('PUT', 'user_handling', [
            'form_params' => $data
        ]);
        $result = json_decode($respone->getBody()->getContents(), true);
        return $result;
    }
}
    
    /* End of file user_handling_model.php */
