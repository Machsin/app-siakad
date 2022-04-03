<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelompok_Mapel extends CI_Controller
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
        $data['kelompok_mapel'] = $this->Admin_Model->tampildata('tb_kelompok_mapel', 'id_kelompok_mapel');
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('kelompok_mapel/kelompok_mapel_data', $data);
        $this->load->view('template/footer');
    }
    public function tambah()
    {
        $kelompok_mapel = new stdClass();
        $kelompok_mapel->id_kelompok_mapel = null;
        $kelompok_mapel->jenis_kelompok_mapel = null;
        $kelompok_mapel->nama_kelompok_mapel = null;
        $data = array(
            'title' => 'Tambah Data Kelompok Mata Pelajaran',
            'page' => 'tambah',
            'kelompok_mapel' => $kelompok_mapel
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('kelompok_mapel/kelompok_mapel_form', $data);
        $this->load->view('template/footer');
    }
    public function edit($id)
    {
        $kelompok_mapel = $this->Admin_Model->formedit('tb_kelompok_mapel', 'id_kelompok_mapel', $id);
        $data = array(
            'title' => 'Edit Data Kelompok Mata Pelajaran',
            'page' => 'edit',
            'kelompok_mapel' => $kelompok_mapel
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('kelompok_mapel/kelompok_mapel_form', $data);
        $this->load->view('template/footer');
    }
    public function simpan()
    {
        $id = $this->input->post('id_kelompok_mapel');
        if (isset($_POST['tambah'])) {
            $data = array(
                'jenis_kelompok_mapel'  => $this->input->post('jenis_kelompok_mapel'),
                'nama_kelompok_mapel'  => $this->input->post('nama_kelompok_mapel'),
            );
            $this->Admin_Model->simpandata('tb_kelompok_mapel', $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan');
                redirect('kelompok_mapel');
            } else {
                $this->session->set_flashdata('error', 'Data gagal disimpan');
                redirect('kelompok_mapel');
            }
        } else {
            $data = array(
                'jenis_kelompok_mapel'  => $this->input->post('jenis_kelompok_mapel'),
                'nama_kelompok_mapel'  => $this->input->post('nama_kelompok_mapel'),
            );
            $this->Admin_Model->editdata('tb_kelompok_mapel', 'id_kelompok_mapel', $id, $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil diedit');
                redirect('kelompok_mapel');
            } else {
                $this->session->set_flashdata('error', 'Data gagal diedit');
                redirect('kelompok_mapel');
            }
        }
    }
    public function hapus($id)
    {
        $this->Admin_Model->hapusdata('tb_kelompok_mapel', $id, 'id_kelompok_mapel');
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
            redirect('kelompok_mapel');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
            redirect('kelompok_mapel');
        }
    }
}
