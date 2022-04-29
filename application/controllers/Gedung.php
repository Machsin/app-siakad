<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gedung extends CI_Controller
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
        $data['gedung'] = $this->Admin_Model->tampildata('tb_gedung', 'kode_gedung');
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('gedung/gedung_data', $data);
        $this->load->view('template/footer');
    }
    public function tambah()
    {
        $gedung = new stdClass();
        $gedung->kode_gedung = null;
        $gedung->nama_gedung = null;
        $gedung->jumlah_lantai = null;
        $gedung->panjang = null;
        $gedung->tinggi = null;
        $gedung->lebar = null;
        $gedung->keterangan = null;
        $gedung->aktif = null;
        $data = array(
            'title' => 'Tambah Data Gedung',
            'page' => 'tambah',
            'gedung' => $gedung
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('gedung/gedung_form', $data);
        $this->load->view('template/footer');
    }
    public function edit($id)
    {
        $gedung = $this->Admin_Model->formedit('tb_gedung', 'kode_gedung', $id);
        $data = array(
            'title' => 'Edit Data Gedung',
            'page' => 'edit',
            'gedung' => $gedung
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('gedung/gedung_form', $data);
        $this->load->view('template/footer');
    }
    public function simpan()
    {
        $id = $this->input->post('kode_gedung');
        if (isset($_POST['tambah'])) {
            $data = array(
                'nama_gedung'  => $this->input->post('nama_gedung'),
                'jumlah_lantai'  => $this->input->post('jumlah_lantai'),
                'panjang'  => $this->input->post('panjang'),
                'tinggi'  => $this->input->post('tinggi'),
                'lebar'  => $this->input->post('lebar'),
                'keterangan'  => $this->input->post('keterangan'),
                'aktif'  => $this->input->post('status'),
            );
            $this->Admin_Model->simpandata('tb_gedung', $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan');
                redirect('gedung');
            } else {
                $this->session->set_flashdata('error', 'Data gagal disimpan');
                redirect('gedung');
            }
        } else {
            $data = array(
                'nama_gedung'  => $this->input->post('nama_gedung'),
                'jumlah_lantai'  => $this->input->post('jumlah_lantai'),
                'panjang'  => $this->input->post('panjang'),
                'tinggi'  => $this->input->post('tinggi'),
                'lebar'  => $this->input->post('lebar'),
                'keterangan'  => $this->input->post('keterangan'),
                'aktif'  => $this->input->post('status'),
            );
            $this->Admin_Model->editdata('tb_gedung', 'kode_gedung', $id, $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil diedit');
                redirect('gedung');
            } else {
                $this->session->set_flashdata('error', 'Data gagal diedit');
                redirect('gedung');
            }
        }
    }
    public function hapus($id)
    {
        $this->Admin_Model->hapusdata('tb_gedung', $id, 'kode_gedung');
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
            redirect('gedung');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
            redirect('gedung');
        }
    }
}
