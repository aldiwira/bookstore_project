<?php

defined('BASEPATH') or exit('No direct script access allowed');

class user_model extends CI_Model
{

    public function login($username, $password)
    {
        $this->db->select('username, password, level');
        $this->db->from('user');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->limit(1);

        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function register($data)
    {
        $this->db->insert('user', $data);
        return $this->db->affected_rows();
    }


    // User handling method

    public function getAllUserData($id = null)
    {
        if ($id == null) {
            return $this->db->get('user')->result_array();
        } else {
            return $this->db->get_where('user', ['id' => $id])->result_array();
        }
    }
    public function deleteUser($id)
    {
        $this->db->delete('user', ['id' => $id]);
        return $this->db->affected_rows();
    }
    public function createUser($data)
    {
        $this->db->insert('user', $data);
        return $this->db->affected_rows();
    }
    public function updateUser($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('user', $data);
        return true;
    }
}
    
    /* End of file user_model.php */
