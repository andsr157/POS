<?php defined('BASEPATH') or exit ('no direct script access allowed');
    
class User_m extends CI_Model
{
    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query= $this->db->get();
        return $query;
    }

    public function get($id=null)
    {
        $this->db->from('users');
        if($id != null){
            $this->db->where('id', $id);
        }
        $query= $this->db->get();
        return $query;
    }
}