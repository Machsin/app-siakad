<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(['Admin_Model', 'Jadwal_Model']);
        if (empty($this->session->userdata('username')) and empty($this->session->userdata('password'))) {
            redirect('login');
        }
    }

    public function index()
    {
        $tahun = $this->input->post('tahun');
        $kelas = $this->input->post('kelas');
        $data['jadwal'] = $this->Jadwal_Model->tampildata($tahun, $kelas);
        $data['kelas'] = $this->Admin_Model->tampildata('tb_kelas', 'kode_kelas');
        $data['tahunakademik'] = $this->Admin_Model->tampildata('tb_tahun_akademik', 'id_tahun_akademik');
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('jadwal/jadwal_data', $data);
        $this->load->view('template/footer');
    }
    public function tambah()
    {
        $jadwal = new stdClass();
        $jadwal->kodejdwl = null;
        $jadwal->id_tahun_akademik = null;
        $jadwal->kode_kelas = null;
        $jadwal->kode_pelajaran = null;
        $jadwal->kode_ruangan = null;
        $jadwal->nip = null;
        $jadwal->paralel = null;
        $jadwal->jadwal_serial = null;
        $jadwal->jam_mulai = null;
        $jadwal->jam_selesai = null;
        $jadwal->hari = null;
        $jadwal->aktif = null;
        $tahun = $this->Admin_Model->getselect('tb_tahun_akademik', 'aktif', 'Ya');
        $kelas = $this->Admin_Model->getselect('tb_kelas', 'aktif', 'Ya');
        $mapel = $this->Admin_Model->getselect('tb_mata_pelajaran', 'Aktif', 'Ya');
        $ruangan = $this->Admin_Model->getselect('tb_ruangan', 'Aktif', 'Ya');
        $guru = $this->Admin_Model->getselect('tb_guru', 'id_status_keaktifan', '1');
        $data = array(
            'title' => 'Tambah Data Jadwal',
            'page' => 'tambah',
            'jadwal' => $jadwal,
            'tahun' => $tahun,
            'kelas' => $kelas,
            'mapel' => $mapel,
            'ruangan' => $ruangan,
            'guru' => $guru,
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('jadwal/jadwal_form', $data);
        $this->load->view('template/footer');
    }
    public function edit($id)
    {
        $jadwal = $this->Admin_Model->formedit('tb_jadwal_pelajaran','kodejdwl', $id);
        $tahun = $this->Admin_Model->getselect('tb_tahun_akademik', 'aktif', 'Ya');
        $kelas = $this->Admin_Model->getselect('tb_kelas', 'aktif', 'Ya');
        $mapel = $this->Admin_Model->getselect('tb_mata_pelajaran', 'Aktif', 'Ya');
        $ruangan = $this->Admin_Model->getselect('tb_ruangan', 'Aktif', 'Ya');
        $guru = $this->Admin_Model->getselect('tb_guru', 'id_status_keaktifan', '1');
        $data = array(
            'title' => 'Edit Data Jadwal',
            'page' => 'edit',
            'jadwal' => $jadwal,
            'tahun' => $tahun,
            'kelas' => $kelas,
            'mapel' => $mapel,
            'ruangan' => $ruangan,
            'guru' => $guru,
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('jadwal/jadwal_form', $data);
        $this->load->view('template/footer');
    }
    public function simpan()
    {
        $id = $this->input->post('kodejdwl');
        if (isset($_POST['tambah'])) {
            $data = array(
                'id_tahun_akademik'  => $this->input->post('tahun'),
                'kode_kelas'  => $this->input->post('kelas'),
                'kode_pelajaran'  => $this->input->post('mapel'),
                'kode_ruangan'  => $this->input->post('ruangan'),
                'nip'  => $this->input->post('guru'),
                'paralel'  => $this->input->post('paralel'),
                'jadwal_serial'  => $this->input->post('serial'),
                'jam_mulai'  => $this->input->post('jam_mulai'),
                'jam_selesai'  => $this->input->post('jam_selesai'),
                'hari'  => $this->input->post('hari'),
                'aktif'  => $this->input->post('status'),
            );
            $this->Admin_Model->simpandata('tb_jadwal_pelajaran', $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan');
                redirect('jadwal');
            } else {
                $this->session->set_flashdata('error', 'Data gagal disimpan');
                redirect('jadwal');
            }
        } else {
            $data = array(
                'id_tahun_akademik'  => $this->input->post('tahun'),
                'kode_kelas'  => $this->input->post('kelas'),
                'kode_pelajaran'  => $this->input->post('mapel'),
                'kode_ruangan'  => $this->input->post('ruangan'),
                'nip'  => $this->input->post('guru'),
                'paralel'  => $this->input->post('paralel'),
                'jadwal_serial'  => $this->input->post('serial'),
                'jam_mulai'  => $this->input->post('jam_mulai'),
                'jam_selesai'  => $this->input->post('jam_selesai'),
                'hari'  => $this->input->post('hari'),
                'aktif'  => $this->input->post('status'),
            );
            $this->Admin_Model->editdata('tb_jadwal_pelajaran', 'kodejdwl', $id, $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil diedit');
                redirect('jadwal');
            } else {
                $this->session->set_flashdata('error', 'Data gagal diedit');
                redirect('jadwal');
            }
        }
    }
    public function hapus($id)
    {
        $this->Admin_Model->hapusdata('tb_jadwal_pelajaran', $id, 'kodejdwl');
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
            redirect('jadwal');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
            redirect('jadwal');
        }
    }
}