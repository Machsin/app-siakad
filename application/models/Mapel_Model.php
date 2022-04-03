<?php
class Mapel_model extends CI_Model
{
    public function tampildata($id = NULL)
    {
        $query = $this->db->select('tb_mata_pelajaran.*,tb_jurusan.nama_jurusan,tb_guru.nama_guru')
            ->from('tb_mata_pelajaran')
            ->join('tb_jurusan', 'tb_mata_pelajaran.kode_jurusan = tb_jurusan.kode_jurusan', 'left')
            ->join('tb_guru', 'tb_mata_pelajaran.nip = tb_guru.nip', 'left');
        if ($id != NULL) {
            $query->where('tb_mata_pelajaran.kode_pelajaran', $id);
        }
        return $query->get();
    }
}
