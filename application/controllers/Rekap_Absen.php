<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekap_Absen extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(['Admin_Model', 'Rekap_Absen_Model']);
        // if (empty($this->session->userdata('username')) and empty($this->session->userdata('password'))) {
        //     redirect('login');
        // }
    }

    public function index()
    {
        $tahun = $this->input->post('tahun');
        $kelas = $this->input->post('kelas');
        $data['rekap_absen'] = $this->Rekap_Absen_Model->tampildata($kelas, '', $tahun);
        $data['tahun'] = $this->Admin_Model->tampildata('tb_tahun_akademik', 'id_tahun_akademik');
        $data['kelas'] = $this->Admin_Model->tampildata('tb_kelas', 'kode_kelas');
        $this->session->set_userdata('tanggal', date('Y-m-d'));
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('rekap_absen/rekap_absen_data', $data);
        $this->load->view('template/footer');
    }
    public function detail($id)
    {
        $detail = $this->Rekap_Absen_Model->tampildata('', $id)->row();
        $rekap_absen = $this->Rekap_Absen_Model->tampilabsensiswa($id);
        $data = array(
            'Rekap_Absen'   => $rekap_absen,
            'detail'        => $detail,
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('rekap_absen/rekap_absen_detail', $data);
        $this->load->view('template/footer');
    }
}
