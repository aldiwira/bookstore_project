<?php

use GuzzleHttp\Client;

defined('BASEPATH') or exit('No direct script access allowed');

class login_model extends CI_Model
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

    public function Login_Auth()
    {
        $data = [
            'AUTH-KEY' => '63f9ebbd-4aee-4ba9-870b-0eae47f98103',
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        ];
        $respose = $this->_client->request('GET', 'user', [
            'query' => $data
        ]);
        $result = json_decode($respose->getBody()->getContents(), true);
        return $result['data'][0];
    }
}
    
    /* End of file login_model.php */
