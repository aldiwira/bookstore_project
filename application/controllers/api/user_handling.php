<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class user_handling extends CI_Controller
{

    use REST_Controller {
        REST_Controller::__construct as private __resTraitConstruct;
    }

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->__resTraitConstruct();
        $this->load->model('api/user_model', 'user');
    }
    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $userlist = $this->user->getAllUserData();
        } else {
            $userlist = $this->user->getAllUserData($id);
        }
        if ($userlist) {
            $this->response([
                'status' => 'true',
                'data' => $userlist
            ], 200);
        } else {
            $this->response([
                'status' => 'false',
                'massage' => 'user not found'
            ], 404);
        }
    }
    public function index_delete()
    {
        $id = $this->delete('id');
        if ($id === null) {
            $this->response([
                'status' => "false",
                'massage' => 'provide an id!'
            ], 404);
        } else {
            if ($this->user->deleteUser($id) > 0) {
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'massage' => 'Deleted'
                ], 200);
            } else {
                $this->response([
                    'status' => false,
                    'massage' => 'id not found'
                ], 400);
            }
        }
    }
    public function index_post()
    {
        $data = [
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'level' => $this->input->post('level')
        ];
        if ($this->user->createUser($data) > 0) {
            $this->response([
                'status' => true,
                'massage' => 'New user has been added'
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'massage' => 'Failed'
            ], 400);
        }
    }
    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'id' => $this->put('id'),
            'username' => $this->put('username'),
            'password' => $this->put('password'),
            'level' => $this->put('level')
        ];
        if ($this->user->updateUser($data, $id)) {
            $this->response([
                'status' => true,
                'massage' => 'user has been updated'
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'massage' => 'Failed'
            ], 400);
        }
    }
}
    
    /* End of file user_handling.php */
