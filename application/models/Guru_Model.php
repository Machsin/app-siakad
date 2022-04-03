<?php
class Guru_model extends CI_Model
{
    public function tampildata($id = NULL)
    {
        $query = $this->db->select('tb_guru.*, tb_kepegawaian.kepegawaian,tb_jenis_ptk.jenis_ptk, tb_golongan.nama_golongan')
            ->from('tb_guru')
            ->join('tb_kepegawaian', 'tb_guru.id_status_kepegawaian = tb_kepegawaian.id_kepegawaian', 'left')
            ->join('tb_jenis_ptk', 'tb_guru.id_jenis_ptk = tb_jenis_ptk.id_jenis_ptk', 'left')
            ->join('tb_golongan', 'tb_guru.id_golongan = tb_golongan.id_golongan', 'left');
        if ($id != NULL) {
            $query->where('tb_guru.nip', $id);
        }
        return $query->get();
    }
}
