<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kepala_Sekolah extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(['Admin_Model', 'KepalaS_Model']);
        // if (empty($this->session->userdata('username')) and empty($this->session->userdata('password'))) {
        //     redirect('login');
        // }
    }

    public function index()
    {
        $data['kepala_sekolah'] = $this->KepalaS_Model->tampildata();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('kepala_sekolah/kepala_sekolah_data', $data);
        $this->load->view('template/footer');
    }
    public function tambah()
    {
        $kepala_sekolah = new stdClass();
        $kepala_sekolah->nip = null;
        $kepala_sekolah->nama_kepala_sekolah = null;
        $kepala_sekolah->jenis_kelamin = null;
        $kepala_sekolah->tempat_lahir = null;
        $kepala_sekolah->tanggal_lahir = null;
        $kepala_sekolah->nik = null;
        $kepala_sekolah->niy_nigk = null;
        $kepala_sekolah->nuptk = null;
        $kepala_sekolah->id_status_kepegawaian = null;
        $kepala_sekolah->id_jenis_ptk = null;
        $kepala_sekolah->pengawas_bidang_studi = null;
        $kepala_sekolah->agama = null;
        $kepala_sekolah->alamat_jalan = null;
        $kepala_sekolah->rt = '00';
        $kepala_sekolah->rw = '00';
        $kepala_sekolah->nama_dusun = null;
        $kepala_sekolah->desa_kelurahan = null;
        $kepala_sekolah->kecamatan = null;
        $kepala_sekolah->kode_pos = null;
        $kepala_sekolah->telepon = null;
        $kepala_sekolah->hp = null;
        $kepala_sekolah->email = null;
        $kepala_sekolah->tugas_tambahan = null;
        $kepala_sekolah->id_status_keaktifan = null;
        $kepala_sekolah->sk_cpns = null;
        $kepala_sekolah->tanggal_cpns = null;
        $kepala_sekolah->id_status_pernikahan = null;
        $kepala_sekolah->sk_pengangkatan = null;
        $kepala_sekolah->tmt_pengangkatan = null;
        $kepala_sekolah->lembaga_pengangkatan = null;
        $kepala_sekolah->id_golongan = null;
        $kepala_sekolah->npwp = null;
        $kepala_sekolah->foto = null;
        $ptk = $this->Admin_Model->tampildata('tb_jenis_ptk', 'id_jenis_ptk');
        $kepegawaian = $this->Admin_Model->tampildata('tb_kepegawaian', 'id_kepegawaian');
        $golongan = $this->Admin_Model->tampildata('tb_golongan', 'id_golongan');
        $data = array(
            'title' => 'Tambah Data Kepala Sekolah',
            'page' => 'tambah',
            'value' => 'Tambahkan',
            'kepala_sekolah'   => $kepala_sekolah,
            'ptk'   => $ptk,
            'kepegawaian' => $kepegawaian,
            'golongan'  => $golongan
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('kepala_sekolah/kepala_sekolah_form', $data);
        $this->load->view('template/footer');
    }
    public function edit($id)
    {
        $kepala_sekolah = $this->KepalaS_Model->tampildata($id)->row();
        $ptk = $this->Admin_Model->tampildata('tb_jenis_ptk', 'id_jenis_ptk');
        $kepegawaian = $this->Admin_Model->tampildata('tb_kepegawaian', 'id_kepegawaian');
        $golongan = $this->Admin_Model->tampildata('tb_golongan', 'id_golongan');
        $data = array(
            'title' => 'Edit Data Kepala Sekolah',
            'page' => 'edit',
            'value' => 'Simpan Perubahan',
            'kepala_sekolah'   => $kepala_sekolah,
            'ptk'   => $ptk,
            'kepegawaian' => $kepegawaian,
            'golongan'  => $golongan
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('kepala_sekolah/kepala_sekolah_form', $data);
        $this->load->view('template/footer');
    }
    public function detail($id)
    {
        $kepala_sekolah = $this->KepalaS_Model->tampildata($id)->row();
        $data = array(
            'title' => 'Detail Data Kepala Sekolah',
            'page' => 'detail',
            'kepala_sekolah' => $kepala_sekolah,
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('kepala_sekolah/kepala_sekolah_detail', $data);
        $this->load->view('template/footer');
    }
    public function simpan()
    {
        $nip = $this->input->post('nip');
        $nama_kepala_sekolah = $this->input->post('nama_kepala_sekolah');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $agama = $this->input->post('agama');
        $hp = $this->input->post('hp');
        $email = $this->input->post('email');
        $alamat = $this->input->post('alamat');
        $rtrw = $this->input->post('rtrw');
        $rt = substr($rtrw, 0, 2);
        $rw = substr($rtrw, 3, 2);
        $dusun = $this->input->post('dusun');
        $kelurahan = $this->input->post('kelurahan');
        $kecamatan = $this->input->post('kecamatan');
        $kodepos = $this->input->post('kodepos');
        $nuptk = $this->input->post('nuptk');
        $bidang_studi = $this->input->post('bidang_studi');
        $jenis_ptk = $this->input->post('jenis_ptk');
        $tugas = $this->input->post('tugas');
        $kepegawaian = $this->input->post('kepegawaian');
        $status = $this->input->post('status');
        $nikah = $this->input->post('nikah');
        $nik = $this->input->post('nik');
        $skcpns = $this->input->post('skcpns');
        $tanggal_cpns = $this->input->post('tanggal_cpns');
        $sk_pengangkat = $this->input->post('sk_pengangkat');
        $tmt_pengangkat = $this->input->post('tmt_pengangkat');
        $lemb_pengangkat = $this->input->post('lemb_pengangkat');
        $golongan = $this->input->post('golongan');
        $niy = $this->input->post('niy');
        $npwp = $this->input->post('npwp');
        //upload img
        $config['upload_path']    = "./assets/foto/kepala_sekolah";
        $config['allowed_types'] = 'jpg|jpeg|png|jfif';
        $config['file_name']    = 'img-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);
        if ($_FILES['img']['name'] != null) {
            if ($this->upload->do_upload('img')) {
                $this->load->library('image_lib');
                $img = $this->upload->data('file_name');
                //Resize  gambar
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/foto/kepala_sekolah/' . $img;
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 150;
                // $config['height'] = 450;
                $config['new_image'] = './assets/foto/kepala_sekolah/' . $img;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
            } else {
                $error = $this->upload->display_errors(' ');
                $this->session->set_flashdata('error', 'Kesalahaan saat upload gambar ' . $error);
                redirect('kepala_sekolah');
            }
        } else {
            $img = "";
        }
        if (isset($_POST['tambah'])) {
            $data = array(
                'nip' => $nip,
                'nama_kepala_sekolah' => $nama_kepala_sekolah,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'jenis_kelamin' => $jenis_kelamin,
                'agama' => $agama,
                'hp' => $hp,
                'email' => $email,
                'alamat_jalan' => $alamat,
                'rt' => $rt,
                'rw' => $rw,
                'nama_dusun' => $dusun,
                'desa_kelurahan' => $kelurahan,
                'kecamatan' => $kecamatan,
                'kode_pos' => $kodepos,
                'nuptk' => $nuptk,
                'pengawas_bidang_studi' => $bidang_studi,
                'id_jenis_ptk' => $jenis_ptk,
                'tugas_tambahan' => $tugas,
                'id_status_kepegawaian' => $kepegawaian,
                'id_status_keaktifan' => $status,
                'id_status_pernikahan' => $nikah,
                'nik' => $nik,
                'sk_cpns' => $skcpns,
                'tanggal_cpns' => $tanggal_cpns,
                'sk_pengangkatan' => $sk_pengangkat,
                'tmt_pengangkatan' => $tmt_pengangkat,
                'lembaga_pengangkatan' => $lemb_pengangkat,
                'id_golongan' => $golongan,
                'niy_nigk' => $niy,
                'npwp' => $npwp,
                'foto' => $img,
            );
            // print_r($data);
            $this->Admin_Model->simpandata('tb_kepala_sekolah', $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan');
                redirect('kepala_sekolah');
            } else {
                $this->session->set_flashdata('error', 'Data gagal disimpan');
                redirect('kepala_sekolah');
            }
        } else {
            if ($img == '') {
                $data = array(
                    'nip' => $nip,
                    'nama_kepala_sekolah' => $nama_kepala_sekolah,
                    'tempat_lahir' => $tempat_lahir,
                    'tanggal_lahir' => $tanggal_lahir,
                    'jenis_kelamin' => $jenis_kelamin,
                    'agama' => $agama,
                    'hp' => $hp,
                    'email' => $email,
                    'alamat_jalan' => $alamat,
                    'rt' => $rt,
                    'rw' => $rw,
                    'nama_dusun' => $dusun,
                    'desa_kelurahan' => $kelurahan,
                    'kecamatan' => $kecamatan,
                    'kode_pos' => $kodepos,
                    'nuptk' => $nuptk,
                    'pengawas_bidang_studi' => $bidang_studi,
                    'id_jenis_ptk' => $jenis_ptk,
                    'tugas_tambahan' => $tugas,
                    'id_status_kepegawaian' => $kepegawaian,
                    'id_status_keaktifan' => $status,
                    'id_status_pernikahan' => $nikah,
                    'nik' => $nik,
                    'sk_cpns' => $skcpns,
                    'tanggal_cpns' => $tanggal_cpns,
                    'sk_pengangkatan' => $sk_pengangkat,
                    'tmt_pengangkatan' => $tmt_pengangkat,
                    'lembaga_pengangkatan' => $lemb_pengangkat,
                    'id_golongan' => $golongan,
                    'niy_nigk' => $niy,
                    'npwp' => $npwp,
                );
                // print_r($data);
                $this->Admin_Model->editdata('tb_kepala_sekolah', 'nip', $nip, $data);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    redirect('kepala_sekolah');
                } else {
                    $this->session->set_flashdata('error', 'Data gagal disimpan');
                    redirect('kepala_sekolah');
                }
            } else {
                $data = array(
                    'nip' => $nip,
                    'nama_kepala_sekolah' => $nama_kepala_sekolah,
                    'tempat_lahir' => $tempat_lahir,
                    'tanggal_lahir' => $tanggal_lahir,
                    'jenis_kelamin' => $jenis_kelamin,
                    'agama' => $agama,
                    'hp' => $hp,
                    'email' => $email,
                    'alamat_jalan' => $alamat,
                    'rt' => $rt,
                    'rw' => $rw,
                    'nama_dusun' => $dusun,
                    'desa_kelurahan' => $kelurahan,
                    'kecamatan' => $kecamatan,
                    'kode_pos' => $kodepos,
                    'nuptk' => $nuptk,
                    'pengawas_bidang_studi' => $bidang_studi,
                    'id_jenis_ptk' => $jenis_ptk,
                    'tugas_tambahan' => $tugas,
                    'id_status_kepegawaian' => $kepegawaian,
                    'id_status_keaktifan' => $status,
                    'id_status_pernikahan' => $nikah,
                    'nik' => $nik,
                    'sk_cpns' => $skcpns,
                    'tanggal_cpns' => $tanggal_cpns,
                    'sk_pengangkatan' => $sk_pengangkat,
                    'tmt_pengangkatan' => $tmt_pengangkat,
                    'lembaga_pengangkatan' => $lemb_pengangkat,
                    'id_golongan' => $golongan,
                    'niy_nigk' => $niy,
                    'npwp' => $npwp,
                    'foto' => $img,
                );
                // print_r($data);
                $this->Admin_Model->editdata('tb_kepala_sekolah', 'nip', $nip, $data);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    redirect('kepala_sekolah');
                } else {
                    $this->session->set_flashdata('error', 'Data gagal disimpan');
                    redirect('kepala_sekolah');
                }
            }
        }
    }
    public function hapus($id)
    {
        $urlfoto = $this->Admin_Model->formedit('tb_kepala_sekolah', 'id_kepala_sekolah', $id)->foto;
        $this->Admin_Model->hapusdata('tb_kepala_sekolah', $id, 'id_kepala_sekolah');
        if ($this->db->affected_rows() > 0) {
            unlink('./assets/foto/kepala_sekolah/' . $urlfoto);
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
            redirect('kepala_sekolah');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
            redirect('kepala_sekolah');
        }
    }
}
