<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kepegawaian extends CI_Controller
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
        $data['kepegawaian'] = $this->Admin_Model->tampildata('tb_kepegawaian', 'id_kepegawaian');
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('kepegawaian/kepegawaian_data', $data);
        $this->load->view('template/footer');
    }
    public function tambah()
    {
        $kepegawaian = new stdClass();
        $kepegawaian->id_kepegawaian = null;
        $kepegawaian->kepegawaian = null;
        $kepegawaian->keterangan = null;
        $data = array(
            'title' => 'Tambah Data Kepegawaian',
            'page' => 'tambah',
            'kepegawaian' => $kepegawaian
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('kepegawaian/kepegawaian_form', $data);
        $this->load->view('template/footer');
    }
    public function edit($id)
    {
        $kepegawaian = $this->Admin_Model->formedit('tb_kepegawaian', 'id_kepegawaian', $id);
        $data = array(
            'title' => 'Edit Data Kepegawaian',
            'page' => 'edit',
            'kepegawaian' => $kepegawaian
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('kepegawaian/kepegawaian_form', $data);
        $this->load->view('template/footer');
    }
    public function simpan()
    {
        $id = $this->input->post('id_kepegawaian');
        if (isset($_POST['tambah'])) {
            $data = array(
                'kepegawaian'  => $this->input->post('kepegawaian'),
                'keterangan'  => $this->input->post('keterangan'),
            );
            $this->Admin_Model->simpandata('tb_kepegawaian', $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan');
                redirect('kepegawaian');
            } else {
                $this->session->set_flashdata('error', 'Data gagal disimpan');
                redirect('kepegawaian');
            }
        } else {
            $data = array(
                'kepegawaian'  => $this->input->post('kepegawaian'),
                'keterangan'  => $this->input->post('keterangan'),
            );
            $this->Admin_Model->editdata('tb_kepegawaian', 'id_kepegawaian', $id, $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil diedit');
                redirect('kepegawaian');
            } else {
                $this->session->set_flashdata('error', 'Data gagal diedit');
                redirect('kepegawaian');
            }
        }
    }
    public function hapus($id)
    {
        $this->Admin_Model->hapusdata('tb_kepegawaian', $id, 'id_kepegawaian');
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
            redirect('kepegawaian');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
            redirect('kepegawaian');
        }
    }
}
