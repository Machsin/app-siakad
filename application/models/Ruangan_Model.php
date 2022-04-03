<?php
class Ruangan_model extends CI_Model
{
    public function tampildata()
    {
        $query = $this->db->select('tb_ruangan.*, tb_gedung.nama_gedung')
            ->from('tb_ruangan')
            ->join('tb_gedung', 'tb_ruangan.kode_gedung = tb_gedung.kode_gedung', 'left')
            ->get();
        return $query;
    }
}
