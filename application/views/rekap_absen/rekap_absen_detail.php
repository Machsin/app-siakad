<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Rekap Absensi Siswa
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-th"></i>Data Master</a></li>
            <li class="active">Rekap Absensi Siswa</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <?php $this->view('pesan') ?>
                        <?php $kodejdwl = $this->uri->segment(3) ?>
                        <h3 class="box-title">Rekap Absensi Siswa <?= $detail->nama_tahun ?></h3>
                        <a class='pull-right btn btn-default btn-sm' style="margin-right:5px" href='<?= base_url('rekap_absen') ?>'>Kembali</a>
                    </div>
                    <div class="box-body">
                        <div class="col-md-12">
                            <table class="table table-condensed table-hover">
                                <tbody>
                                    <input type="hidden" name="id" value="">
                                    <tr>
                                        <th width="120px" scope="row">Kode Kelas</th>
                                        <td><?= $detail->kode_kelas ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nama Kelas</th>
                                        <td><?= $detail->nama_kelas ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Mata Pelajaran</th>
                                        <td><?= $detail->namamatapelajaran ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12">
                            <table class="table table-condensed table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NISN</th>
                                        <th>Nama Siswa</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Pertemuan</th>
                                        <th>Hadir</th>
                                        <th>Sakit</th>
                                        <th>Izin</th>
                                        <th>Alpa</th>
                                        <th>
                                            <center>% Kehadiran</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = $this->db->from('tb_siswa')->where('kode_kelas', $detail->kode_kelas)->get();
                                    $no = 1;
                                    $tpertemuan='0';
                                    foreach ($query->result() as $data) {
                                        $cek_absen = $this->db->get_where('tb_absensi_siswa', array('nisn' => $data->nisn, 'kodejdwl' => $detail->kodejdwl));
                                        if ($cek_absen->num_rows() > 0) {
                                            $absen = $cek_absen->row();
                                            $pertemuan = $this->db->query("SELECT * FROM `tb_absensi_siswa` where kodejdwl='$detail->kodejdwl' GROUP BY tanggal");
                                            $hadir = $this->db->get_where('tb_absensi_siswa', array('nisn' => $data->nisn, 'kodejdwl' => $detail->kodejdwl, 'kode_kehadiran' => 'H'))->num_rows();
                                            $sakit = $this->db->get_where('tb_absensi_siswa', array('nisn' => $data->nisn, 'kodejdwl' => $detail->kodejdwl, 'kode_kehadiran' => 'I'))->num_rows();
                                            $izin = $this->db->get_where('tb_absensi_siswa', array('nisn' => $data->nisn, 'kodejdwl' => $detail->kodejdwl, 'kode_kehadiran' => 'S'))->num_rows();
                                            $alpa = $this->db->get_where('tb_absensi_siswa', array('nisn' => $data->nisn, 'kodejdwl' => $detail->kodejdwl, 'kode_kehadiran' => 'A'))->num_rows();
                                            if($pertemuan->num_rows() > 0){
                                                $tpertemuan = $pertemuan->num_rows();
                                            }
                                            $kehadiran = $hadir / ($tpertemuan)*100;
                                        } else {
                                            $hadir = "0";
                                            $sakit = "0";
                                            $izin = "0";
                                            $alpa = "0";
                                            $kehadiran ="0";
                                        }
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $data->nisn ?></td>
                                            <td><?= $data->nama ?></td>
                                            <td><?= $data->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
                                            <td align="center"><?= $tpertemuan ?></td>
                                            <td align="center"><?= $hadir ?></td>
                                            <td align="center"><?= $sakit ?></td>
                                            <td align="center"><?= $izin ?></td>
                                            <td align="center"><?= $alpa ?></td>
                                            <td align="right"><?= $kehadiran?> %</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>