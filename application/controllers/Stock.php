<?php defined('BASEPATH') or exit ('no direct script access allowed');
    
class Stock extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['item_m', 'supplier_m', 'stock_m']);
    }

    public function stock_in_data(){
        $data['row'] = $this->stock_m->get_stock_in()->result();
        $this->template->load('template', 'transaction/stock_in/stock_in_data', $data);
     }
    public function stock_in_add(){
        $item = $this->item_m->get()->result();
        $suppplier = $this->supplier_m->get()->result();
        $data = ['item' => $item, 'supplier' => $suppplier];
        $this->template->load('template', 'transaction/stock_in/stock_in_form', $data);
    }

    public function stock_in_del(){
        $stock_id = $this->uri->segment(4);
        $item_id = $this->uri->segment(5);
        $qty = $this->stock_m->get($stock_id)->row()->qty;
        $data = ['qty'=> $qty, 'item_id'=>$item_id];
        $this->item_m->update_stock_out($data);

        $this->stock_m->del($stock_id);
        
        if($this->db->affected_rows() > 0){
            echo"<script>alert('data berhasil dihapus')</script>";
        }
        redirect('stock/in');
    }

<<<<<<< HEAD
=======
    public function stock_out_data(){
        $this->template->load('template', 'transaction/stock_out/stock_out_data');
    }


>>>>>>> dc4407ecb62a1a6a991894219b119436244ec24d
    public function process(){
        if(isset($_POST['in_add'])){
            $post = $this->input->post(null, TRUE);
            $this->stock_m->add_stock_in($post);
            $this->item_m->update_stock_in($post);
            if($this->db->affected_rows() > 0){
<<<<<<< HEAD
                echo"<script>alert(Data Stock In berhasil disimpan)</script>";
=======
                echo"<script> alert('data berhasil disimpan')</script>";
>>>>>>> dc4407ecb62a1a6a991894219b119436244ec24d
            }
            redirect('stock/in');
        }

        if(isset($_POST['out_add'])){
            $post = $this->input->post(null, TRUE); 
            $row_item = $this->item_m->get($this->input->post('item_id'))->row();
            if($row_item->stock < $this->input->post('qty')){
                echo"<script> alert('Qty Melebihi Stok')</script>";
                echo"<script>window.location='".base_url('stock/out/add')."'</script>";
            }else{
                $this->stock_m->add_stock_out($post);
                $this->item_m->update_stock_out($post);
                if($this->db->affected_rows() > 0){
                    echo"<script>alert('Data Stock In berhasil disimpan')</script>";
                }
                echo"<script>window.location='".base_url('stock/out')."'</script>";
            }
            
        }
    }


    public function stock_out_data(){
        $data['row'] = $this->stock_m->get_stock_out()->result();
        $this->template->load('template', 'transaction/stock_out/stock_out_data', $data);
     }
    public function stock_out_add(){
        $item = $this->item_m->get()->result();
        $data = ['item' => $item];
        $this->template->load('template', 'transaction/stock_out/stock_out_form', $data);
    }

    public function stock_out_del(){
        $stock_id = $this->uri->segment(4);
        $item_id = $this->uri->segment(5);
        $qty = $this->stock_m->get($stock_id)->row()->qty;
        $data = ['qty'=> $qty, 'item_id'=>$item_id];
        $this->item_m->update_stock_in($data);

        $this->stock_m->del($stock_id);
        
        if($this->db->affected_rows() > 0){
            echo"<script>alert('data berhasil dihapus')</script>";
        }
        echo"<script>window.location='".base_url('stock/out')."'</script>";
    }
}