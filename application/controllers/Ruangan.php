<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ruangan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(['Admin_Model','Ruangan_Model']);
        // if (empty($this->session->userdata('username')) and empty($this->session->userdata('password'))) {
        //     redirect('login');
        // }
    }

    public function index()
    {
        $data['ruangan'] = $this->Ruangan_Model->tampildata();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('ruangan/ruangan_data', $data);
        $this->load->view('template/footer');
    }
    public function tambah()
    {
        $ruangan = new stdClass();
        $ruangan->kode_ruangan = null;
        $ruangan->kode_gedung = null;
        $ruangan->nama_ruangan = null;
        $ruangan->kapasitas_belajar = null;
        $ruangan->kapasitas_ujian = null;
        $ruangan->keterangan = null;
        $ruangan->aktif = null;
        $gedung = $this->Admin_Model->tampildata('tb_gedung','kode_gedung');
        $data = array(
            'title' => 'Tambah Data Ruangan',
            'page' => 'tambah',
            'ruangan' => $ruangan,
            'gedung'   => $gedung
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('ruangan/ruangan_form', $data);
        $this->load->view('template/footer');
    }
    public function edit($id)
    {
        $ruangan = $this->Admin_Model->formedit('tb_ruangan', 'kode_ruangan', $id);
        $gedung = $this->Admin_Model->tampildata('tb_gedung','kode_gedung');
        $data = array(
            'title' => 'Edit Data ruangan',
            'page' => 'edit',
            'ruangan' => $ruangan,
            'gedung'    => $gedung
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('ruangan/ruangan_form', $data);
        $this->load->view('template/footer');
    }
    public function simpan()
    {
        $id = $this->input->post('kode_ruangan');
        if (isset($_POST['tambah'])) {
            $data = array(
                'kode_gedung'  => $this->input->post('gedung'),
                'nama_ruangan'  => $this->input->post('nama_ruangan'),
                'kapasitas_belajar'  => $this->input->post('kapasitas_belajar'),
                'kapasitas_ujian'  => $this->input->post('kapasitas_ujian'),
                'keterangan'  => $this->input->post('keterangan'),
                'aktif'  => $this->input->post('status'),
            );
            $this->Admin_Model->simpandata('tb_ruangan', $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan');
                redirect('ruangan');
            } else {
                $this->session->set_flashdata('error', 'Data gagal disimpan');
                redirect('ruangan');
            }
        } else {
            $data = array(
                'kode_gedung'  => $this->input->post('gedung'),
                'nama_ruangan'  => $this->input->post('nama_ruangan'),
                'kapasitas_belajar'  => $this->input->post('kapasitas_belajar'),
                'kapasitas_ujian'  => $this->input->post('kapasitas_ujian'),
                'keterangan'  => $this->input->post('keterangan'),
                'aktif'  => $this->input->post('status'),
            );
            $this->Admin_Model->editdata('tb_ruangan', 'kode_ruangan', $id, $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil diedit');
                redirect('ruangan');
            } else {
                $this->session->set_flashdata('error', 'Data gagal diedit');
                redirect('ruangan');
            }
        }
    }
    public function hapus($id)
    {
        $this->Admin_Model->hapusdata('tb_ruangan', $id, 'kode_ruangan');
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
            redirect('ruangan');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
            redirect('ruangan');
        }
    }
}
