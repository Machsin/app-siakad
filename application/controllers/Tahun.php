<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tahun extends CI_Controller
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
        $data['tahun'] = $this->Admin_Model->tampildata('tb_tahun_akademik', 'id_tahun_akademik');
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('tahun/tahun_data', $data);
        $this->load->view('template/footer');
    }
    public function tambah()
    {
        $tahun = new stdClass();
        $tahun->id_tahun_akademik = null;
        $tahun->nama_tahun = null;
        $tahun->keterangan = null;
        $tahun->aktif = null;
        $data = array(
            'title' => 'Tambah Data Tahun',
            'page' => 'tambah',
            'tahun' => $tahun
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('tahun/tahun_form', $data);
        $this->load->view('template/footer');
    }
    public function edit($id)
    {
        $tahun = $this->Admin_Model->formedit('tb_tahun_akademik', 'id_tahun_akademik', $id);
        $data = array(
            'title' => 'Edit Data Tahun',
            'page' => 'edit',
            'tahun' => $tahun
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('tahun/tahun_form', $data);
        $this->load->view('template/footer');
    }
    public function simpan()
    {
        $id = $this->input->post('id_tahun_akademik');
        if (isset($_POST['tambah'])) {
            $data = array(
                'nama_tahun'  => $this->input->post('nama_tahun'),
                'keterangan'  => $this->input->post('keterangan'),
                'aktif'  => $this->input->post('status'),
            );
            $this->Admin_Model->simpandata('tb_tahun_akademik', $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan');
                redirect('tahun');
            } else {
                $this->session->set_flashdata('error', 'Data gagal disimpan');
                redirect('tahun');
            }
        } else {
            $data = array(
                'nama_tahun'  => $this->input->post('nama_tahun'),
                'keterangan'  => $this->input->post('keterangan'),
                'aktif'  => $this->input->post('status'),
            );
            $this->Admin_Model->editdata('tb_tahun_akademik', 'id_tahun_akademik', $id, $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil diedit');
                redirect('tahun');
            } else {
                $this->session->set_flashdata('error', 'Data gagal diedit');
                redirect('tahun');
            }
        }
    }
    public function hapus($id)
    {
        $this->Admin_Model->hapusdata('tb_tahun_akademik', $id, 'id_tahun_akademik');
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
            redirect('tahun');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
            redirect('tahun');
        }
    }
}
