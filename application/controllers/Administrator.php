<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(['Admin_Model', 'Administrator_Model']);
        if (empty($this->session->userdata('username')) and empty($this->session->userdata('password'))) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['administrator'] = $this->Administrator_Model->tampildata();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('administrator/administrator_data', $data);
        $this->load->view('template/footer');
    }
    public function tambah()
    {
        $administrator = new stdClass();
        $administrator->id_administrator = null;
        $administrator->username = null;
        $administrator->password = null;
        $administrator->level = null;
        $administrator->nip = null;
        $guru = $this->Admin_Model->tampildata('tb_guru', 'nip');
        $data = array(
            'title' => 'Tambah Data Administrator',
            'page' => 'tambah',
            'guru' => $guru,
            'administrator' => $administrator
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('administrator/administrator_form', $data);
        $this->load->view('template/footer');
    }
    public function edit($id)
    {
        $administrator = $this->Admin_Model->formedit('tb_administrator', 'id_administrator', $id);
        $guru = $this->Admin_Model->tampildata('tb_guru', 'nip');
        $data = array(
            'title' => 'Edit Data Administrator',
            'page' => 'edit',
            'guru' => $guru,
            'administrator' => $administrator
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('administrator/administrator_form', $data);
        $this->load->view('template/footer');
    }
    public function simpan()
    {
        $id = $this->input->post('id_administrator');
        if (isset($_POST['tambah'])) {
            $data = array(
                'username'  => $this->input->post('username'),
                'password'  => md5($this->input->post('password')),
                'level'  => $this->input->post('level'),
                'nip'  => $this->input->post('nip'),
            );
            $this->Admin_Model->simpandata('tb_administrator', $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan');
                redirect('administrator');
            } else {
                $this->session->set_flashdata('error', 'Data gagal disimpan');
                redirect('administrator');
            }
        } else {
            if ($this->input->post('password') != null) {
                $data = array(
                    'username'  => $this->input->post('username'),
                    'password'  => md5($this->input->post('password')),
                    'level'  => $this->input->post('level'),
                    'nip'  => $this->input->post('nip'),
                );
            } else {
                $data = array(
                    'username'  => $this->input->post('username'),
                    'level'  => $this->input->post('level'),
                    'nip'  => $this->input->post('nip'),
                );
            }
            $this->Admin_Model->editdata('tb_administrator', 'id_administrator', $id, $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil diedit');
                redirect('administrator');
            } else {
                $this->session->set_flashdata('error', 'Data gagal diedit');
                redirect('administrator');
            }
        }
    }
    public function hapus($id)
    {
        $this->Admin_Model->hapusdata('tb_administrator', $id, 'id_administrator');
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
            redirect('administrator');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
            redirect('administrator');
        }
    }
}
