<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_Raport extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(['Admin_Model', 'Nilai_Raport_Model']);
        // if (empty($this->session->userdata('username')) and empty($this->session->userdata('password'))) {
        //     redirect('login');
        // }
    }

    public function index()
    {
        $tahun = $this->input->post('tahun');
        $kelas = $this->input->post('kelas');
        $data['nilai_raport'] = $this->Nilai_Raport_Model->tampildata($kelas, '', $tahun);
        $data['tahun'] = $this->Admin_Model->tampildata('tb_tahun_akademik', 'id_tahun_akademik');
        $data['kelas'] = $this->Admin_Model->tampildata('tb_kelas', 'kode_kelas');
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('nilai_raport/nilai_raport_data', $data);
        $this->load->view('template/footer');
    }
    public function tambahsikap($id)
    {
        $detail = $this->Nilai_Raport_Model->tampildata('', $id)->row();
        $nilai_sikap = $this->Nilai_Raport_Model->tampilnilaisikap($id);
        $data = array(
            'nilai_sikap'     => $nilai_sikap,
            'detail'     => $detail,
            'title'     => "Input Nilai Raport"
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('nilai_raport/nilai_raport_sikap', $data);
        $this->load->view('template/footer');
    }
    public function tambahpengetahuan($id)
    {
        $detail = $this->Nilai_Raport_Model->tampildata('', $id)->row();
        $nilai_pengetahuan = $this->Nilai_Raport_Model->tampilnilaipengetahuan($id);
        $data = array(
            'nilai_pengetahuan'     => $nilai_pengetahuan,
            'detail'     => $detail,
            'title'     => "Input Nilai Raport"
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('nilai_raport/nilai_raport_pengetahuan', $data);
        $this->load->view('template/footer');
    }
    public function tambahketerampilan($id)
    {
        $detail = $this->Nilai_Raport_Model->tampildata('', $id)->row();
        $nilai_keterampilan = $this->Nilai_Raport_Model->tampilnilaiketerampilan($id);
        $data = array(
            'nilai_keterampilan'     => $nilai_keterampilan,
            'detail'     => $detail,
            'title'     => "Input Nilai Raport"
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('nilai_raport/nilai_raport_keterampilan', $data);
        $this->load->view('template/footer');
    }
    public function simpansikap()
    {
        $kodejdwl = $this->input->post('kodejdwl');
        $nisn = $this->input->post('nisn');
        $spiritual_positif = $this->input->post('spiritual_positif');
        $spiritual_negatif = $this->input->post('spiritual_negatif');
        $spiritual_deskripsi = $this->input->post('spiritual_deskripsi');
        $sosial_positif = $this->input->post('sosial_positif');
        $sosial_negatif = $this->input->post('sosial_negatif');
        $sosial_deskripsi = $this->input->post('sosial_deskripsi');
        $tambah = 0;
        $edit = 0;
        for ($i = 0; $i < count($nisn); $i++) {
            if ($spiritual_positif[$i] != null || $spiritual_negatif[$i] != null || $spiritual_deskripsi[$i] != null) {
                $cek = $this->db->get_where('tb_nilai_sikap', array('nisn' => $nisn[$i], 'kodejdwl' => $kodejdwl, 'status' => 'spiritual'));
                if ($cek->num_rows() > 0) {
                    $data = array(
                        'kodejdwl' => $kodejdwl,
                        'nisn' => $nisn[$i],
                        'positif' => $spiritual_positif[$i],
                        'negatif' => $spiritual_negatif[$i],
                        'deskripsi' => $spiritual_deskripsi[$i],
                        'status' => 'spiritual',
                        'user_akses' => '1'
                    );
                    // $edit = $this->Admin_Model->editdata('tb_nilai_nilai_sikap', 'nisn', $nisn[$i], $data);
                    $edit = $this->db->where('nisn', $nisn[$i])->where('kodejdwl', $kodejdwl)->where('status', 'spiritual')->update('tb_nilai_sikap', $data);
                } else {
                    $data = array(
                        'kodejdwl' => $kodejdwl,
                        'nisn' => $nisn[$i],
                        'positif' => $spiritual_positif[$i],
                        'negatif' => $spiritual_negatif[$i],
                        'deskripsi' => $spiritual_deskripsi[$i],
                        'status' => 'spiritual',
                        'user_akses' => '1'
                    );
                    $tambah = $this->Admin_Model->simpandata('tb_nilai_sikap', $data);
                }
            }
            if ($sosial_positif[$i] != null || $sosial_negatif[$i] != null || $sosial_deskripsi[$i] != null) {
                $cek = $this->db->get_where('tb_nilai_sikap', array('nisn' => $nisn[$i], 'kodejdwl' => $kodejdwl, 'status' => 'sosial'));
                if ($cek->num_rows() > 0) {
                    $data = array(
                        'kodejdwl' => $kodejdwl,
                        'nisn' => $nisn[$i],
                        'positif' => $sosial_positif[$i],
                        'negatif' => $sosial_negatif[$i],
                        'deskripsi' => $sosial_deskripsi[$i],
                        'status' => 'sosial',
                        'user_akses' => '1'
                    );
                    // $edit = $this->Admin_Model->editdata('tb_nilai_nilai_sikap', 'nisn', $nisn[$i], $data);
                    $edit = $this->db->where('nisn', $nisn[$i])->where('kodejdwl', $kodejdwl)->where('status', 'sosial')->update('tb_nilai_sikap', $data);
                } else {
                    $data = array(
                        'kodejdwl' => $kodejdwl,
                        'nisn' => $nisn[$i],
                        'positif' => $sosial_positif[$i],
                        'negatif' => $sosial_negatif[$i],
                        'deskripsi' => $sosial_deskripsi[$i],
                        'status' => 'sosial',
                        'user_akses' => '1'
                    );
                    $tambah = $this->Admin_Model->simpandata('tb_nilai_sikap', $data);
                }
            }
        }
        if ($tambah > 0 || $edit > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            redirect('nilai_raport/tambahsikap/' . $kodejdwl);
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            redirect('nilai_raport/tambahsikap/' . $kodejdwl);
        }
    }
    public function simpanpengetahuan()
    {
        $kodejdwl = $this->input->post('kodejdwl');
        $nisn = $this->input->post('nisn');
        $kd = $this->input->post('kd');
        $nilai1 = $this->input->post('nilai1');
        $nilai2 = $this->input->post('nilai2');
        $nilai3 = $this->input->post('nilai3');
        $nilai4 = $this->input->post('nilai4');
        $nilai5 = $this->input->post('nilai5');
        $deskripsi = $this->input->post('deskripsi');
        $tambah = 0;
        for ($i = 0; $i < count($nisn); $i++) {
            if ($kd != null || $nilai1 != null || $nilai2 != null || $nilai3 != null || $nilai4 != null || $nilai5 != null || $deskripsi != null) {
                    $data = array(
                        'kodejdwl' => $kodejdwl,
                        'nisn' => $nisn[$i],
                        'kd'  => $kd[$i],
                        'nilai1'  => $nilai1[$i],
                        'nilai2'  => $nilai2[$i],
                        'nilai3'  => $nilai3[$i],
                        'nilai4'  => $nilai4[$i],
                        'nilai5'  => $nilai5[$i],
                        'deskripsi'  => $deskripsi[$i],
                        'user_akses' => '1'
                    );
                    $tambah = $this->Admin_Model->simpandata('tb_nilai_pengetahuan', $data);
                // }
            }
        }
        if ($tambah > 0 ) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            redirect('nilai_raport/tambahpengetahuan/' . $kodejdwl);
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            redirect('nilai_raport/tambahpengetahuan/' . $kodejdwl);
        }
    }
    public function simpanketerampilan()
    {
        $kodejdwl = $this->input->post('kodejdwl');
        $nisn = $this->input->post('nisn');
        $kd = $this->input->post('kd');
        $nilai1 = $this->input->post('nilai1');
        $nilai2 = $this->input->post('nilai2');
        $nilai3 = $this->input->post('nilai3');
        $nilai4 = $this->input->post('nilai4');
        $nilai5 = $this->input->post('nilai5');
        $nilai6 = $this->input->post('nilai6');
        $deskripsi = $this->input->post('deskripsi');
        $tambah = 0;
        for ($i = 0; $i < count($nisn); $i++) {
            if ($kd != null || $nilai1 != null || $nilai2 != null || $nilai3 != null || $nilai4 != null || $nilai5 != null || $nilai6 != null || $deskripsi != null) {
                    $data = array(
                        'kodejdwl' => $kodejdwl,
                        'nisn' => $nisn[$i],
                        'kd'  => $kd[$i],
                        'nilai1'  => $nilai1[$i],
                        'nilai2'  => $nilai2[$i],
                        'nilai3'  => $nilai3[$i],
                        'nilai4'  => $nilai4[$i],
                        'nilai5'  => $nilai5[$i],
                        'nilai6'  => $nilai6[$i],
                        'deskripsi'  => $deskripsi[$i],
                        'user_akses' => '1'
                    );
                    $tambah = $this->Admin_Model->simpandata('tb_nilai_keterampilan', $data);
                // }
            }
        }
        if ($tambah > 0 ) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            redirect('nilai_raport/tambahketerampilan/' . $kodejdwl);
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            redirect('nilai_raport/tambahketerampilan/' . $kodejdwl);
        }
    }
    public function hapuspengetahuan($id,$kodejdwl){
        $this->Admin_Model->hapusdata('tb_nilai_pengetahuan',$id,'id_nilai_pengetahuan');
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
            redirect('nilai_raport/tambahpengetahuan/' . $kodejdwl);
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
            redirect('nilai_raport/tambahpengetahuan/' . $kodejdwl);
        }
    }
    public function hapusketerampilan($id,$kodejdwl){
        $this->Admin_Model->hapusdata('tb_nilai_keterampilan',$id,'id_nilai_keterampilan');
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
            redirect('nilai_raport/tambahketerampilan/' . $kodejdwl);
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
            redirect('nilai_raport/tambahketerampilan/' . $kodejdwl);
        }
    }
}
