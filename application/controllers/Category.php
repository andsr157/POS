<?php defined('BASEPATH') or exit ('no direct script access allowed');
    
class category extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('category_m');
    }

    public function index()
    {

        $data['row'] = $this->category_m->get();
        $this->template->load('template','products/categorys/category_data', $data);
    }

    public function add()
    {
        $category = new stdClass(); 
        $category-> category_id = null;
        $category-> name = null;
        $data = array(
            'page' => 'add',
            'row' => $category
        );
        $this->template->load('template', 'products/categorys/category_form', $data);
    }

    public function edit($id){
        $query = $this->category_m->get($id);
        if($query->num_rows() > 0 ){
            $category = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $category
            );
            $this->template->load('template', 'products/categorys/category_form', $data);
        }else{
            echo"<script>alert('data tidak dapat ditemukan')</script>";
            echo"<script>window.location='".base_url('category')."'</script>";
        }
    }

    public function process() {
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['add'])){
            $this->category_m->add($post);
        }else if(isset($_POST['edit'])){
            $this->category_m->edit($post);
        }
        
        if($this->db->affected_rows() > 0){
            echo"<script>alert('data berhasil disimpan')</script>";
        }
        echo"<script>window.location='".base_url('category')."'</script>";
    }


    public function del($id){
        $this->category_m->del($id);
        $error = $this->db->error();
        if($error['code'] != 0){
            echo"<script>alert('data tidak dapat dihapus (sudah digunakan / berelasi)')</script>";
        }
        else{
            echo"<script>alert('data berhasil dihapus')</script>";
        }
        echo"<script>window.location='".base_url('category')."'</script>";
    }
}