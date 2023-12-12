<?php defined('BASEPATH') or exit('no direct script access allowed');

class Sale extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['sale_m']);
        $this->load->model(['customer_m', 'item_m']);
    }

    public function index()
    {
        $customer = $this->customer_m->get()->result();
        $item = $this->item_m->get()->result();
        $cart = $this->sale_m->get_cart();
        $data = array(
            'customer' => $customer,
            'item' => $item,
            'cart' => $cart,
            'invoice' => $this->sale_m->invoice_no(),
        );
        $this->template->load('template', 'transaction/sale/sale_form', $data);
    }


    function get_item()
    {
        $barcode = $this->input->post('barcode');
        $item = $this->item_m->get_barcode($barcode)->row();
        if ($this->db->affected_rows() > 0) {
            $params = array("success" => true, "item" => $item);
        } else {
            $params = array("success" => false);
        }
        echo json_encode($params);
    }

    public function process()
    {
        $data = $this->input->post(null, TRUE);
        if (isset($_POST['add_cart'])) {

            $item_id = $this->input->post('item_id');
            $check_cart = $this->sale_m->get_cart(['t_cart.item_id' => $item_id]);
            if ($check_cart->num_rows() > 0) {
                $this->sale_m->update_cart_qty($data);
            } else {
                $this->sale_m->add_cart($data);
            }


            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }
        if (isset($_POST['edit_cart'])) {
            $this->sale_m->edit_cart($data);
            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }
        if (isset($_POST['process_payment'])) {
            $sale_id =  $this->sale_m->add_sale($data);
            $cart = $this->sale_m->get_cart()->result();
            $row = [];
            foreach ($cart as $c => $value) {
                array_push(
                    $row,
                    array(
                        'sale_id' => $sale_id,
                        'item_id' => $value->item_id,
                        'price' => $value->price,
                        'qty' => $value->qty,
                        'discount_item' => $value->discount_item,
                        'total' => $value->total,
                    )
                );
            }
            $this->sale_m->add_sale_detail($row);
            $this->sale_m->del_cart(['user_id' => $this->session->userdata('user_id')]);

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true, "sale_id" => $sale_id);
            } else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }
    }

    public function cart_del()
    {
        if (isset($_POST['cancel_payment'])) {
            $this->sale_m->del_cart(['user_id' => $this->session->userdata('user_id')]);
        } else {
            $cart_id = $this->input->post('cart_id');
            $this->sale_m->del_cart(['cart_id' => $cart_id]);
        }

        if ($this->db->affected_rows() > 0) {
            $params = array("success" => true);
        } else {
            $params = array("success" => false);
        }
        echo json_encode($params);
    }

    function cart_data()
    {
        $cart = $this->sale_m->get_cart();
        $data['cart'] = $cart;
        $this->load->view('transaction/sale/cart_data', $data);
    }


    public function cetak($id)
    {
        $data = array(
            'sale' => $this->sale_m->get_sale($id)->row(),
            'sale_detail' => $this->sale_m->get_sale_detail($id)->result(),
        );
        $this->load->view('transaction/sale/receipt_print', $data);
    }


    public function del($id)
    {
        $this->sale_m->del_sale($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('data penjualan berhasil dihapus')</script>";
            echo "<script>window.location='" . base_url('report/sAle') . "'</script>";
        } else {
            echo "<script>alert('data penjualan gagal dihapus);
            window.location='" . base_url('report/sAle') . "'; </script>";
        }
    }
}
