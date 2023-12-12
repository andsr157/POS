<?php defined('BASEPATH') or exit('no direct script access allowed');

class Item extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['item_m', 'category_m', 'unit_m']);
        $this->load->library('form_validation');
    }

    public function index()
    {

        $data['row'] = $this->item_m->get();
        $this->template->load('template', 'products/items/item_data', $data);
    }

    public function add()
    {
        $post = $this->input->post();
        $post = ($post) ? $post : [];
        $item = (object) array_merge([
            'item_id' => null,
            'barcode' => null,
            'name' => null,
            'price' => null,
            'category_id' => null,
            'unit_id' => null,
        ], $post);

        $query_category = $this->category_m->get();

        $query_unit = $this->unit_m->get();

        // $unit[null] = '-Pilih-';
        // foreach ($query_unit->result() as $unt) {
        //     $unit[$unt->unit_id] = $unt->name;
        // };

        $data = array(
            'page' => 'add',
            'row' => $item,
            'category' => $query_category,
            'unit' => $query_unit

        );
        $this->template->load('template', 'products/items/item_form', $data);
    }

    public function edit($id)
    {
        $query = $this->item_m->get($id);
        if ($query->num_rows() > 0) {
            $item = $query->row();
            $query_category = $this->category_m->get();

            $query_unit = $this->unit_m->get();

            // $unit[null] = '-Pilih-';
            // foreach ($query_unit->result() as $unt) {
            //     $unit[$unt->unit_id] = $unt->name;
            // };

            $data = array(
                'page' => 'edit',
                'row' => $item,
                'category' => $query_category,
                'unit' => $query_unit,

            );
            $this->template->load('template', 'products/items/item_form', $data);
        } else {
            echo "<script>alert('data tidak dapat ditemukan')</script>";
            echo "<script>window.location='" . base_url('item') . "'</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->form_validation->set_rules('barcode', 'Barcode', 'required');
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('category', 'Category', 'required');
            $this->form_validation->set_rules('unit', 'Unit', 'required');
            $this->form_validation->set_rules('price', 'Price', 'required');
            if ($this->form_validation->run() === false) {
                $this->add();
            } else {
                if ($this->item_m->check_barcode($post['barcode'])->num_rows() > 0) {
                    echo "<script>alert('barcode sudah dipakai barang lain')</script>";
                    echo "<script>window.location='" . base_url('item/add') . "'</script>";
                } else {
                    $this->item_m->add($post);
                    if ($this->db->affected_rows() > 0) {
                        echo "<script>alert('data berhasil disimpan')</script>";
                    }
                    echo "<script>window.location='" . base_url('item') . "'</script>";
                }
            }
        } else if (isset($_POST['edit'])) {
            if ($this->item_m->check_barcode($post['barcode'], $post['id'])->num_rows() > 0) {
                echo "<script>alert('barcode sudah dipakai barang lain')</script>";
                echo "<script>window.location='" . base_url('item/edit/' . $post['id']) . "'</script>";
            } else {
                $this->item_m->edit($post);
            }
        }
    }


    public function del($id)
    {
        $this->item_m->del($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('data berhasil dihapus')</script>";
        }
        echo "<script>window.location='" . base_url('item') . "'</script>";
    }

    function barcode_qrcode($id)
    {
        $data['row'] = $this->item_m->get($id)->row();
        $this->template->load('template', 'products/items/barcode_qrcode', $data);
    }

    function barcode_print($id)
    {
        $data['row'] = $this->item_m->get($id)->row();
        $html = $this->load->view('products/items/barcode_print', $data, true);
        $this->lvalidasi->pdfGenerator($html, 'barcode-' . $data['row']->barcode, 'A4', 'landscape');
    }

    function qrcode_print($id)
    {
        $data['row'] = $this->item_m->get($id)->row();
        $html = $this->load->view('products/items/qrcode_print', $data, true);
        $this->lvalidasi->pdfGenerator($html, 'qrcode-' . $data['row']->barcode, 'A4', 'potrait');
    }
}
