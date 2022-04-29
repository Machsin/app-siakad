<?php
class Administrator_Model extends CI_Model
{
    public function tampildata()
    {

        $query = $this->db->select('tb_administrator.*,tb_guru.nama_guru')
            ->from('tb_administrator')
            ->join('tb_guru', 'tb_administrator.nip = tb_guru.nip', 'left')
            ->order_by('tb_administrator.nip','ASC')
            ->get();
        return $query;
    }
}
