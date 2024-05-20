<?php defined('BASEPATH') or exit('no direct script access allowed');

class Auth extends CI_Controller
{

    public function Login()
    {
        check_already_login();
        $this->load->view('login');
    }

    // public function Register()
    // {
    //     $this->load->view('register');
    // }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['login'])) {
            $this->load->model('User_m');
            $query = $this->User_m->login($post);
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $params = array(
                    'user_id' => $row->id,
                    'level' => $row->level
                );
                $this->session->set_userdata($params);
                $response = array(
                    'status' => 'success',
                    'message' => 'Login Berhasil!!!',
                    'redirect' => base_url('dashboard')
                );
            } else {
                $response = array(
                    'status' => 'error',
                    'message' => 'Login gagal. cek username dan password lagi!!',
                    'redirect' => base_url('auth/login')
                );
            }
            header('Content-Type: application/json');
            echo json_encode($response);
            exit();
        }
    }

    public function logout()
    {
        $params = array('user_id', 'level');
        $this->session->unset_userdata($params);
        redirect('auth/login');
    }
}
