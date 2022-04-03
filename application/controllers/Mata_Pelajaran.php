<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mata_Pelajaran extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(['Admin_Model', 'Mapel_Model']);
        // if (empty($this->session->userdata('username')) and empty($this->session->userdata('password'))) {
        //     redirect('login');
        // }
    }

    public function index()
    {
        $data['mata_pelajaran'] = $this->Mapel_Model->tampildata();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('mata_pelajaran/mata_pelajaran_data', $data);
        $this->load->view('template/footer');
    }
    public function tambah()
    {
        $mata_pelajaran = new stdClass();
        $mata_pelajaran->kode_pelajaran = null;
        $mata_pelajaran->id_kelompok_mata_pelajaran = null;
        $mata_pelajaran->kode_jurusan = null;
        $mata_pelajaran->nip = null;
        $mata_pelajaran->kode_kurikulum = null;
        $mata_pelajaran->namamatapelajaran = null;
        $mata_pelajaran->namamatapelajaran_en = null;
        $mata_pelajaran->tingkat = null;
        $mata_pelajaran->kompetensi_umum = null;
        $mata_pelajaran->kompetensi_khusus = null;
        $mata_pelajaran->jumlah_jam = null;
        $mata_pelajaran->sesi = null;
        $mata_pelajaran->urutan = null;
        $mata_pelajaran->aktif = 'Ya';
        $kelompok_mapel = $this->Admin_Model->tampildata('tb_kelompok_mapel', 'id_kelompok_mapel');
        $guru = $this->Admin_Model->tampildata('tb_guru', 'nip');
        $jurusan = $this->Admin_Model->tampildata('tb_jurusan', 'kode_jurusan');
        $kurikulum = $this->Admin_Model->tampildata('tb_kurikulum', 'kode_kurikulum');
        $data = array(
            'title' => 'Tambah Data Mata Pelajaran',
            'page' => 'tambah',
            'mata_pelajaran' => $mata_pelajaran,
            'kelompok_mapel'    => $kelompok_mapel,
            'guru'  => $guru,
            'jurusan'   => $jurusan,
            'kurikulum' => $kurikulum
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('mata_pelajaran/mata_pelajaran_form', $data);
        $this->load->view('template/footer');
    }
    public function edit($id)
    {
        $mata_pelajaran = $this->Admin_Model->formedit('tb_mata_pelajaran', 'kode_pelajaran', $id);
        $kelompok_mapel = $this->Admin_Model->tampildata('tb_kelompok_mapel', 'id_kelompok_mapel');
        $guru = $this->Admin_Model->tampildata('tb_guru', 'nip');
        $jurusan = $this->Admin_Model->tampildata('tb_jurusan', 'kode_jurusan');
        $kurikulum = $this->Admin_Model->tampildata('tb_kurikulum', 'kode_kurikulum');
        $data = array(
            'title' => 'Edit Data mata_pelajaran',
            'page' => 'edit',
            'mata_pelajaran' => $mata_pelajaran,
            'kelompok_mapel'    => $kelompok_mapel,
            'guru'  => $guru,
            'jurusan'   => $jurusan,
            'kurikulum' => $kurikulum
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('mata_pelajaran/mata_pelajaran_form', $data);
        $this->load->view('template/footer');
    }
    public function simpan()
    {
        $id = $this->input->post('kode_pelajaran');
        if (isset($_POST['tambah'])) {
            $data = array(
                'kode_pelajaran'  => $this->input->post('kode_pelajaran'),
                'id_kelompok_mata_pelajaran'  => $this->input->post('kelompok'),
                'kode_jurusan'  => $this->input->post('jurusan'),
                'nip'  => $this->input->post('guru'),
                'kode_kurikulum'  => $this->input->post('kurikulum'),
                'namamatapelajaran'  => $this->input->post('nama_mapel'),
                'namamatapelajaran_en'  => $this->input->post('nama_mapel_en'),
                'tingkat'  => $this->input->post('tingkat'),
                'kompetensi_umum'  => $this->input->post('kompetensi_umum'),
                'kompetensi_khusus'  => $this->input->post('kompetensi_khusus'),
                'jumlah_jam'  => $this->input->post('jumlah_jam'),
                'sesi'  => $this->input->post('sesi'),
                'urutan'  => $this->input->post('urutan'),
                'aktif'  => $this->input->post('aktif'),
            );
            $this->Admin_Model->simpandata('tb_mata_pelajaran', $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan');
                redirect('mata_pelajaran');
            } else {
                $this->session->set_flashdata('error', 'Data gagal disimpan');
                redirect('mata_pelajaran');
            }
        } else {
            $data = array(
                'kode_pelajaran'  => $this->input->post('kode_pelajaran'),
                'id_kelompok_mata_pelajaran'  => $this->input->post('kelompok'),
                'kode_jurusan'  => $this->input->post('jurusan'),
                'nip'  => $this->input->post('guru'),
                'kode_kurikulum'  => $this->input->post('kurikulum'),
                'namamatapelajaran'  => $this->input->post('nama_mapel'),
                'namamatapelajaran_en'  => $this->input->post('nama_mapel_en'),
                'tingkat'  => $this->input->post('tingkat'),
                'kompetensi_umum'  => $this->input->post('kompetensi_umum'),
                'kompetensi_khusus'  => $this->input->post('kompetensi_khusus'),
                'jumlah_jam'  => $this->input->post('jumlah_jam'),
                'sesi'  => $this->input->post('sesi'),
                'urutan'  => $this->input->post('urutan'),
                'aktif'  => $this->input->post('aktif'),
            );
            $this->Admin_Model->editdata('tb_mata_pelajaran', 'kode_pelajaran', $id, $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil diedit');
                redirect('mata_pelajaran');
            } else {
                $this->session->set_flashdata('error', 'Data gagal diedit');
                redirect('mata_pelajaran');
            }
        }
    }
    public function hapus($id)
    {
        $this->Admin_Model->hapusdata('tb_mata_pelajaran', $id, 'kode_pelajaran');
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
            redirect('mata_pelajaran');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
            redirect('mata_pelajaran');
        }
    }
}
