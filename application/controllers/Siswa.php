<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(['Admin_Model', 'Siswa_Model']);
        if (empty($this->session->userdata('username')) and empty($this->session->userdata('password'))) {
            redirect('login');
        }
    }

    public function index()
    {
        $angkatan = $this->input->post('angkatan');
        $kelas = $this->input->post('kelas');
        $data['siswa'] = $this->Siswa_Model->tampildata($angkatan, $kelas);
        $data['kelas'] = $this->Admin_Model->tampildata('tb_kelas', 'kode_kelas');
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('siswa/siswa_data', $data);
        $this->load->view('template/footer');
    }
    public function tambah()
    {
        $siswa = new stdClass();
        $siswa->id_siswa = null;
        $siswa->nipd = null;
        $siswa->nama = null;
        $siswa->jenis_kelamin = null;
        $siswa->nisn = null;
        $siswa->angkatan = null;
        $siswa->kode_jurusan = null;
        $siswa->tempat_lahir = null;
        $siswa->tanggal_lahir = null;
        $siswa->nik = null;
        $siswa->agama = null;
        $siswa->alamat = null;
        $siswa->rt = '00';
        $siswa->rw = '00';
        $siswa->dusun = null;
        $siswa->kelurahan = null;
        $siswa->kecamatan = null;
        $siswa->kode_pos = null;
        $siswa->telepon = null;
        $siswa->hp = null;
        $siswa->email = null;
        $siswa->foto = null;
        $siswa->nama_ayah = null;
        $siswa->tahun_lahir_ayah = null;
        $siswa->pendidikan_ayah = null;
        $siswa->pekerjaan_ayah = null;
        $siswa->penghasilan_ayah = null;
        $siswa->kebutuhan_khusus_ayah = null;
        $siswa->no_telpon_ayah = null;
        $siswa->nama_ibu = null;
        $siswa->tahun_lahir_ibu = null;
        $siswa->pendidikan_ibu = null;
        $siswa->pekerjaan_ibu = null;
        $siswa->penghasilan_ibu = null;
        $siswa->kebutuhan_khusus_ibu = null;
        $siswa->no_telpon_ibu = null;
        $siswa->nama_wali = null;
        $siswa->tahun_lahir_wali = null;
        $siswa->pendidikan_wali = null;
        $siswa->pekerjaan_wali = null;
        $siswa->penghasilan_wali = null;
        $jurusan = $this->Admin_Model->tampildata('tb_jurusan', 'kode_jurusan');
        $data = array(
            'title' => 'Tambah Data Siswa',
            'page' => 'tambah',
            'value' => 'Tambahkan',
            'siswa' => $siswa,
            'jurusan' => $jurusan
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('siswa/siswa_form', $data);
        $this->load->view('template/footer');
    }
    public function edit($id)
    {
        $siswa = $this->Siswa_Model->tampildata('', '', $id)->row();
        $jurusan = $this->Admin_Model->tampildata('tb_jurusan', 'kode_jurusan');
        $data = array(
            'title' => 'Edit Data Siswa',
            'page' => 'edit',
            'value' => 'Simpan Perubahan',
            'siswa' => $siswa,
            'jurusan' => $jurusan
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('siswa/siswa_form', $data);
        $this->load->view('template/footer');
    }
    public function detail($id)
    {
        $siswa = $this->Siswa_Model->tampildata('', '', $id)->row();

        $data = array(
            'title' => 'Detail Data siswa',
            'page' => 'detail',
            'siswa' => $siswa,
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('siswa/siswa_detail', $data);
        $this->load->view('template/footer');
    }
    public function getkelas()
    {

        if (isset($_POST['kode_jurusan'])) {
            $kode_jur = $_POST['kode_jurusan'];
        }
        $jurusan = array();
        if ($kode_jur != '') {
            $kelas = $this->db->select('*')->from('tb_kelas')->where('kode_jurusan', $kode_jur)->get();
            foreach ($kelas->result() as $data) {
                $kode_kelas = $data->kode_kelas;
                $nama_kelas = $data->nama_kelas;

                $jurusan[] = array("jurusan" => $kode_kelas, "kelas" => $nama_kelas);
            }

            // encoding array to json format
            echo json_encode($jurusan);
        }
    }
    public function simpan()
    {
        $id = $this->input->post('id_siswa');
        $nipd = $this->input->post('nipd');
        $nisn = $this->input->post('nisn');
        $nama = $this->input->post('nama');
        $jurusan = $this->input->post('jurusan');
        $angkatan = $this->input->post('angkatan');
        $kelas = $this->input->post('kelas');
        $alamat_siswa = $this->input->post('alamat_siswa');
        $rtrw = $this->input->post('rt'); // 00/00
        $rt = substr($rtrw, 0, 2);
        $rw = substr($rtrw, 3, 2);
        $dusun = $this->input->post('dusun');
        $kelurahan = $this->input->post('kelurahan');
        $kecamatan = $this->input->post('kecamatan');
        $kode_pos = $this->input->post('kode_pos');
        $nik = $this->input->post('nik');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $agama = $this->input->post('agama');
        $no_telpon = $this->input->post('no_telpon');
        $email = $this->input->post('email');
        $status_siswa = $this->input->post('status_siswa');
        $nama_ayah = $this->input->post('nama_ayah');
        $tahun_lahir_ayah = $this->input->post('tahun_lahir_ayah');
        $pendidikan_ayah = $this->input->post('pendidikan_ayah');
        $pekerjaan_ayah = $this->input->post('pekerjaan_ayah');
        $penghasilan_ayah = $this->input->post('penghasilan_ayah');
        $kebutuhan_khusus_ayah = $this->input->post('kebutuhan_khusus_ayah');
        $telpon_ayah = $this->input->post('telpon_ayah');
        $nama_ibu = $this->input->post('nama_ibu');
        $tahun_lahir_ibu = $this->input->post('tahun_lahir_ibu');
        $pendidikan_ibu = $this->input->post('pendidikan_ibu');
        $pekerjaan_ibu = $this->input->post('pekerjaan_ibu');
        $penghasilan_ibu = $this->input->post('penghasilan_ibu');
        $kebutuhan_khusus_ibu = $this->input->post('kebutuhan_khusus_ibu');
        $telpon_ibu = $this->input->post('telpon_ibu');
        $nama_wali = $this->input->post('nama_wali');
        $tahun_lahir_wali = $this->input->post('tahun_lahir_wali');
        $pendidikan_wali = $this->input->post('pendidikan_wali');
        $pekerjaan_wali = $this->input->post('pekerjaan_wali');
        $penghasilan_wali = $this->input->post('penghasilan_wali');
        //upload img
        $config['upload_path']    = "./assets/foto/siswa";
        $config['allowed_types'] = 'jpg|jpeg|png|jfif';
        $config['file_name']    = 'img-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);
        if ($_FILES['img']['name'] != null) {
            if ($this->upload->do_upload('img')) {
                $this->load->library('image_lib');
                $img = $this->upload->data('file_name');
                //Resize  gambar
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/foto/siswa/' . $img;
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 150;
                // $config['height'] = 450;
                $config['new_image'] = './assets/foto/siswa/' . $img;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
            } else {
                $error = $this->upload->display_errors(' ');
                $this->session->set_flashdata('error', 'Kesalahaan saat upload gambar ' . $error);
                redirect('siswa');
            }
        } else {
            $img = "";
        }
        if (isset($_POST['tambah'])) {
            $data = array(
                'nipd'  => $nipd,
                'nisn'  => $nisn,
                'nama'  => $nama,
                'kode_jurusan'  => $jurusan,
                'angkatan'  => $angkatan,
                'kode_kelas'  => $kelas,
                'alamat'  => $alamat_siswa,
                'rt'  => $rt,
                'rw'  => $rw,
                'dusun'  => $dusun,
                'kelurahan'  => $kelurahan,
                'kecamatan'  => $kecamatan,
                'kode_pos'  => $kode_pos,
                'nik'  => $nik,
                'tempat_lahir'  => $tempat_lahir,
                'tanggal_lahir'  => $tanggal_lahir,
                'jenis_kelamin'  => $jenis_kelamin,
                'agama'  => $agama,
                'hp'  => $no_telpon,
                'email'  => $email,
                'status_awal'  => 'Baru',
                'status_siswa'  => $status_siswa,
                'nama_ayah'  => $nama_ayah,
                'tahun_lahir_ayah'  => $tahun_lahir_ayah,
                'pendidikan_ayah'  => $pendidikan_ayah,
                'pekerjaan_ayah'  => $pekerjaan_ayah,
                'penghasilan_ayah'  => $penghasilan_ayah,
                'kebutuhan_khusus_ayah'  => $kebutuhan_khusus_ayah,
                'no_telpon_ayah'  => $telpon_ayah,
                'nama_ibu'  => $nama_ibu,
                'tahun_lahir_ibu'  => $tahun_lahir_ibu,
                'pendidikan_ibu'  => $pendidikan_ibu,
                'pekerjaan_ibu'  => $pekerjaan_ibu,
                'penghasilan_ibu'  => $penghasilan_ibu,
                'kebutuhan_khusus_ibu'  => $kebutuhan_khusus_ibu,
                'no_telpon_ibu'  => $telpon_ibu,
                'nama_wali'  => $nama_wali,
                'tahun_lahir_wali'  => $tahun_lahir_wali,
                'pendidikan_wali'  => $pendidikan_wali,
                'pekerjaan_wali'  => $pekerjaan_wali,
                'penghasilan_wali'  => $penghasilan_wali,
                'foto'  => $img,
            );
            // print_r($data);
            $this->Admin_Model->simpandata('tb_siswa', $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan');
                redirect('siswa');
            } else {
                $this->session->set_flashdata('error', 'Data gagal disimpan');
                redirect('siswa');
            }
        }else{
            if($img==''){
                $data = array(
                    'nipd'  => $nipd,
                    'nisn'  => $nisn,
                    'nama'  => $nama,
                    'kode_jurusan'  => $jurusan,
                    'angkatan'  => $angkatan,
                    'kode_kelas'  => $kelas,
                    'alamat'  => $alamat_siswa,
                    'rt'  => $rt,
                    'rw'  => $rw,
                    'dusun'  => $dusun,
                    'kelurahan'  => $kelurahan,
                    'kecamatan'  => $kecamatan,
                    'kode_pos'  => $kode_pos,
                    'nik'  => $nik,
                    'tempat_lahir'  => $tempat_lahir,
                    'tanggal_lahir'  => $tanggal_lahir,
                    'jenis_kelamin'  => $jenis_kelamin,
                    'agama'  => $agama,
                    'hp'  => $no_telpon,
                    'email'  => $email,
                    'status_awal'  => 'Baru',
                    'status_siswa'  => $status_siswa,
                    'nama_ayah'  => $nama_ayah,
                    'tahun_lahir_ayah'  => $tahun_lahir_ayah,
                    'pendidikan_ayah'  => $pendidikan_ayah,
                    'pekerjaan_ayah'  => $pekerjaan_ayah,
                    'penghasilan_ayah'  => $penghasilan_ayah,
                    'kebutuhan_khusus_ayah'  => $kebutuhan_khusus_ayah,
                    'no_telpon_ayah'  => $telpon_ayah,
                    'nama_ibu'  => $nama_ibu,
                    'tahun_lahir_ibu'  => $tahun_lahir_ibu,
                    'pendidikan_ibu'  => $pendidikan_ibu,
                    'pekerjaan_ibu'  => $pekerjaan_ibu,
                    'penghasilan_ibu'  => $penghasilan_ibu,
                    'kebutuhan_khusus_ibu'  => $kebutuhan_khusus_ibu,
                    'no_telpon_ibu'  => $telpon_ibu,
                    'nama_wali'  => $nama_wali,
                    'tahun_lahir_wali'  => $tahun_lahir_wali,
                    'pendidikan_wali'  => $pendidikan_wali,
                    'pekerjaan_wali'  => $pekerjaan_wali,
                    'penghasilan_wali'  => $penghasilan_wali,
                );
                // print_r($data);
                $this->Admin_Model->editdata('tb_siswa','id_siswa',$id, $data);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    redirect('siswa');
                } else {
                    $this->session->set_flashdata('error', 'Data gagal disimpan');
                    redirect('siswa');
                }
            }else{
                $data = array(
                    'nipd'  => $nipd,
                    'nisn'  => $nisn,
                    'nama'  => $nama,
                    'kode_jurusan'  => $jurusan,
                    'angkatan'  => $angkatan,
                    'kode_kelas'  => $kelas,
                    'alamat'  => $alamat_siswa,
                    'rt'  => $rt,
                    'rw'  => $rw,
                    'dusun'  => $dusun,
                    'kelurahan'  => $kelurahan,
                    'kecamatan'  => $kecamatan,
                    'kode_pos'  => $kode_pos,
                    'nik'  => $nik,
                    'tempat_lahir'  => $tempat_lahir,
                    'tanggal_lahir'  => $tanggal_lahir,
                    'jenis_kelamin'  => $jenis_kelamin,
                    'agama'  => $agama,
                    'hp'  => $no_telpon,
                    'email'  => $email,
                    'status_awal'  => 'Baru',
                    'status_siswa'  => $status_siswa,
                    'nama_ayah'  => $nama_ayah,
                    'tahun_lahir_ayah'  => $tahun_lahir_ayah,
                    'pendidikan_ayah'  => $pendidikan_ayah,
                    'pekerjaan_ayah'  => $pekerjaan_ayah,
                    'penghasilan_ayah'  => $penghasilan_ayah,
                    'kebutuhan_khusus_ayah'  => $kebutuhan_khusus_ayah,
                    'no_telpon_ayah'  => $telpon_ayah,
                    'nama_ibu'  => $nama_ibu,
                    'tahun_lahir_ibu'  => $tahun_lahir_ibu,
                    'pendidikan_ibu'  => $pendidikan_ibu,
                    'pekerjaan_ibu'  => $pekerjaan_ibu,
                    'penghasilan_ibu'  => $penghasilan_ibu,
                    'kebutuhan_khusus_ibu'  => $kebutuhan_khusus_ibu,
                    'no_telpon_ibu'  => $telpon_ibu,
                    'nama_wali'  => $nama_wali,
                    'tahun_lahir_wali'  => $tahun_lahir_wali,
                    'pendidikan_wali'  => $pendidikan_wali,
                    'pekerjaan_wali'  => $pekerjaan_wali,
                    'penghasilan_wali'  => $penghasilan_wali,
                    'foto'  => $img,
                );
                // print_r($data);
                $this->Admin_Model->editdata('tb_siswa','id_siswa',$id, $data);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    redirect('siswa');
                } else {
                    $this->session->set_flashdata('error', 'Data gagal disimpan');
                    redirect('siswa');
                }
            }
        }
    }
    public function hapus($id)
    {
        $urlfoto = $this->Admin_Model->formedit('tb_siswa', 'id_siswa', $id)->foto;
        $this->Admin_Model->hapusdata('tb_siswa', $id, 'id_siswa');
        if ($this->db->affected_rows() > 0) {
            unlink('./assets/foto/siswa/' . $urlfoto);
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
            redirect('siswa');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
            redirect('siswa');
        }
    }
}
