<?php
class Predikat_Model extends CI_Model
{

    public function tampildata()
    {
        $query = $this->db->select('tb_predikat.*,tb_kelas.nama_kelas')
            ->from('tb_predikat')
            ->join('tb_kelas', 'tb_kelas.kode_kelas = tb_predikat.kode_kelas')
            ->get();
        return $query;
    }
}
