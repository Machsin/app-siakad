<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prestasi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(['Admin_Model']);
        if (empty($this->session->userdata('username')) and empty($this->session->userdata('password'))) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['tahun'] = $this->Admin_Model->tampildata('tb_tahun_akademik', 'id_tahun_akademik');
        $data['kelas'] = $this->Admin_Model->tampildata('tb_kelas', 'kode_kelas');
        if($this->session->flashdata('tahun')==''){
            $data['idtahun'] = $this->input->post('tahun');
            $data['kodekelas'] = $this->input->post('kelas');
        }else{
            $data['idtahun'] = $this->session->flashdata('tahun');
            $data['kodekelas'] = $this->session->flashdata('kelas');
        }
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('prestasi/prestasi_data', $data);
        $this->load->view('template/footer');
    }
    public function simpan()
    {
        $data = array(
            'id_tahun_akademik' => $this->input->post('tahun'),
            'nisn' => $this->input->post('nisn'),
            'kode_kelas' => $this->input->post('kelas'),
            'jenis_kegiatan' => $this->input->post('kegiatan'),
            'keterangan' => $this->input->post('keterangan'),
            'user_akses' => '1',
        );
        $this->Admin_Model->simpandata('tb_nilai_prestasi', $data);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('tahun',$this->input->post('tahun'));
            $this->session->set_flashdata('kelas',$this->input->post('kelas'));
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            redirect('prestasi');
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            redirect('prestasi');
        }
    }
    public function hapus($id,$tahun,$kelas){
        $this->Admin_Model->hapusdata('tb_nilai_prestasi',$id,'id_nilai_prestasi');
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('tahun',$tahun);
            $this->session->set_flashdata('kelas',$kelas);
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
            redirect('prestasi');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
            redirect('prestasi');
        }
    }
}