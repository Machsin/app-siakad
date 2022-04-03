<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_UTS extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(['Admin_Model', 'Nilai_UTS_Model']);
        // if (empty($this->session->userdata('username')) and empty($this->session->userdata('password'))) {
        //     redirect('login');
        // }
    }

    public function index()
    {
        $tahun = $this->input->post('tahun');
        $kelas = $this->input->post('kelas');
        $data['nilai_uts'] = $this->Nilai_UTS_Model->tampildata($kelas, '', $tahun);
        $data['tahun'] = $this->Admin_Model->tampildata('tb_tahun_akademik', 'id_tahun_akademik');
        $data['kelas'] = $this->Admin_Model->tampildata('tb_kelas', 'kode_kelas');
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('nilai_uts/nilai_uts_data', $data);
        $this->load->view('template/footer');
    }
    public function tambah($id)
    {
        $detail = $this->Nilai_UTS_Model->tampildata('', $id)->row();
        $nilai_uts = $this->Nilai_UTS_Model->tampilnilaiuts($id);
        $data = array(
            'nilai_uts'     => $nilai_uts,
            'detail'     => $detail,
            'title'     => "Input Nilai UTS"
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('nilai_uts/nilai_uts_form', $data);
        $this->load->view('template/footer');
    }
    public function simpan()
    {
        $kodejdwl = $this->input->post('kodejdwl');
        $nisn = $this->input->post('nisn');
        $angka_pengetahuan = $this->input->post('angka_pengetahuan');
        $angka_keterampilan = $this->input->post('angka_keterampilan');
        $tambah = 0;
        $edit = 0;
        // print_r(count($angka_keterampilan));
        for ($i = 0; $i < count($nisn); $i++) {
            if ($angka_pengetahuan[$i] != null || $angka_keterampilan[$i] != null) {
                $cek_nilai = $this->db->from('tb_nilai_uts')->where('nisn', $nisn[$i])->where('kodejdwl',$kodejdwl)->get();
                if ($cek_nilai->num_rows() > 0) {
                    $data = array(
                        'kodejdwl' => $kodejdwl,
                        'nisn' => $nisn[$i],
                        'angka_pengetahuan' => $angka_pengetahuan[$i],
                        'angka_keterampilan' => $angka_keterampilan[$i]
                    );
                    $edit = $this->Admin_Model->editdata('tb_nilai_uts', 'nisn', $nisn[$i], $data);
                } else {
                    $data = array(
                        'kodejdwl' => $kodejdwl,
                        'nisn' => $nisn[$i],
                        'angka_pengetahuan' => $angka_pengetahuan[$i],
                        'angka_keterampilan' => $angka_keterampilan[$i]
                    );
                    $tambah = $this->Admin_Model->simpandata('tb_nilai_uts', $data);
                }
            }
        }
        if ($tambah > 0 || $edit > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            redirect('nilai_uts/tambah/'.$kodejdwl);
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            redirect('nilai_uts/tambah/'.$kodejdwl);
        }
    }
}
