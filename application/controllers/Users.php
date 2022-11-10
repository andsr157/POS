<?php

use phpDocumentor\Reflection\PseudoTypes\True_;

 defined('BASEPATH') or exit ('no direct script access allowed');
    
class Users extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('user_m');
    }

    public function index()
    {
        $data['row'] = $this->user_m->get();
        $this->template->load('template','users/users_data', $data);
    }

    public function add(){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('username','Username','required|min_length[5]|is_unique[users.username]');
        $this->form_validation->set_rules('password','Password','required|required|min_length[5]');
        $this->form_validation->set_rules('passconf','Konfirmasi Password','required|matches[password]',
            array('matches' => '%s tidak sesuai dengan password'));

        // $this->form_validation->set_rules('email','Email','required|email_valid',
        // array('email_valid' => 'masukan email yang valid'));
        
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('level','Posisi','required');

        $this->form_validation->set_message('required', '%s harus di isi!!');
        $this->form_validation->set_message('min_length', '%s minimal 5 karakter');
        

        $this->form_validation->set_error_delimiters('<span class="text-danger" style="font-size:12px;">','</span>');

        if ($this->form_validation->run() == FALSE){
            $this->template->load('template', 'users/user_form_add');
        }else{
            $post = $this->input->post(null, TRUE);
            $this->user_m->add($post);
            if($this->db->affected_rows() > 0){
                echo"<script>alert('data berhasil disimpan')</script>";
            }
            echo"<script>window.location='".base_url('users')."'</script>";
        }
    }

    public function del()
    {
        $id_name = $this->input->post('user_id');
        $this->user_m->del($id_name);

        if($this->db->affected_rows() > 0){
            echo"<script>alert('data berhasil dihapus')</script>";
        }
        echo"<script>window.location='".base_url('users')."'</script>";
    }
}   