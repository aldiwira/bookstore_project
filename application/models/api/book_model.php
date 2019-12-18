<?php

defined('BASEPATH') or exit('No direct script access allowed');

class book_model extends CI_Model
{

    public function getBook($id = null)
    {
        if ($id == null) {
            return $this->db->get('book_list')->result_array();
        } else {
            return $this->db->get_where('book_list', ['id' => $id])->result_array();
        }
    }
    public function deleteBook($id)
    {
        $this->db->delete('book_list', ['id' => $id]);
        return $this->db->affected_rows();
    }
    public function createBook($data)
    {
        $this->db->insert('book_list', $data);
        return $this->db->affected_rows();
    }
    public function updateBook($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('book_list', $data);
        return true;
    }
}
    
    /* End of file Mahasiswa_model.php */
