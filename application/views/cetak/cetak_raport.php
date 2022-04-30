<html>

<head>
    <title>Cover Raport Siswa</title>
    <link rel="icon" href="<?= base_url('assets/logo.png') ?>" type="image/x-icon" />
    <!-- <link rel="stylesheet" href="../bootstrap/css/printer.css"> -->
    <style type="text/css">
        /* Kode CSS Untuk PAGE ini dibuat oleh http://jsfiddle.net/2wk6Q/1/ */
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #FFFF;
            font: 11pt "Times New Roman";
        }

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .page {
            width: 210mm;
            min-height: 297mm;
            padding: 0 20mm;
            margin: 10mm auto;
            border: 1px #FFF solid;
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .subpage {
            padding: 2mm;
            /* border: 5px red solid; */
            height: 257mm;
            outline: 2cm #FFF solid;
        }

        @page {
            size: A4;
            margin: 0;
        }

        @media print {

            html,
            body {
                width: 210mm;
                height: 297mm;
            }

            .page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }
        }

        table.rapor td {
            padding-left: 5px;
            padding-bottom: 25px;
            padding-right: 15px;
        }

        table.tentang td {
            padding-left: 5px;
            padding-bottom: 2px;
            padding-right: 5px;
        }

        #cetak {
            border-collapse: collapse;
            width: 100%;
        }

        #cetak td,
        #cetak th {
            border: 1px solid #000;
            padding: 5px;
        }
    </style>
</head>

<?php
$kelas = $this->db->get_where('tb_kelas', array('kode_kelas' => $siswa->kode_kelas))->row();
$header = "<table>
    <tr>
        <td>Nama Peserta Didik</td>
        <td>:</td>
        <td>$siswa->nama</td>
    </tr>
    <tr>
        <td>Nomor Induk/NISN</td>
        <td>:</td>
        <td>$siswa->nisn</td>
    </tr>
    <tr>
        <td>Kelas</td>
        <td>:</td>
        <td>$kelas->nama_kelas</td>
    </tr>
    <tr>
        <td>Tahun Pelajaran</td>
        <td>:</td>
        <td>$tahun->keterangan</td>
    </tr>
    <tr>
        <td>Semester</td>
        <td>:</td>
        <td>$tahun->nama_tahun</td>
    </tr>
</table>";
?>

