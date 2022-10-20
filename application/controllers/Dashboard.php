<?php defined('BASEPATH') or exit ('no direct script access allowed');
    
class Dashboard extends CI_Controller{

    public function index()
    {
        $this->template->load('template','dashboard');
    }
}