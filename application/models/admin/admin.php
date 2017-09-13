<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Model
{
	
        public function checkauth($username,$password)
        {
            $this->db->select();
            $this->db->from('admin');
            $this->db->where('admin_username',$username);
            $this->db->where('admin_password',$password);
            
            $result = $this->db->get();
            
            return $result->result_array();
        }
	
	
}
?>