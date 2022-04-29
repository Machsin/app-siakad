<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Predikat extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(['Admin_Model', 'Predikat_Model']);
        if (empty($this->session->userdata('username')) and empty($this->session->userdata('password'))) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['predikat'] = $this->Predikat_Model->tampildata();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('predikat/predikat_data', $data);
        $this->load->view('template/footer');
    }
    public function tambah()
    {
        $predikat = new stdClass();
        $predikat->id_predikat = null;
        $predikat->kode_kelas = null;
        $predikat->nilai_a = null;
        $predikat->nilai_b = null;
        $predikat->grade = null;
        $predikat->keterangan = null;
        $kelas = $this->Admin_Model->tampildata('tb_kelas', 'kode_kelas');
        $data = array(
            'title' => 'Tambah Data Predikat',
            'page' => 'tambah',
            'predikat' => $predikat,
            'kelas'  => $kelas,
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('predikat/predikat_form', $data);
        $this->load->view('template/footer');
    }
    public function edit($id)
    {
        $predikat = $this->Admin_Model->formedit('tb_predikat', 'id_predikat', $id);
        $kelas = $this->Admin_Model->tampildata('tb_kelas', 'kode_kelas');
        $data = array(
            'title' => 'Edit Data Predikat',
            'page' => 'edit',
            'predikat' => $predikat,
            'kelas' => $kelas,
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('predikat/predikat_form', $data);
        $this->load->view('template/footer');
    }
    public function simpan()
    {
        $id = $this->input->post('id_predikat');
        if (isset($_POST['tambah'])) {
            $data = array(
                'id_predikat'  => $this->input->post('id_predikat'),
                'kode_kelas'  => $this->input->post('kode_kelas'),
                'nilai_a'  => $this->input->post('nilai_a'),
                'nilai_b'  => $this->input->post('nilai_b'),
                'grade'  => $this->input->post('grade'),
                'keterangan'  => $this->input->post('keterangan'),
            );
            $this->Admin_Model->simpandata('tb_predikat', $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan');
                redirect('predikat');
            } else {
                $this->session->set_flashdata('error', 'Data gagal disimpan');
                redirect('predikat');
            }
        } else {
            $data = array(
                'id_predikat'  => $this->input->post('id_predikat'),
                'kode_kelas'  => $this->input->post('kode_kelas'),
                'nilai_a'  => $this->input->post('nilai_a'),
                'nilai_b'  => $this->input->post('nilai_b'),
                'grade'  => $this->input->post('grade'),
                'keterangan'  => $this->input->post('keterangan'),
            );
            $this->Admin_Model->editdata('tb_predikat', 'id_predikat', $id, $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil diedit');
                redirect('predikat');
            } else {
                $this->session->set_flashdata('error', 'Data gagal diedit');
                redirect('predikat');
            }
        }
    }
    public function hapus($id)
    {
        $this->Admin_Model->hapusdata('tb_predikat', $id, 'id_predikat');
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
            redirect('predikat');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
            redirect('predikat');
        }
    }
}
