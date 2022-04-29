<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak_Raport extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_Model');
        if (empty($this->session->userdata('username')) and empty($this->session->userdata('password'))) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['tahun'] = $this->Admin_Model->tampildata('tb_tahun_akademik', 'id_tahun_akademik');
        $data['kelas'] = $this->Admin_Model->tampildata('tb_kelas', 'kode_kelas');
        if ($this->session->flashdata('tahun') == '') {
            $data['idtahun'] = $this->input->post('tahun');
            $data['kodekelas'] = $this->input->post('kelas');
        } else {
            $data['idtahun'] = $this->session->flashdata('tahun');
            $data['kodekelas'] = $this->session->flashdata('kelas');
        }
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('cetak/cetak_raport_data', $data);
        $this->load->view('template/footer');
    }
    public function cetak($idtahun, $idsiswa)
    {
        $tahun = $this->Admin_Model->formedit('tb_tahun_akademik','id_tahun_akademik',$idtahun);
        $siswa = $this->Admin_Model->formedit('tb_siswa','id_siswa',$idsiswa);
        $sekolah = $this->Admin_Model->formedit('tb_identitas_sekolah','id_identitas_sekolah','1');
        $kepala = $this->db->query('SELECT * FROM tb_kepala_sekolah LIMIT 1')->row();
        $data = array(
            'tahun' => $tahun,
            'siswa' => $siswa,
            'sekolah' => $sekolah,
            'kepala' => $kepala,
        );
        $this->load->view('cetak/cetak_raport',$data);
    }
}
