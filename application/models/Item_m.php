<?php defined('BASEPATH') or exit ('no direct script access allowed');
    
class item_m extends CI_Model{

    public function get($id=null)
    {
        $this->db->from('p_item');
        if($id != null){
            $this->db->where('item_id', $id);
        }
        $query= $this->db->get();
        return $query;
    }

    public function add($post){
        $params = [ 
            'barcode' => $post['barcode'],
            'name' => $post['name'],
            'category_id' => $post['category'],
            'unit_id' => $post['unit'],
            'price' => $post['price'],
            'weight' => $post['weight'],

        ];
        $this->db->insert('p_item', $params);
    }
     
    public function edit($post){
        $params = [
            'barcode' => $post['barcode'],
            'name' => $post['name'],
            'category_id' => $post['category'],
            'unit_id' => $post['unit'],
            'price' => $post['price'],
            'weight' => $post['weight'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('item_id', $post['id']);
        $this->db->update('p_item', $params);
        
    }



    public function del($id)
    {
        $this->db->where('item_id', $id);
        $this->db->delete('p_item');
    }

    

}