<body>
    <div class="book">
        <div class="page">
            <div class="subpage">
                <?= $header ?>
                <br>
                <br>
                <strong>A. Nilai Akademik</strong>
                <br>
                <table id="cetak" style="width: 100%">
                    <thead>
                        <tr>
                            <th width="20px">No</th>
                            <th width="250px">Mata Pelajaran</th>
                            <th>Pengetahuan</th>
                            <th>Keterampilan</th>
                            <th>Nilai Akhir</th>
                            <th>Predikat</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    $kelompok_mapel = $this->db->from('tb_kelompok_mapel')->order_by('id_kelompok_mapel', 'ASC')->get();
                    foreach ($kelompok_mapel->result() as $data) {
                    ?>
                        <thead>
                            <tr>
                                <th colspan="6" align="left"><?= $data->jenis_kelompok_mapel . '. ' . $data->nama_kelompok_mapel ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $mapel = $this->db->from('tb_mata_pelajaran')->where('id_kelompok_mata_pelajaran', $data->id_kelompok_mapel)->order_by('urutan', 'ASC')->get();
                            foreach ($mapel->result() as $m) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $m->namamatapelajaran ?></td>
                                    <?php
                                    $jadwal_mapel = $this->db->get_where('tb_jadwal_pelajaran', array('id_tahun_akademik' => $tahun->id_tahun_akademik, 'kode_kelas' => $siswa->kode_kelas, 'kode_pelajaran' => $m->kode_pelajaran));
                                    if ($jadwal_mapel->num_rows() > 0) {
                                        $jadwal_mapel = $jadwal_mapel->row();
                                    } else {
                                        $jadwal_mapel = new stdClass();
                                        $jadwal_mapel->kodejdwl = null;
                                    }
                                    $rapnp = $this->db->query("SELECT sum((nilai1+nilai2+nilai3+nilai4+nilai5)/5)/count($siswa->nisn) as raport FROM tb_nilai_pengetahuan where kodejdwl='$jadwal_mapel->kodejdwl' AND nisn='$siswa->nisn'")->row();
                                    $rapnt = $this->db->query("SELECT sum((nilai1+nilai2+nilai3+nilai4+nilai5+nilai6)/6)/count($siswa->nisn) as raport FROM tb_nilai_keterampilan where kodejdwl='$jadwal_mapel->kodejdwl' AND nisn='$siswa->nisn'")->row();
                                    $nakhir = ($rapnp->raport + $rapnt->raport) / 2;
                                    $predikat = $this->db->query("SELECT * FROM `tb_predikat` WHERE " . number_format($nakhir) . " >= nilai_a && " . number_format($nakhir) . " <= nilai_b;")->row();
                                    ?>
                                    <td align="center"><?= number_format($rapnp->raport) ?></td>
                                    <td align="center"><?= number_format($rapnt->raport) ?></td>
                                    <td align="center"><?= number_format($nakhir) ?></td>
                                    <td align="center"><?= $predikat->grade ?></td>
                                </tr>
                        </tbody>
                <?php }
                        } ?>
                </table>
                <br>
                <br>
                <strong>B. Catatan Akademik</strong>
                <br>
                <table id="cetak" style="width: 100%">
                    <tr>
                        <td>
                            <?php
                            $catatan = $this->db->get_where('tb_catatan_akademik', array('id_tahun_akademik' => $tahun->id_tahun_akademik, 'nisn' => $siswa->nisn, 'kode_kelas' => $siswa->kode_kelas));
                            if ($catatan->num_rows() > 0) {
                                $catatan = $catatan->row();
                            } else {
                                $catatan = new stdClass();
                                $catatan->catatan = null;
                            }
                            echo $catatan->catatan;
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="page">
            <div class="subpage">
                <?= $header ?>
                <br>
                <br>
                <strong>C. Praktik Kerja Lapangan</strong>
                <br>
                <table id="cetak" style="width: 100%">
                    <thead>
                        <tr>
                            <th width="20px">No.</th>
                            <th align="center">Mitra DU/DI</th>
                            <th align="center">Lokasi</th>
                            <th align="center">Lamanya(Bulan)</th>
                            <th align="center">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $pkl = $this->db->from('tb_pkl')->where('id_tahun_akademik', $tahun->id_tahun_akademik)->where('nisn', $siswa->nisn)->where('kode_kelas', $siswa->kode_kelas)->get();
                        foreach ($pkl->result() as $data) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data->mitra ?></td>
                                <td><?= $data->lokasi ?></td>
                                <td><?= $data->lama ?></td>
                                <td><?= $data->keterangan ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <br>
                <br>
                <strong>D. Extrakurikuler</strong>
                <br>
                <table id="cetak" style="width: 100%">
                    <thead>
                        <tr>
                            <th width="20px">No.</th>
                            <th align="center">Kegiatan Extrakurikuler</th>
                            <th align="center">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $extrakurikuler = $this->db->from('tb_nilai_extrakulikuler')->where('id_tahun_akademik', $tahun->id_tahun_akademik)->where('nisn', $siswa->nisn)->where('kode_kelas', $siswa->kode_kelas)->get();
                        foreach ($extrakurikuler->result() as $data) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data->kegiatan ?></td>
                                <td><?= $data->deskripsi ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <br>
                <br>
                <strong>E. Ketidakhadiran</strong>
                <br>
                <table id="cetak" style="width: 60%;">
                    <tbody>
                        <?php
                        $jadwal_mapel = $this->db->from('tb_jadwal_pelajaran')->where('id_tahun_akademik', $tahun->id_tahun_akademik)->get();
                        $tsakit = 0;
                        $tijin = 0;
                        $talpa = 0;
                        foreach ($jadwal_mapel->result() as $j) {
                            $sakit = $this->db->from('tb_absensi_siswa')->where('kodejdwl', $j->kodejdwl)->where('nisn', $siswa->nisn)->where('kode_kehadiran', 'S')->get()->num_rows();
                            $tsakit = $tsakit + $sakit;
                            $ijin = $this->db->from('tb_absensi_siswa')->where('kodejdwl', $j->kodejdwl)->where('nisn', $siswa->nisn)->where('kode_kehadiran', 'I')->get()->num_rows();
                            $tijin = $tijin + $ijin;
                            $alpa = $this->db->from('tb_absensi_siswa')->where('kodejdwl', $j->kodejdwl)->where('nisn', $siswa->nisn)->where('kode_kehadiran', 'A')->get()->num_rows();
                            $talpa = $talpa + $alpa;
                        }
                        ?>
                        <tr>
                            <td>Sakit</td>
                            <td>:</td>
                            <td><?= $tsakit ?> hari</td>
                        </tr>
                        <tr>
                            <td>Ijin</td>
                            <td>:</td>
                            <td><?= $tijin ?> hari</td>
                        </tr>
                        <tr>
                            <td>Tanpa Keterangan</td>
                            <td>:</td>
                            <td><?= $talpa ?> hari</td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <br>
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 40%;vertical-align: baseline;">Orang Tua/Wali,
                        <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            __________________
                        </td>
                        <td></td>
                        <td style="width: 40%;">
                            Lumajang, <?= tgl_raport(date('Y-m-d')) ?> <br>
                            Wali Kelas
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <?php
                            $kelas = $this->db->get_where('tb_kelas', array('kode_kelas' => $siswa->kode_kelas))->row();
                            $guru = $this->db->get_where('tb_guru', array('nip' => $kelas->nip))->row();
                            ?>
                            <u><?= $guru->nama_guru ?></u> <br>
                            <?= $guru->niy_nigk ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"><br></td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center">
                            Mengetahui <br>
                            Kepala Sekolah,
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <u><?= $kepala->nama_kepala_sekolah ?></u><br>
                            <?= $kepala->niy_nigk ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>

</html>