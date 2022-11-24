<?php defined('BASEPATH') or exit ('no direct script access allowed');
    
class customer_m extends CI_Model{

    public function get($id=null)
    {
        $this->db->from('customers');
        if($id != null){
            $this->db->where('customer_id', $id);
        }
        $query= $this->db->get();
        return $query;
    }

    public function add($post){
        $params = [
            'name' => $post['name'],
            'gender' => $post['gender'],
            'phone' => $post['phone'],
            'address' => $post['address'],
            
        ];
        $this->db->insert('customers', $params);
    }
    
    public function edit($post){
        $params = [
            'name' => $post['name'],
            'gender' => $post['gender'],
            'phone' => $post['phone'],
            'address' => $post['address'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('customer_id', $post['id']);
        $this->db->update('customers', $params);
        
    }



    public function del($id)
    {
        $this->db->where('customer_id', $id);
        $this->db->delete('customers');
    }

    

}