<?php defined('BASEPATH') or exit('no direct script access allowed');

class Supplier_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('suppliers');
        if ($id != null) {
            $this->db->where('supplier_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'nama' => $post['nama'],
            'phone' => $post['phone'],
            'address' => $post['address'],
            'description' => empty($post['description']) ? null : $post['description']

        ];
        $this->db->insert('suppliers', $params);
    }

    public function edit($post)
    {
        $params = [
            'nama' => $post['nama'],
            'phone' => $post['phone'],
            'address' => $post['address'],
            'description' => empty($post['description']) ? null : $post['description'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('supplier_id', $post['id']);
        $this->db->update('suppliers', $params);
    }



    public function del($id)
    {
        $this->db->where('supplier_id', $id);
        $this->db->delete('suppliers');
    }
}
