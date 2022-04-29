<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['Login_Model', 'Admin_Model']);
    }

    public function index()
    {
        $this->load->view('login');
    }
    public function proses_login()
    {
        $user = $this->input->post('username');
        $pass = $this->input->post('password');

        $ceklogin = $this->Login_Model->akses_login($user, $pass);
        if ($ceklogin) {
            foreach ($ceklogin as $r)
                $this->session->set_userdata('id_administrator', $r->id_administrator);
            $this->session->set_userdata('username', $r->username);
            $this->session->set_userdata('password', $r->password);
            $this->session->set_userdata('level', $r->level);
            $this->session->set_userdata('nip', $r->nip);
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('error', 'Username atau Password salah');
            $this->load->view('login');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
