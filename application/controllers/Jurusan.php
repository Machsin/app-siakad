<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurusan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_Model');
        // if (empty($this->session->userdata('username')) and empty($this->session->userdata('password'))) {
        //     redirect('login');
        // }
    }

    public function index()
    {
        $data['jurusan'] = $this->Admin_Model->tampildata('tb_jurusan', 'kode_jurusan');
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('jurusan/jurusan_data', $data);
        $this->load->view('template/footer');
    }
    public function tambah()
    {
        $jurusan = new stdClass();
        $jurusan->kode_jurusan = null;
        $jurusan->nama_jurusan = null;
        $jurusan->bidang_keahlian = null;
        $jurusan->kompetensi_umum = null;
        $jurusan->kompetensi_khusus = null;
        $jurusan->pejabat = null;
        $jurusan->jabatan = null;
        $jurusan->keterangan = null;
        $jurusan->aktif = null;
        $data = array(
            'title' => 'Tambah Data Jurusan',
            'page' => 'tambah',
            'jurusan' => $jurusan
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('jurusan/jurusan_form', $data);
        $this->load->view('template/footer');
    }
    public function edit($id)
    {
        $jurusan = $this->Admin_Model->formedit('tb_jurusan', 'kode_jurusan', $id);
        $data = array(
            'title' => 'Edit Data Jurusan',
            'page' => 'edit',
            'jurusan' => $jurusan
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('jurusan/jurusan_form', $data);
        $this->load->view('template/footer');
    }
    public function detail($id)
    {
        $jurusan = $this->Admin_Model->formedit('tb_jurusan', 'kode_jurusan', $id);
        $data = array(
            'title' => 'Detail Data urusan',
            'page' => 'edit',
            'jurusan' => $jurusan
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('jurusan/jurusan_detail', $data);
        $this->load->view('template/footer');
    }
    public function simpan()
    {
        $id = $this->input->post('kode_jurusan');
        if (isset($_POST['tambah'])) {
            $data = array(
                'Kode_Jurusan'  => $this->input->post('kode_jurusan'),
                'nama_jurusan'  => $this->input->post('nama_jurusan'),
                'bidang_keahlian'  => $this->input->post('bidang_keahlian'),
                'kompetensi_umum'  => $this->input->post('kompetensi_umum'),
                'kompetensi_khusus'  => $this->input->post('kompetensi_khusus'),
                'pejabat'  => $this->input->post('pejabat'),
                'jabatan'  => $this->input->post('jabatan'),
                'keterangan'  => $this->input->post('keterangan'),
                'aktif'  => $this->input->post('aktif'),
            );
            $this->Admin_Model->simpandata('tb_jurusan', $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan');
                redirect('jurusan');
            } else {
                $this->session->set_flashdata('error', 'Data gagal disimpan');
                redirect('jurusan');
            }
        } else {
            $data = array(
                'Kode_Jurusan'  => $this->input->post('kode_jurusan'),
                'nama_jurusan'  => $this->input->post('nama_jurusan'),
                'bidang_keahlian'  => $this->input->post('bidang_keahlian'),
                'kompetensi_umum'  => $this->input->post('kompetensi_umum'),
                'kompetensi_khusus'  => $this->input->post('kompetensi_khusus'),
                'pejabat'  => $this->input->post('pejabat'),
                'jabatan'  => $this->input->post('jabatan'),
                'keterangan'  => $this->input->post('keterangan'),
                'aktif'  => $this->input->post('aktif'),
            );
            $this->Admin_Model->editdata('tb_jurusan', 'kode_jurusan', $id, $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil diedit');
                redirect('jurusan');
            } else {
                $this->session->set_flashdata('error', 'Data gagal diedit');
                redirect('jurusan');
            }
        }
    }
    public function hapus($id)
    {
        $this->Admin_Model->hapusdata('tb_jurusan', $id, 'kode_jurusan');
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
            redirect('jurusan');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
            redirect('jurusan');
        }
    }
}
