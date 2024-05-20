<?php

use phpDocumentor\Reflection\PseudoTypes\True_;

defined('BASEPATH') or exit('no direct script access allowed');

class Users extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // check_not_login();
        // check_admin();
        $this->load->model('user_m');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['row'] = $this->user_m->get();
        $this->template->load('template', 'users/users_data', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|min_length[5]|is_unique[users.username]',
            array('is_unique' => 'Username sudah dipakai ganti yang lain')
        );
        $this->form_validation->set_rules('password', 'Password', 'required|required|min_length[5]');
        $this->form_validation->set_rules(
            'passconf',
            'Konfirmasi Password',
            'required|matches[password]',
            array('matches' => '%s tidak sesuai dengan password')
        );

        // $this->form_validation->set_rules('email','Email','required|email_valid',
        // array('email_valid' => 'masukan email yang valid'));

        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|is_unique[users.email]',
            array('is_unique' => 'Email sudah dipakai ganti yang lain')
        );
        $this->form_validation->set_rules('level', 'Posisi', 'required');

        $this->form_validation->set_message('required', '%s harus di isi!!');
        $this->form_validation->set_message('min_length', '%s minimal 5 karakter');


        $this->form_validation->set_error_delimiters('<span class="text-danger" style="font-size:12px;">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'users/user_form_add');
        } else {
            $post = $this->input->post(null, TRUE);
            $this->user_m->add($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success delete', "<script>Swal.fire({icon: 'success',title: 'data berhasil dihapus'})</script>");
            }
            echo "<script>window.location='" . base_url('users') . "'</script>";
        }
    }

    public function del($id)
    {
        if ($id == 9) {
            $this->session->set_flashdata('cant delete account', "<script>Swal.fire({icon: 'warning',text: 'Akun utama tidak dapat dihapus'})</script>");
            echo "<script>window.location='" . base_url('users') . "'</script>";
        } else {
            $this->user_m->del($id);
            $error = $this->db->error();
            if ($error['code'] != 0) {
                $this->session->set_flashdata('data already relation', "<script>Swal.fire({icon: 'warning',text: 'data tidak dapat dihapus (sudah digunakan/berelasi)'})</script>");
            } else {
                $this->session->set_flashdata('success delete', "<script>Swal.fire({icon: 'success',title: 'data berhasil dihapus'})</script>");
            }
        }

        echo "<script>window.location='" . base_url('users') . "'</script>";
    }


    public function edit($id)
    {

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|callback_username_check');
        if ($this->input->post('password')) {
            $this->form_validation->set_rules('password', 'Password', 'min_length[5]');
            $this->form_validation->set_rules(
                'passconf',
                'Konfirmasi Password',
                'matches[password]',
                array('matches' => '%s tidak sesuai dengan password')
            );
        }
        if ($this->input->post('passconf')) {
            $this->form_validation->set_rules(
                'passconf',
                'Konfirmasi Password',
                'matches[password]',
                array('matches' => '%s tidak sesuai dengan password')
            );
        }

        // $this->form_validation->set_rules('email','Email','required|email_valid',
        // array('email_valid' => 'masukan email yang valid'));

        $this->form_validation->set_rules('email', 'Email', 'required|callback_email_check');
        $this->form_validation->set_rules('level', 'Posisi', 'required');

        $this->form_validation->set_message('required', '%s harus di isi!!');
        $this->form_validation->set_message('min_length', '%s minimal 5 karakter');


        $this->form_validation->set_error_delimiters('<span class="text-danger" style="font-size:12px;">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $query = $this->user_m->get($id);
            if ($query->num_rows() > 0) {
                $data['row'] = $query->row();
                $this->template->load('template', 'users/user_form_edit', $data);
            } else {
                $this->session->set_flashdata('data not found', "<script>Swal.fire({icon: 'error',text: 'data tidak dapat ditemukan'})</script>");
                echo "<script>window.location='" . base_url('users') . "'</script>";
            }
        } else {
            $post = $this->input->post(null, TRUE);
            $this->user_m->edit($post);
            if ($this->db->affected_rows() >= 0) {
                $this->session->set_flashdata('success save', "<script>Swal.fire({icon: 'success',title: 'data berhasil disimpan'})</script>");
            }
            echo "<script>window.location='" . base_url('users') . "'</script>";
        }
    }

    function username_check()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM users WHERE username = '$post[username]' AND id != '$post[user_id]'");
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('username_check', '%s ini sudah dipakai silahkan ganti');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function email_check()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM users WHERE email = '$post[email]' AND id != '$post[user_id]'");
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('email_check', '%s ini sudah dipakai silahkan ganti');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
