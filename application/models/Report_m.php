<?php
defined('BASEPATH') or exit ('no direct script access allowed');
    
class Report_m extends CI_Model{

    function getTahun(){
        $query = $this->db->query("SELECT YEAR(date) AS tahun FROM t_sale GROUP BY YEAR(date) ORDER BY YEAR(date) ASC");
        return $query->result();
    }

    function filterTanggal($tglawal, $tglakhir){
        $this->db->select('* , customers.name as customer_name, users.username as user_name, users.nama as namauser,
                                t_sale.created as sale_created');
        $this->db->from('t_sale');
        $this->db->join('customers', 't_sale.customer_id = customers.customer_id', 'left');
        $this->db->join('users', 't_sale.user_id = users.id');
        $this->db->where('date BETWEEN "'.$tglawal.'"and"'.$tglakhir.'"');
        $this->db->order_by('date', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function filterBulan($tahun1, $blnawal, $blnakhir){
        $this->db->select('* , customers.name as customer_name, users.username as user_name, users.nama as namauser,
                                t_sale.created as sale_created');
        $this->db->from('t_sale');
        $this->db->join('customers', 't_sale.customer_id = customers.customer_id', 'left');
        $this->db->join('users', 't_sale.user_id = users.id');
        $this->db->where('YEAR(date) ="'.$tahun1.'"and MONTH(date) BETWEEN "'.$blnawal.'"and"'. $blnakhir.'"');
        $this->db->order_by('date', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }
    function filterTahun($tahun2){
        $this->db->select('* , customers.name as customer_name, users.username as user_name, users.nama as namauser,
                                t_sale.created as sale_created');
        $this->db->from('t_sale');
        $this->db->join('customers', 't_sale.customer_id = customers.customer_id', 'left');
        $this->db->join('users', 't_sale.user_id = users.id');
        $this->db->where('YEAR(date) = "'.$tahun2.'"');
        $this->db->order_by('date', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function get_sale(){
        $this->db->select('* , customers.name as customer_name, users.username as user_name,
                                t_sale.created as sale_created');
        $this->db->from('t_sale');
        $this->db->join('customers', 't_sale.customer_id = customers.customer_id', 'left');
        $this->db->join('users', 't_sale.user_id = users.id');
        $query = $this->db->get();
        return $query;
    }
}