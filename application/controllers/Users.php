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
        $this->template->load('template', 'users/user_new');
    }
}