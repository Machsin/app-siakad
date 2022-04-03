<?php
class Kelas_model extends CI_Model
{
    public function tampildata()
    {
        $query = $this->db->select('tb_kelas.*, tb_guru.nama_guru,tb_jurusan.nama_jurusan,tb_ruangan.nama_ruangan,tb_gedung.nama_gedung')
            ->from('tb_kelas')
            ->join('tb_guru', 'tb_kelas.nip = tb_guru.nip', 'left')
            ->join('tb_jurusan', 'tb_kelas.kode_jurusan = tb_jurusan.kode_jurusan', 'left')
            ->join('tb_ruangan', 'tb_kelas.kode_ruangan = tb_ruangan.kode_ruangan', 'left')
            ->join('tb_gedung', 'tb_ruangan.kode_gedung = tb_gedung.kode_gedung', 'left')
            ->get();
        return $query;
    }
}
