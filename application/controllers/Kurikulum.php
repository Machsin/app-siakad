<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kurikulum extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_Model');
        if (empty($this->session->userdata('username')) and empty($this->session->userdata('password'))) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['kurikulum'] = $this->Admin_Model->tampildata('tb_kurikulum', 'kode_kurikulum');
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('kurikulum/kurikulum_data', $data);
        $this->load->view('template/footer');
    }
    public function tambah()
    {
        $kurikulum = new stdClass();
        $kurikulum->kode_kurikulum = null;
        $kurikulum->nama_kurikulum = null;
        $kurikulum->status_kurikulum = null;
        $data = array(
            'title' => 'Tambah Data Kurikulum',
            'page' => 'tambah',
            'kurikulum' => $kurikulum
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('kurikulum/kurikulum_form', $data);
        $this->load->view('template/footer');
    }
    public function edit($id)
    {
        $kurikulum = $this->Admin_Model->formedit('tb_kurikulum', 'kode_kurikulum', $id);
        $data = array(
            'title' => 'Edit Data Kurikulum',
            'page' => 'edit',
            'kurikulum' => $kurikulum
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('kurikulum/kurikulum_form', $data);
        $this->load->view('template/footer');
    }
    public function simpan()
    {
        $id = $this->input->post('kode_kurikulum');
        if (isset($_POST['tambah'])) {
            $data = array(
                'nama_kurikulum'  => $this->input->post('nama_kurikulum'),
                'status_kurikulum'  => $this->input->post('status'),
            );
            $this->Admin_Model->simpandata('tb_kurikulum', $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan');
                redirect('kurikulum');
            } else {
                $this->session->set_flashdata('error', 'Data gagal disimpan');
                redirect('kurikulum');
            }
        } else {
            $data = array(
                'nama_kurikulum'  => $this->input->post('nama_kurikulum'),
                'status_kurikulum'  => $this->input->post('status'),
            );
            $this->Admin_Model->editdata('tb_kurikulum', 'kode_kurikulum', $id, $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil diedit');
                redirect('kurikulum');
            } else {
                $this->session->set_flashdata('error', 'Data gagal diedit');
                redirect('kurikulum');
            }
        }
    }
    public function hapus($id)
    {
        $this->Admin_Model->hapusdata('tb_kurikulum', $id, 'kode_kurikulum');
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
            redirect('kurikulum');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
            redirect('kurikulum');
        }
    }
}
