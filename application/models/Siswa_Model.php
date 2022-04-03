<?php
class Siswa_model extends CI_Model
{
    public function tampildata($angkatan = NULL, $kelas = NULL, $id = NULL)
    {
        $query = $this->db->select('tb_siswa.*, tb_jurusan.nama_jurusan, tb_kelas.nama_kelas')
            ->from('tb_siswa')
            ->join('tb_jurusan', 'tb_siswa.kode_jurusan = tb_jurusan.kode_jurusan', 'left')
            ->join('tb_kelas', 'tb_siswa.kode_kelas = tb_kelas.kode_kelas', 'left');
        if ($angkatan != NULL) {
            $query->where('tb_siswa.angkatan', $angkatan);
        }
        if ($kelas != NULL) {
            $query->where('tb_siswa.kode_kelas', $kelas);
        }
        if ($id != NULL) {
            $query->where('tb_siswa.id_siswa', $id);
        }
        return $query->get();
    }
}
