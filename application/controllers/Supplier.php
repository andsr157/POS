<?php defined('BASEPATH') or exit ('no direct script access allowed');
    
class Supplier extends CI_Controller{

    public function index()
    {
        $this->template->load('template','supplier_page');
    }
}