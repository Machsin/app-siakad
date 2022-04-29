<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kompetensi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(['Admin_Model', 'Kompetensi_Model']);
        if (empty($this->session->userdata('username')) and empty($this->session->userdata('password'))) {
            redirect('login');
        }
    }

    public function index()
    {
        $kelas = $this->input->post('kelas');
        $data['kompetensi'] = $this->Kompetensi_Model->tampildata($kelas);
        $data['kelas'] = $this->Admin_Model->tampildata('tb_kelas', 'kode_kelas');
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('kompetensi/kompetensi_data', $data);
        $this->load->view('template/footer');
    }
    public function detail($id)
    {
        $detail = $this->Kompetensi_Model->tampildata('',$id)->row();
        $kompetensi = $this->Kompetensi_Model->tampilkompetensi($id);
        $data = array(
            'kompetensi' => $kompetensi,
            'detail'     => $detail
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('kompetensi/kompetensi_detail', $data);
        $this->load->view('template/footer');
    }
    public function tambah($id)
    {
        $detail = $this->Kompetensi_Model->tampildata('',$id)->row();
        $kompetensi = new stdClass();
        $kompetensi->id_kompetensi_dasar = null;
        $kompetensi->ranah = null;
        $kompetensi->kompetensi_dasar = null;
        $data = array(
            'title' => 'Tambah Data Kompetensi Dasar',
            'page' => 'tambah',
            'kompetensi' => $kompetensi,
            'detail'    => $detail
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('kompetensi/kompetensi_form', $data);
        $this->load->view('template/footer');
    }
    public function edit($id)
    {
        $kompetensi = $this->Admin_Model->formedit('tb_kompetensi_dasar','id_kompetensi_dasar',$id);
        $detail = $this->Kompetensi_Model->tampildata('',$kompetensi->kodejdwl)->row();
        $data = array(
            'title' => 'Edit Data Kompetensi Dasar',
            'page' => 'edit',
            'kompetensi' => $kompetensi,
            'detail'    => $detail
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('kompetensi/kompetensi_form', $data);
        $this->load->view('template/footer');
    }
    public function simpan()
    {
        $kodejdwl = $this->input->post('kodejdwl');
        $id       = $this->input->post('id_kompetensi_dasar');
        if (isset($_POST['tambah'])) {
            $data = array(
                'kodejdwl'  => $this->input->post('kodejdwl'),
                'ranah'  => $this->input->post('ranah'),
                'kompetensi_dasar'  => $this->input->post('kompetensi_dasar'),
            );
            $this->Admin_Model->simpandata('tb_kompetensi_dasar', $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan');
                redirect('kompetensi/detail/'.$kodejdwl);
            } else {
                $this->session->set_flashdata('error', 'Data gagal disimpan');
                redirect('kompetensi/detail/'.$kodejdwl);
            }
        } else {
            $data = array(
                'kodejdwl'  => $this->input->post('kodejdwl'),
                'ranah'  => $this->input->post('ranah'),
                'kompetensi_dasar'  => $this->input->post('kompetensi_dasar'),
            );
            $this->Admin_Model->editdata('tb_kompetensi_dasar', 'id_kompetensi_dasar', $id, $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil diedit');
                redirect('kompetensi/detail/'.$kodejdwl);
            } else {
                $this->session->set_flashdata('error', 'Data gagal diedit');
                redirect('kompetensi/detail/'.$kodejdwl);
            }
        }
    }
    public function hapus($id)
    {
        $this->Admin_Model->hapusdata('tb_kompetensi_dasar', $id, 'id_kompetensi_dasar');
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
            redirect('kompetensi');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
            redirect('kompetensi');
        }
    }
}
