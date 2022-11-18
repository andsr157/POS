<?php defined('BASEPATH') or exit ('no direct script access allowed');
    
class Supplier extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('supplier_m');
    }

    public function index()
    {

        $data['row'] = $this->supplier_m->get();
        $this->template->load('template','suppliers/supplier_data', $data);
    }


    public function del($id){
        $this->supplier_m->del($id);
        if($this->db->affected_rows() > 0){
            echo"<script>alert('data berhasil dihapus')</script>";
        }
        echo"<script>window.location='".base_url('supplier')."'</script>";
    }
}