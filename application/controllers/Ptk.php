<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ptk extends CI_Controller
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
        $data['ptk'] = $this->Admin_Model->tampildata('tb_jenis_ptk', 'id_jenis_ptk');
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('ptk/ptk_data', $data);
        $this->load->view('template/footer');
    }
    public function tambah()
    {
        $ptk = new stdClass();
        $ptk->id_jenis_ptk = null;
        $ptk->jenis_ptk = null;
        $ptk->keterangan = null;
        $data = array(
            'title' => 'Tambah Data ptk',
            'page' => 'tambah',
            'ptk' => $ptk
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('ptk/ptk_form', $data);
        $this->load->view('template/footer');
    }
    public function edit($id)
    {
        $ptk = $this->Admin_Model->formedit('tb_jenis_ptk', 'id_jenis_ptk', $id);
        $data = array(
            'title' => 'Edit Data ptk',
            'page' => 'edit',
            'ptk' => $ptk
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('ptk/ptk_form', $data);
        $this->load->view('template/footer');
    }
    public function simpan()
    {
        $id = $this->input->post('id_jenis_ptk');
        if (isset($_POST['tambah'])) {
            $data = array(
                'jenis_ptk'  => $this->input->post('jenis_ptk'),
                'keterangan'  => $this->input->post('keterangan'),
            );
            $this->Admin_Model->simpandata('tb_jenis_ptk', $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan');
                redirect('ptk');
            } else {
                $this->session->set_flashdata('error', 'Data gagal disimpan');
                redirect('ptk');
            }
        } else {
            $data = array(
                'jenis_ptk'  => $this->input->post('jenis_ptk'),
                'keterangan'  => $this->input->post('keterangan'),
            );
            $this->Admin_Model->editdata('tb_jenis_ptk', 'id_jenis_ptk', $id, $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil diedit');
                redirect('ptk');
            } else {
                $this->session->set_flashdata('error', 'Data gagal diedit');
                redirect('ptk');
            }
        }
    }
    public function hapus($id)
    {
        $this->Admin_Model->hapusdata('tb_jenis_ptk', $id, 'id_jenis_ptk');
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
            redirect('ptk');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
            redirect('ptk');
        }
    }
}
