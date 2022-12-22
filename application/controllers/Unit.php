<?php defined('BASEPATH') or exit ('no direct script access allowed');
    
class unit extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('unit_m');
    }

    public function index()
    {

        $data['row'] = $this->unit_m->get();
        $this->template->load('template','products/units/unit_data', $data);
    }

    public function add()
    {
        $unit = new stdClass(); 
        $unit-> unit_id = null;
        $unit-> name = null;
        $data = array(
            'page' => 'add',
            'row' => $unit
        );
        $this->template->load('template', 'products/units/unit_form', $data);
    }

    public function edit($id){
        $query = $this->unit_m->get($id);
        if($query->num_rows() > 0 ){
            $unit = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $unit
            );
            $this->template->load('template', 'products/units/unit_form', $data);
        }else{
            echo"<script>alert('data tidak dapat ditemukan')</script>";
            echo"<script>window.location='".base_url('unit')."'</script>";
        }
    }

    public function process() {
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['add'])){
            $this->unit_m->add($post);
        }else if(isset($_POST['edit'])){
            $this->unit_m->edit($post);
        }
        
        if($this->db->affected_rows() > 0){
            echo"<script>alert('data berhasil disimpan')</script>";
        }
        echo"<script>window.location='".base_url('unit')."'</script>";
    }


    public function del($id){
        $this->unit_m->del($id);
        $error = $this->db->error();
        if($error['code'] != 0){
            echo"<script>alert('data tidak dapat dihapus (sudah digunakan / berelasi)')</script>";
        }
        else{
            echo"<script>alert('data berhasil dihapus')</script>";
        }
        echo"<script>window.location='".base_url('unit')."'</script>";
    }
}