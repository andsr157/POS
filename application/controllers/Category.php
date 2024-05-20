<?php defined('BASEPATH') or exit('no direct script access allowed');

class category extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('category_m');
    }

    public function index()
    {
        $data['row'] = $this->category_m->get();
        $this->template->load('template', 'products/categorys/category_data', $data);
    }

    public function add()
    {
        $category = new stdClass();
        $category->category_id = null;
        $category->name = null;
        $data = array(
            'page' => 'add',
            'row' => $category
        );
        $this->template->load('template', 'products/categorys/category_form', $data);
    }

    public function edit($id)
    {
        $query = $this->category_m->get($id);
        if ($query->num_rows() > 0) {
            $category = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $category
            );
            $this->template->load('template', 'products/categorys/category_form', $data);
        } else {
            $this->session->set_flashdata('data not found', "<script>Swal.fire({icon: 'error',text: 'data tidak dapat ditemukan'})</script>");
            echo "<script>window.location='" . base_url('category') . "'</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->category_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->category_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success save', "<script>Swal.fire({icon: 'success',title: 'data berhasil disimpan'})</script>");
        }
        echo "<script>window.location='" . base_url('category') . "'</script>";
    }


    public function del($id)
    {
        $this->category_m->del($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('data already relation', "<script>Swal.fire({icon: 'warning',text: 'data tidak dapat dihapus (sudah digunakan/berelasi)'})</script>");
        } else {
            $this->session->set_flashdata('success delete', "<script>Swal.fire({icon: 'success',title: 'data berhasil dihapus'})</script>");
        }
        echo "<script>window.location='" . base_url('category') . "'</script>";
    }
}
