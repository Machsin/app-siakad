<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(['Admin_Model','Kelas_Model']);
        // if (empty($this->session->userdata('username')) and empty($this->session->userdata('password'))) {
        //     redirect('login');
        // }
    }

    public function index()
    {
        $data['kelas'] = $this->Kelas_Model->tampildata();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('kelas/kelas_data', $data);
        $this->load->view('template/footer');
    }
    public function tambah()
    {
        $kelas = new stdClass();
        $kelas->kode_kelas = null;
        $kelas->nip = null;
        $kelas->kode_jurusan = null;
        $kelas->kode_ruangan = null;
        $kelas->nama_kelas = null;
        $kelas->aktif = null;
        $guru = $this->Admin_Model->tampildata('tb_guru','nip');
        $jurusan = $this->Admin_Model->tampildata('tb_jurusan','kode_jurusan');
        $ruangan = $this->Admin_Model->tampildata('tb_ruangan','kode_ruangan');
        $data = array(
            'title' => 'Tambah Data kelas',
            'page' => 'tambah',
            'kelas' => $kelas,
            'guru'  => $guru,
            'jurusan'=> $jurusan,
            'ruangan' => $ruangan
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('kelas/kelas_form', $data);
        $this->load->view('template/footer');
    }
    public function edit($id)
    {
        $kelas = $this->Admin_Model->formedit('tb_kelas', 'kode_kelas', $id);
        $guru = $this->Admin_Model->tampildata('tb_guru','nip');
        $jurusan = $this->Admin_Model->tampildata('tb_jurusan','kode_jurusan');
        $ruangan = $this->Admin_Model->tampildata('tb_ruangan','kode_ruangan');
        $data = array(
            'title' => 'Edit Data kelas',
            'page' => 'edit',
            'kelas' => $kelas,
            'guru'  => $guru,
            'jurusan'=> $jurusan,
            'ruangan' => $ruangan
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('kelas/kelas_form', $data);
        $this->load->view('template/footer');
    }
    public function simpan()
    {
        $id = $this->input->post('kode_kelas');
        if (isset($_POST['tambah'])) {
            $data = array(
                'kode_kelas'  => $this->input->post('kode_kelas'),
                'nip'  => $this->input->post('nip'),
                'kode_jurusan'  => $this->input->post('kode_jurusan'),
                'kode_ruangan'  => $this->input->post('kode_ruangan'),
                'nama_kelas'  => $this->input->post('nama_kelas'),
                'aktif'  => $this->input->post('aktif'),
            );
            $this->Admin_Model->simpandata('tb_kelas', $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan');
                redirect('kelas');
            } else {
                $this->session->set_flashdata('error', 'Data gagal disimpan');
                redirect('kelas');
            }
        } else {
            $data = array(
                'kode_kelas'  => $this->input->post('kode_kelas'),
                'nip'  => $this->input->post('nip'),
                'kode_jurusan'  => $this->input->post('kode_jurusan'),
                'kode_ruangan'  => $this->input->post('kode_ruangan'),
                'nama_kelas'  => $this->input->post('nama_kelas'),
                'aktif'  => $this->input->post('aktif'),
            );
            $this->Admin_Model->editdata('tb_kelas', 'kode_kelas', $id, $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil diedit');
                redirect('kelas');
            } else {
                $this->session->set_flashdata('error', 'Data gagal diedit');
                redirect('kelas');
            }
        }
    }
    public function hapus($id)
    {
        $this->Admin_Model->hapusdata('tb_kelas', $id, 'kode_kelas');
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
            redirect('kelas');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
            redirect('kelas');
        }
    }
}
