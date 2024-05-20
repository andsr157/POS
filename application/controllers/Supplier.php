<?php defined('BASEPATH') or exit('no direct script access allowed');

class Supplier extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('supplier_m');
    }

    public function index()
    {

        $data['row'] = $this->supplier_m->get();
        $this->template->load('template', 'suppliers/supplier_data', $data);
    }

    public function add()
    {
        $supplier = new stdClass();
        $supplier->supplier_id = null;
        $supplier->nama = null;
        $supplier->phone = null;
        $supplier->address = null;
        $supplier->description = null;
        $data = array(
            'page' => 'add',
            'row' => $supplier
        );
        $this->template->load('template', 'suppliers/supplier_form_add', $data);
    }

    public function edit($id)
    {
        $query = $this->supplier_m->get($id);
        if ($query->num_rows() > 0) {
            $supplier = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $supplier
            );
            $this->template->load('template', 'suppliers/supplier_form_add', $data);
        } else {
            $this->session->set_flashdata('data not found', "<script>Swal.fire({icon: 'error',text: 'data tidak dapat ditemukan'})</script>");
            echo "<script>window.location='" . base_url('supplier') . "'</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->supplier_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->supplier_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success save', "<script>Swal.fire({icon: 'success',title: 'data berhasil disimpan'})</script>");
        }
        echo "<script>window.location='" . base_url('supplier') . "'</script>";
    }


    public function del($id)
    {
        $this->supplier_m->del($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('data already relation', "<script>Swal.fire({icon: 'warning',text: 'data tidak dapat dihapus (sudah digunakan/berelasi)'})</script>");
        } else {
            $this->session->set_flashdata('success save', "<script>Swal.fire({icon: 'success',title: 'data berhasil disimpan'})</script>");
        }
        echo "<script>window.location='" . base_url('supplier') . "'</script>";
    }
}
