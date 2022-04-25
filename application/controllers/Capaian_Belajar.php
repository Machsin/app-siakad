<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Capaian_Belajar extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(['Admin_Model', 'Capaian_Belajar_Model']);
        // if (empty($this->session->userdata('username')) and empty($this->session->userdata('password'))) {
        //     redirect('login');
        // }
    }

    public function index()
    {
        $data['tahun'] = $this->Admin_Model->tampildata('tb_tahun_akademik', 'id_tahun_akademik');
        $data['kelas'] = $this->Admin_Model->tampildata('tb_kelas', 'kode_kelas');
        $data['idtahun'] = $this->input->post('tahun');
        $data['kodekelas'] = $this->input->post('kelas');
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('capaian_Belajar/capaian_Belajar_data', $data);
        $this->load->view('template/footer');
    }
    public function simpan()
    {
        $idtahun = $this->input->post('idtahun');
        $kodekelas = $this->input->post('kodekelas');
        $nisn = $this->input->post('nisn');
        $spiritual_p = $this->input->post('spiritual_predikat');
        $spiritual_d = $this->input->post('spiritual_deskripsi');
        $sosial_p = $this->input->post('sosial_predikat');
        $sosial_d = $this->input->post('sosial_deskripsi');
        $tambah = 0;
        $edit = 0;
        for ($i = 0; $i < count($nisn); $i++) {
            if ($spiritual_p[$i] != null || $spiritual_d[$i] != null || $sosial_p[$i] != null || $sosial_d[$i] != null) {
                $cek = $this->db->get_where('tb_nilai_sikap_semester', array('nisn' => $nisn[$i], 'id_tahun_akademik' => $idtahun, 'kode_kelas' => $kodekelas));
                if ($cek->num_rows() > 0) {
                    $data = array(
                        'spiritual_predikat' => $spiritual_p[$i],
                        'spiritual_deskripsi' => $spiritual_d[$i],
                        'sosial_predikat' => $sosial_p[$i],
                        'sosial_deskripsi' => $sosial_d[$i],
                    );
                    $edit = $this->db->where('nisn', $nisn[$i])->where('id_tahun_akademik', $idtahun)->where('kode_kelas', $kodekelas)->update('tb_nilai_sikap_semester', $data);
                } else {
                    $data = array(
                        'nisn'  => $nisn[$i],
                        'id_tahun_akademik'  => $idtahun,
                        'kode_kelas'  => $kodekelas,
                        'user_akses' =>'1',
                        'spiritual_predikat' => $spiritual_p[$i],
                        'spiritual_deskripsi' => $spiritual_d[$i],
                        'sosial_predikat' => $sosial_p[$i],
                        'sosial_deskripsi' => $sosial_d[$i],
                    );
                    $tambah =  $this->Admin_Model->simpandata('tb_nilai_sikap_semester', $data);
                }
            }
        }
        if ($tambah > 0 || $edit > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            redirect('capaian_belajar');
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            redirect('capaian_belajar');
        }
    }
}
