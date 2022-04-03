<?php
class Nilai_UTS_Model extends CI_Model
{
    public function tampildata($kelas = NULL, $kodejdwl = NULL, $tahun= NULL)
    {
        $query = $this->db->select('tb_jadwal_pelajaran.*, tb_tahun_akademik.nama_tahun, tb_kelas.nama_kelas,tb_mata_pelajaran.namamatapelajaran,tb_ruangan.nama_ruangan,tb_guru.nama_guru')
            ->from('tb_jadwal_pelajaran')
            ->join('tb_tahun_akademik', 'tb_jadwal_pelajaran.id_tahun_akademik = tb_tahun_akademik.id_tahun_akademik', 'left')
            ->join('tb_kelas', 'tb_jadwal_pelajaran.kode_kelas = tb_kelas.kode_kelas', 'left')
            ->join('tb_mata_pelajaran', 'tb_jadwal_pelajaran.kode_pelajaran = tb_mata_pelajaran.kode_pelajaran', 'left')
            ->join('tb_ruangan', 'tb_jadwal_pelajaran.kode_ruangan = tb_ruangan.kode_ruangan', 'left')
            ->join('tb_guru', 'tb_jadwal_pelajaran.nip = tb_guru.nip', 'left');
        if ($kelas != NULL) {
            $query->where('tb_jadwal_pelajaran.kode_kelas', $kelas);
        }
        if ($tahun != NULL) {
            $query->where('tb_jadwal_pelajaran.id_tahun_akademik', $tahun);
        }
        if ($kodejdwl != NULL) {
            $query->where('tb_jadwal_pelajaran.kodejdwl', $kodejdwl);
        }
        return $query->get();
    }
    public function tampilnilaiuts($kode)
    {
        $query = $this->db->from('tb_journal_list')->where('kodejdwl', $kode)->get();
        return $query;
    }
}
