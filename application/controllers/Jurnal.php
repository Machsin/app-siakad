<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurnal extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(['Admin_Model', 'Jurnal_Model']);
        // if (empty($this->session->userdata('username')) and empty($this->session->userdata('password'))) {
        //     redirect('login');
        // }
    }

    public function index()
    {
        $tahun = $this->input->post('tahun');
        $kelas = $this->input->post('kelas');
        $data['jurnal'] = $this->Jurnal_Model->tampildata($kelas,'',$tahun);
        $data['tahun'] = $this->Admin_Model->tampildata('tb_tahun_akademik', 'id_tahun_akademik');
        $data['kelas'] = $this->Admin_Model->tampildata('tb_kelas', 'kode_kelas');
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('jurnal/jurnal_data', $data);
        $this->load->view('template/footer');
    }
    public function detail($id)
    {
        $detail = $this->Jurnal_Model->tampildata('',$id)->row();
        $jurnal = $this->Jurnal_Model->tampiljurnal($id);
        $data = array(
            'jurnal'     => $jurnal,
            'detail'     => $detail
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('jurnal/jurnal_detail', $data);
        $this->load->view('template/footer');
    }
    public function tambah($id)
    {
        $detail = $this->Jurnal_Model->tampildata('',$id)->row();
        $jurnal = new stdClass();
        $jurnal->id_journal = null;
        $jurnal->kodejdwl = null;
        $jurnal->hari = null;
        $jurnal->tanggal = null;
        $jurnal->jam_ke = null;
        $jurnal->materi = null;
        $jurnal->keterangan = null;
        $jurnal->users = null;
        $data = array(
            'title' => 'Tambah Data Jurnal',
            'page' => 'tambah',
            'jurnal' => $jurnal,
            'detail'    => $detail
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('jurnal/jurnal_form', $data);
        $this->load->view('template/footer');
    }
    public function edit($id)
    {
        $jurnal = $this->Admin_Model->formedit('tb_journal_list','id_journal',$id);
        $detail = $this->Jurnal_Model->tampildata('',$jurnal->kodejdwl)->row();
        $data = array(
            'title' => 'Edit Data Journal',
            'page' => 'edit',
            'jurnal' => $jurnal,
            'detail'    => $detail
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('jurnal/jurnal_form', $data);
        $this->load->view('template/footer');
    }
    public function simpan()
    {
        $kodejdwl = $this->input->post('kodejdwl');
        $id       = $this->input->post('id_journal');
        if (isset($_POST['tambah'])) {
            $data = array(
                'kodejdwl'  => $this->input->post('kodejdwl'),
                'hari'  => $this->input->post('hari'),
                'tanggal'  => $this->input->post('tanggal'),
                'jam_ke'  => $this->input->post('jam_ke'),
                'materi'  => $this->input->post('materi'),
                'keterangan'  => $this->input->post('keterangan'),
                'users'  => '1',
            );
            $this->Admin_Model->simpandata('tb_journal_list', $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan');
                redirect('jurnal/detail/'.$kodejdwl);
            } else {
                $this->session->set_flashdata('error', 'Data gagal disimpan');
                redirect('jurnal/detail/'.$kodejdwl);
            }
        } else {
            $data = array(
                'kodejdwl'  => $this->input->post('kodejdwl'),
                'hari'  => $this->input->post('hari'),
                'tanggal'  => $this->input->post('tanggal'),
                'jam_ke'  => $this->input->post('jam_ke'),
                'materi'  => $this->input->post('materi'),
                'keterangan'  => $this->input->post('keterangan'),
                'users'  => '1',
            );
            $this->Admin_Model->editdata('tb_journal_list', 'id_journal', $id, $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil diedit');
                redirect('jurnal/detail/'.$kodejdwl);
            } else {
                $this->session->set_flashdata('error', 'Data gagal diedit');
                redirect('jurnal/detail/'.$kodejdwl);
            }
        }
    }
}