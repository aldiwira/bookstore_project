<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Book extends CI_Controller
{

    use REST_Controller {
        REST_Controller::__construct as private __resTraitConstruct;
    }

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->__resTraitConstruct();
        $this->load->model('api/book_model', 'book');
    }

    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $mahasiswa = $this->book->getBook();
        } else {
            $mahasiswa = $this->book->getBook($id);
        }

        if ($mahasiswa) {
            $this->response([
                'status' => "true",
                'data' => $mahasiswa
            ], 200);
        } else {
            $this->response([
                'status' => "false",
                'massage' => 'id not found'
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
            if ($this->book->deleteBook($id) > 0) {
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
            'judul' => $this->post('judul'),
            'tahun_terbit' => $this->post('tahun_terbit'),
            'penulis' => $this->post('penulis'),
            'deskripsi' => $this->post('deskripsi'),
            'harga' => $this->post('harga'),
            'gambar' => $this->post('gambar')
        ];
        if ($this->book->createBook($data) > 0) {
            $this->response([
                'status' => true,
                'massage' => 'New Book has been added'
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
            'judul' => $this->put('judul'),
            'tahun_terbit' => $this->put('tahun_terbit'),
            'penulis' => $this->put('penulis'),
            'deskripsi' => $this->put('deskripsi'),
            'harga' => $this->put('harga'),
            'gambar' => $this->put('gambar')
        ];
        if ($this->book->updateBook($data, $id)) {
            $this->response([
                'status' => true,
                'massage' => 'book has been updated'
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'massage' => 'Failed'
            ], 400);
        }
    }
}
    
    /* End of file book.php */
