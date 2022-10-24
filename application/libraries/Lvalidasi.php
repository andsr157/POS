<?php

class Lvalidasi{
    protected $ci;

    function __construct()
    {
        $this->ci =& get_instance();
    }

    function user_login(){
        $this->ci->load->model('user_m');
        $userid = $this->ci->session->userdata('user_id');
        $user_data = $this->ci->user_m->get($userid)->row();
        return $user_data;
    }
}