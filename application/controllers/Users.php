<?php defined('BASEPATH') or exit ('no direct script access allowed');
    
class Users extends CI_Controller{

    public function index()
    {
        check_not_login();

        $this->load->model('user_m');
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
            echo"SUCCESS";
        }
    }
}   