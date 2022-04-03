<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Golongan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_Model');
        // if (empty($this->session->userdata('username')) and empty($this->session->userdata('password'))) {
        //     redirect('login');
        // }
    }

    public function index()
    {
        $data['golongan'] = $this->Admin_Model->tampildata('tb_golongan', 'id_golongan');
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('golongan/golongan_data', $data);
        $this->load->view('template/footer');
    }
    public function tambah()
    {
        $golongan = new stdClass();
        $golongan->id_golongan = null;
        $golongan->nama_golongan = null;
        $golongan->keterangan = null;
        $data = array(
            'title' => 'Tambah Data golongan',
            'page' => 'tambah',
            'golongan' => $golongan
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('golongan/golongan_form', $data);
        $this->load->view('template/footer');
    }
    public function edit($id)
    {
        $golongan = $this->Admin_Model->formedit('tb_golongan', 'id_golongan', $id);
        $data = array(
            'title' => 'Edit Data golongan',
            'page' => 'edit',
            'golongan' => $golongan
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('golongan/golongan_form', $data);
        $this->load->view('template/footer');
    }
    public function simpan()
    {
        $id = $this->input->post('id_golongan');
        if (isset($_POST['tambah'])) {
            $data = array(
                'nama_golongan'  => $this->input->post('nama_golongan'),
                'keterangan'  => $this->input->post('keterangan'),
            );
            $this->Admin_Model->simpandata('tb_golongan', $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan');
                redirect('golongan');
            } else {
                $this->session->set_flashdata('error', 'Data gagal disimpan');
                redirect('golongan');
            }
        } else {
            $data = array(
                'nama_golongan'  => $this->input->post('nama_golongan'),
                'keterangan'  => $this->input->post('keterangan'),
            );
            $this->Admin_Model->editdata('tb_golongan', 'id_golongan', $id, $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil diedit');
                redirect('golongan');
            } else {
                $this->session->set_flashdata('error', 'Data gagal diedit');
                redirect('golongan');
            }
        }
    }
    public function hapus($id)
    {
        $this->Admin_Model->hapusdata('tb_golongan', $id, 'id_golongan');
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
            redirect('golongan');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
            redirect('golongan');
        }
    }
}
