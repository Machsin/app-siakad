<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absen_Guru extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(['Admin_Model', 'Absen_Guru_Model']);
        if (empty($this->session->userdata('username')) and empty($this->session->userdata('password'))) {
            redirect('login');
        }
    }

    public function index()
    {
        $tahun = $this->input->post('tahun');
        $kelas = $this->input->post('kelas');
        $d = $this->input->post('tgl');
        $m = $this->input->post('bln');
        $y = $this->input->post('thn');
        $absen_guru = $this->Absen_Guru_Model->tampildata($kelas, '', $tahun);
        $qtahun = $this->Admin_Model->tampildata('tb_tahun_akademik', 'id_tahun_akademik');
        $qkelas = $this->Admin_Model->tampildata('tb_kelas', 'kode_kelas');
        if ($d != null || $m != null || $y != null || $this->session->flashdata('tanggal') != null) {
            if($this->session->flashdata('tanggal') != null){
                $tanggal = $this->session->flashdata('tanggal');
            }else{
                if ($d < 10) {
                    $d = '0' . $d;
                }
                if ($m < 10) {
                    $m = '0' . $m;
                }
                $tanggal = $y . '-' . $m . '-' . $d;
            }
        } else {
            $tanggal = date('Y-m-d');
        }
        $data = array(
            'absen_guru' => $absen_guru,
            'tahun'     => $qtahun,
            'kelas'     => $qkelas,
            'tanggal'   => $tanggal
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('absen_guru/absen_guru_data', $data);
        $this->load->view('template/footer');
    }
    public function simpan()
    {
        $kodejdwl = $this->input->post('kodejdwl');
        $nip = $this->input->post('nip');
        $kode_kehadiran = $this->input->post('kode_kehadiran');
        $tanggal = $this->input->post('tanggal');
        $tambah = 0;
        $edit = 0;
        // print_r(count($angka_keterampilan));
        for ($i = 0; $i < count($nip); $i++) {
            if ($kode_kehadiran[$i] != null) {
                $cek_absen = $this->db->from('tb_absensi_guru')->where('nip', $nip[$i])->where('kodejdwl', $kodejdwl[$i])->where('tanggal', $tanggal)->get();
                if ($cek_absen->num_rows() > 0) {
                    $data = array(
                        'kode_kehadiran' => $kode_kehadiran[$i],
                    );
                    $edit = $this->db->where('nip', $nip[$i])->where('kodejdwl', $kodejdwl[$i])->where('tanggal', $tanggal)->update('tb_absensi_guru', $data);
                } else {
                    $data = array(
                        'kodejdwl' => $kodejdwl[$i],
                        'nip' => $nip[$i],
                        'kode_kehadiran' => $kode_kehadiran[$i],
                        'tanggal' => $tanggal,
                    );
                    $tambah = $this->Admin_Model->simpandata('tb_absensi_guru', $data);
                }
            }
        }
        $this->session->set_flashdata('tanggal', $tanggal);
        if ($tambah > 0 || $edit > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            redirect('absen_guru');
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            redirect('absen_guru');
        }
    }
}
