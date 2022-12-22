<?php defined('BASEPATH') or exit ('no direct script access allowed');
    
class Report extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('sale_m');
        $this->load->model('report_m');
    }

    public function sAle()
    {

        $data['row'] = $this->sale_m->get_sale();
        $this->template->load('template','report/sale_report', $data);
    }


    public function sale_product($sale_id= null){
        $detail = $this->sale_m->get_sale_detail($sale_id)->result();
        echo json_encode($detail);
    }



    public function filterReport(){
        $data['tahun'] = $this->report_m->getTahun();


        $this->template->load('template','report/report_filter', $data);
    }

    function filter(){
        $tanggalawal = $this->input->post('tanggalawal');
        $tanggalakhir = $this->input->post('tanggalakhir');
        $tahun1 = $this->input->post('tahun1');
        $bulanawal = $this->input->post('bulanawal');
        $bulanakhir = $this->input->post('bulanakhir');
        $tahun2 = $this->input->post('tahun2');
        $nilaifilter = $this->input->post('nilaifilter');

        if($nilaifilter == 1){
            $data['title']='laporan by tanggal';
            $data['subtitle']='Dari tanggal:'.$tanggalawal.'-'.$tanggalakhir;
            $data['datafilter'] = $this->report_m->filterTanggal($tanggalawal, $tanggalakhir);
            $this->load->view('report/print', $data);
        }else if($nilaifilter == 2){
            $data['title']='laporan by bulan';
            $data['subtitle']='Dari bulan:'.$bulanawal.'-'.$bulanakhir.'tahun '.$tahun1;
            $data['datafilter'] = $this->report_m->filterBulan($tahun1, $bulanawal, $bulanakhir);
            $this->load->view('report/print', $data);
        } else if($nilaifilter == 3){
            $data['title']='laporan by tahun';
            $data['subtitle']='tahun :'.$tahun2;
            $data['datafilter'] = $this->report_m->filterTahun($tahun2);
            $this->load->view('report/print', $data);
        }
    }
}