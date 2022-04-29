<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(['Admin_Model', 'Guru_Model']);
        // if (empty($this->session->userdata('username')) and empty($this->session->userdata('password'))) {
        //     redirect('login');
        // }
    }

    public function index()
    {
        $data['guru'] = $this->Guru_Model->tampildata();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('guru/guru_data', $data);
        $this->load->view('template/footer');
    }
    public function tambah()
    {
        $guru = new stdClass();
        $guru->nip = null;
        $guru->nama_guru = null;
        $guru->jenis_kelamin = null;
        $guru->tempat_lahir = null;
        $guru->tanggal_lahir = null;
        $guru->nik = null;
        $guru->niy_nigk = null;
        $guru->nuptk = null;
        $guru->id_status_kepegawaian = null;
        $guru->id_jenis_ptk = null;
        $guru->pengawas_bidang_studi = null;
        $guru->agama = null;
        $guru->alamat_jalan = null;
        $guru->rt = '00';
        $guru->rw = '00';
        $guru->nama_dusun = null;
        $guru->desa_kelurahan = null;
        $guru->kecamatan = null;
        $guru->kode_pos = null;
        $guru->telepon = null;
        $guru->hp = null;
        $guru->email = null;
        $guru->tugas_tambahan = null;
        $guru->id_status_keaktifan = null;
        $guru->sk_cpns = null;
        $guru->tanggal_cpns = null;
        $guru->id_status_pernikahan = null;
        $guru->sk_pengangkatan = null;
        $guru->tmt_pengangkatan = null;
        $guru->lembaga_pengangkatan = null;
        $guru->id_golongan = null;
        $guru->npwp = null;
        $guru->foto = null;
        $ptk = $this->Admin_Model->tampildata('tb_jenis_ptk', 'id_jenis_ptk');
        $kepegawaian = $this->Admin_Model->tampildata('tb_kepegawaian', 'id_kepegawaian');
        $golongan = $this->Admin_Model->tampildata('tb_golongan', 'id_golongan');
        $data = array(
            'title' => 'Tambah Data Guru',
            'page' => 'tambah',
            'value' => 'Tambahkan',
            'guru'   => $guru,
            'ptk'   => $ptk,
            'kepegawaian' => $kepegawaian,
            'golongan'  => $golongan
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('guru/guru_form', $data);
        $this->load->view('template/footer');
    }
    public function edit($id)
    {
        $guru = $this->Guru_Model->tampildata($id)->row();
        $ptk = $this->Admin_Model->tampildata('tb_jenis_ptk', 'id_jenis_ptk');
        $kepegawaian = $this->Admin_Model->tampildata('tb_kepegawaian', 'id_kepegawaian');
        $golongan = $this->Admin_Model->tampildata('tb_golongan', 'id_golongan');
        $data = array(
            'title' => 'Edit Data Guru',
            'page' => 'edit',
            'value' => 'Simpan Perubahan',
            'guru'   => $guru,
            'ptk'   => $ptk,
            'kepegawaian' => $kepegawaian,
            'golongan'  => $golongan
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('guru/guru_form', $data);
        $this->load->view('template/footer');
    }
    public function detail($id)
    {
        $id_administrator = $this->session->userdata('id_administrator');
        $akun= $this->Admin_Model->formedit('tb_administrator','id_administrator',$id_administrator);
        $guru = $this->Guru_Model->tampildata($id)->row();
        $data = array(
            'title' => 'Detail Data Guru',
            'page' => 'detail',
            'guru' => $guru,
            'akun' => $akun,
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('guru/guru_detail', $data);
        $this->load->view('template/footer');
    }
    public function simpan()
    {
        $nip = $this->input->post('nip');
        $nama_guru = $this->input->post('nama_guru');
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
        $config['upload_path']    = "./assets/foto/guru";
        $config['allowed_types'] = 'jpg|jpeg|png|jfif';
        $config['file_name']    = 'img-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);
        if ($_FILES['img']['name'] != null) {
            if ($this->upload->do_upload('img')) {
                $this->load->library('image_lib');
                $img = $this->upload->data('file_name');
                //Resize  gambar
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/foto/guru/' . $img;
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 150;
                // $config['height'] = 450;
                $config['new_image'] = './assets/foto/guru/' . $img;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
            } else {
                $error = $this->upload->display_errors(' ');
                $this->session->set_flashdata('error', 'Kesalahaan saat upload gambar ' . $error);
                redirect('guru');
            }
        } else {
            $img = "";
        }
        if (isset($_POST['tambah'])) {
            $data = array(
                'nip' => $nip,
                'nama_guru' => $nama_guru,
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
            $this->Admin_Model->simpandata('tb_guru', $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan');
                redirect('guru');
            } else {
                $this->session->set_flashdata('error', 'Data gagal disimpan');
                redirect('guru');
            }
        } else {
            if ($img == '') {
                $data = array(
                    'nip' => $nip,
                    'nama_guru' => $nama_guru,
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
                $this->Admin_Model->editdata('tb_guru', 'nip', $nip, $data);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    redirect('guru');
                } else {
                    $this->session->set_flashdata('error', 'Data gagal disimpan');
                    redirect('guru');
                }
            } else {
                $data = array(
                    'nip' => $nip,
                    'nama_guru' => $nama_guru,
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
                $this->Admin_Model->editdata('tb_guru', 'nip', $nip, $data);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    redirect('guru');
                } else {
                    $this->session->set_flashdata('error', 'Data gagal disimpan');
                    redirect('guru');
                }
            }
        }
    }
    public function hapus($id)
    {
        $urlfoto = $this->Admin_Model->formedit('tb_guru', 'id_guru', $id)->foto;
        $this->Admin_Model->hapusdata('tb_guru', $id, 'id_guru');
        if ($this->db->affected_rows() > 0) {
            unlink('./assets/foto/guru/' . $urlfoto);
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
            redirect('guru');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
            redirect('guru');
        }
    }
}
