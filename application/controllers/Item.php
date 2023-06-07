<?php defined('BASEPATH') or exit ('no direct script access allowed');
    require APPPATH . '/libraries/REST_Controller.php';
    use Restserver\Libraries\REST_Controller;
class Item extends REST_Controller{

    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model(['item_m','category_m','unit_m']);
    }

    function index_get(){
        $data = $this->item_m->get();
        $this->response($data, 200);
    }

    // public function index()
    // {

    //     $data['row'] = $this->item_m->get();
    //     $this->template->load('template','products/items/item_data', $data);
    // }

    public function add()
    {
        $item = new stdClass(); 
        $item-> item_id = null;
        $item-> barcode = null;
        $item-> name = null;
        $item-> price = null;
        $item-> category_id = null;

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
            $query_category = $this->category_m->get();

            $query_unit = $this->unit_m->get();

            $unit[null]= '-Pilih-';
            foreach($query_unit->result() as $unt){
                $unit[$unt->unit_id] = $unt->name;
            };

            $data = array(
                'page' => 'edit',
                'row' => $item,
                'category' => $query_category,
                'unit'=> $unit, 'selectedunit' => $item->unit_id,

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
            if($this->item_m->check_barcode($post['barcode'])->num_rows() > 0){
                echo"<script>alert('barcode sudah dipakai barang lain')</script>";
                echo"<script>window.location='".base_url('item/add')."'</script>";
            }else{
                $this->item_m->add($post); 
            }
        }else if(isset($_POST['edit'])){
            if($this->item_m->check_barcode($post['barcode'], $post['id'])->num_rows() > 0){
                echo"<script>alert('barcode sudah dipakai barang lain')</script>";
                echo"<script>window.location='".base_url('item/edit/'.$post['id'])."'</script>";
            }else{
                $this->item_m->edit($post);
            }

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

    function barcode_qrcode($id){
        $data['row'] = $this->item_m->get($id)->row();
        $this->template->load('template','products/items/barcode_qrcode', $data);
    }

    function barcode_print($id){
        $data['row'] = $this->item_m->get($id)->row();
        $html = $this->load->view('products/items/barcode_print', $data, true);
        $this->lvalidasi->pdfGenerator($html,'barcode-'.$data['row']->barcode, 'A4', 'landscape');
    }

    function qrcode_print($id){
        $data['row'] = $this->item_m->get($id)->row();
        $html = $this->load->view('products/items/qrcode_print', $data, true);
        $this->lvalidasi->pdfGenerator($html,'qrcode-'.$data['row']->barcode, 'A4', 'potrait');
    }

}