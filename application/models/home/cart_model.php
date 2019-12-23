<?php

defined('BASEPATH') or exit('No direct script access allowed');

class cart_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
    }

    public function addToCart($data)
    {
        $this->cart->insert($data);
    }
}
    
    /* End of file cart_model.php */
