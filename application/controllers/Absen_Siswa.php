<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absen_Siswa extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(['Admin_Model', 'Absen_Siswa_Model']);
        // if (empty($this->session->userdata('username')) and empty($this->session->userdata('password'))) {
        //     redirect('login');
        // }
    }

    public function index()
    {
        $tahun = $this->input->post('tahun');
        $kelas = $this->input->post('kelas');
        $data['absen_siswa'] = $this->Absen_Siswa_Model->tampildata($kelas, '', $tahun);
        $data['tahun'] = $this->Admin_Model->tampildata('tb_tahun_akademik', 'id_tahun_akademik');
        $data['kelas'] = $this->Admin_Model->tampildata('tb_kelas', 'kode_kelas');
        $this->session->set_userdata('tanggal', date('Y-m-d'));
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('absen_siswa/absen_siswa_data', $data);
        $this->load->view('template/footer');
    }
    public function tambah($id)
    {
        $detail = $this->Absen_Siswa_Model->tampildata('', $id)->row();
        $date = $this->session->flashdata('date');
        if ($date != null) {
            $absen_siswa = $this->Absen_Siswa_Model->tampilabsensiswa($id);
            $tanggal = $date;
        } else {
            $absen_siswa = $this->Absen_Siswa_Model->tampilabsensiswa($id);
            $tanggal = $this->session->userdata('tanggal');
        }
        $data = array(
            'absen_siswa'     => $absen_siswa,
            'detail'     => $detail,
            'tanggal'   => $tanggal
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('absen_siswa/absen_siswa_form', $data);
        $this->load->view('template/footer');
    }
    public function lihat_absen()
    {
        $kodejdwl = $this->input->post('kodejdwl');
        $d = $this->input->post('tgl');
        $m = $this->input->post('bln');
        $y = $this->input->post('thn');
        if ($d < 10) {
            $d = '0' . $d;
        }
        if ($m < 10) {
            $m = '0' . $m;
        }
        $tanggal = $y . '-' . $m . '-' . $d;
        $this->session->set_flashdata('date', $tanggal);
        redirect('absen_siswa/tambah/' . $kodejdwl);
    }
    public function simpan()
    {
        $kodejdwl = $this->input->post('kodejdwl');
        $nisn = $this->input->post('nisn');
        $kode_kehadiran = $this->input->post('kode_kehadiran');
        $tanggal = $this->input->post('tanggal');
        $tambah = 0;
        $edit = 0;
        // print_r(count($angka_keterampilan));
        for ($i = 0; $i < count($nisn); $i++) {
            if ($kode_kehadiran[$i] != null) {
                $cek_absen = $this->db->from('tb_absensi_siswa')->where('nisn', $nisn[$i])->where('kodejdwl', $kodejdwl)->where('tanggal', $tanggal)->get();
                if ($cek_absen->num_rows() > 0) {
                    $data = array(
                        'kode_kehadiran' => $kode_kehadiran[$i],
                    );
                    // $edit = $this->Admin_Model->editdata('tb_absensi_siswa', 'nisn', $nisn[$i], $data);
                    $edit = $this->db->where('nisn', $nisn[$i])->where('kodejdwl', $kodejdwl)->where('tanggal', $tanggal)->update('tb_absensi_siswa', $data);
                } else {
                    $data = array(
                        'kodejdwl' => $kodejdwl,
                        'nisn' => $nisn[$i],
                        'kode_kehadiran' => $kode_kehadiran[$i],
                        'tanggal' => $tanggal,
                    );
                    $tambah = $this->Admin_Model->simpandata('tb_absensi_siswa', $data);
                }
            }
        }
        $this->session->set_userdata('tanggal', $tanggal);
        if ($tambah > 0 || $edit > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            redirect('absen_siswa/tambah/' . $kodejdwl);
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            redirect('absen_siswa/tambah/' . $kodejdwl);
        }
    }
}
