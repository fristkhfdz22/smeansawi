<?php  
 defined('BASEPATH') OR exit('No direct script access allowed');

 class M_login extends CI_Controller{

    public function login($username,$password)
    {
        $this->load->select('*');
        $this->db->form('tbl_user');
        $this->db->where(array(
            'username' =>$username,
            'password' =>$password,
        ));
        return $this->db->get()->row();
    }
 }

