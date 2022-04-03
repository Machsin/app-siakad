<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Identitas_Sekolah extends CI_Controller
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
        $data['identitas'] = $this->Admin_Model->formedit('tb_identitas_sekolah', 'id_identitas_sekolah', '1');
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('identitas_sekolah/identitas_detail', $data);
        $this->load->view('template/footer');
    }
    public function edit()
    {
        $data['identitas'] = $this->Admin_Model->formedit('tb_identitas_sekolah', 'id_identitas_sekolah', '1');
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('identitas_sekolah/identitas_form', $data);
        $this->load->view('template/footer');
    }
    public function simpan()
    {
        $id = $this->input->post('id_identitas');
        $data = array(
            'nama_sekolah'  => $this->input->post('nama_sekolah'),
            'npsn'          => $this->input->post('npsn'),
            'nss'           => $this->input->post('nss'),
            'alamat_sekolah' => $this->input->post('alamat_sekolah'),
            'kode_pos'      => $this->input->post('kode_pos'),
            'no_telpon'     => $this->input->post('no_telpon'),
            'kelurahan'     => $this->input->post('kelurahan'),
            'kecamatan'     => $this->input->post('kecamatan'),
            'kabupaten_kota' => $this->input->post('kabupaten_kota'),
            'provinsi'      => $this->input->post('provinsi'),
            'website'       => $this->input->post('website'),
            'email'         => $this->input->post('email'),
        );
        // print_r($data);
        $this->Admin_Model->editdata('tb_identitas_sekolah', 'id_identitas_sekolah', $id, $data);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil diedit');
            redirect('identitas_sekolah');
        } else {
            $this->session->set_flashdata('error', 'Data gagal diedit');
            redirect('identitas_sekolah');
        }
    }
}
