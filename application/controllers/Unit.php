<?php defined('BASEPATH') or exit('no direct script access allowed');

class unit extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('unit_m');
    }

    public function index()
    {

        $data['row'] = $this->unit_m->get();
        $this->template->load('template', 'products/units/unit_data', $data);
    }

    public function add()
    {
        $unit = new stdClass();
        $unit->unit_id = null;
        $unit->name = null;
        $data = array(
            'page' => 'add',
            'row' => $unit
        );
        $this->template->load('template', 'products/units/unit_form', $data);
    }

    public function edit($id)
    {
        $query = $this->unit_m->get($id);
        if ($query->num_rows() > 0) {
            $unit = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $unit
            );
            $this->template->load('template', 'products/units/unit_form', $data);
        } else {
            $this->session->set_flashdata('data not found', "<script>Swal.fire({icon: 'error',text: 'data tidak dapat ditemukan'})</script>");
            echo "<script>window.location='" . base_url('unit') . "'</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->unit_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->unit_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success save', "<script>Swal.fire({icon: 'success',title: 'data berhasil disimpan'})</script>");
        }
        echo "<script>window.location='" . base_url('unit') . "'</script>";
    }


    public function del($id)
    {
        $this->unit_m->del($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('data already relation', "<script>Swal.fire({icon: 'warning',text: 'data tidak dapat dihapus (sudah digunakan/berelasi)'})</script>");
        } else {
            $this->session->set_flashdata('success delete', "<script>Swal.fire({icon: 'success',title: 'data berhasil dihapus'})</script>");
        }
        echo "<script>window.location='" . base_url('unit') . "'</script>";
    }
}
