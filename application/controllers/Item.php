<?php defined('BASEPATH') or exit ('no direct script access allowed');
    
class Item extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['item_m','category_m','unit_m']);
    }

    public function index()
    {

        $data['row'] = $this->item_m->get();
        $this->template->load('template','products/items/item_data', $data);
    }

    public function add()
    {
        $item = new stdClass(); 
        $item-> item_id = null;
        $item-> barcode = null;
        $item-> name = null;
        $item-> price = null;
        $item-> weight = null;

        $query_category = $this->category_m->get();

        $query_unit = $this->unit_m->get();

        $unit[null]= '-Pilih-';
        foreach($query_unit->result() as $unt){
            $unit[$unt->unit_id] = $unt->name;
        };

        $data = array(
            'page' => 'add',
            'row' => $item,
            'category' => $query_category,
            'unit'=> $unit, 'selectedunit' => null,

        );
        $this->template->load('template', 'products/items/item_form', $data);
    }

    public function edit($id){
        $query = $this->item_m->get($id);
        if($query->num_rows() > 0 ){
            $item = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $item
            );
            $this->template->load('template', 'products/items/item_form', $data);
        }else{
            echo"<script>alert('data tidak dapat ditemukan')</script>";
            echo"<script>window.location='".base_url('item')."'</script>";
        }
    }

    public function process() {
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['add'])){
            $this->item_m->add($post);
        }else if(isset($_POST['edit'])){
            $this->item_m->edit($post);
        }
        
        if($this->db->affected_rows() > 0){
            echo"<script>alert('data berhasil disimpan')</script>";
        }
        echo"<script>window.location='".base_url('item')."'</script>";
    }


    public function del($id){
        $this->item_m->del($id);
        if($this->db->affected_rows() > 0){
            echo"<script>alert('data berhasil dihapus')</script>";
        }
        echo"<script>window.location='".base_url('item')."'</script>";
    }
}