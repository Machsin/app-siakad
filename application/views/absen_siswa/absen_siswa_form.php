<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Absensi Siswa
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-th"></i>Data Master</a></li>
            <li class="active">Data Absensi Siswa</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <?php $this->view('pesan') ?>
                        <?php $kodejdwl = $this->uri->segment(3) ?>
                        <h3 class="box-title">Data Absensi Siswa Pada : <b style="color:red"><?= tgl_indo($tanggal) ?></b></h3>
                        <a class='pull-right btn btn-default btn-sm' style="margin-right:5px" href='<?= base_url('absen_siswa') ?>'>Kembali</a>
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
                        <form action="<?= base_url('absen_siswa/lihat_absen') ?>" method="POST" class="col-md-7 pull-right" style="margin-bottom:5px">
                            <input type="hidden" name="kodejdwl" value="<?= $detail->kodejdwl ?>">
                            <?php
                            $d = substr($tanggal, '8', '2');
                            $m = substr($tanggal, '5', '2');
                            $y = substr($tanggal, '0', '4');
                            ?>
                            <div class="col-xs-3"><select name="tgl" class="form-control">
                                    <option selected="">- Tanggal -</option>
                                    <?php
                                    for ($i = 1; $i <= 31; $i++) { ?>
                                        <option value="<?= $i ?>" <?= $i ==$d ? 'selected' : null ?>><?= $i ?></option>
                                    <?php } ?>
                                </select></div>
                            <div class="col-xs-4"><select name="bln" class="form-control">
                                    <option selected="">- Bulan -</option>
                                    <option value="1" <?= $m == '1' ? 'selected' : null ?>>Januari</option>
                                    <option value="2" <?= $m == '2' ? 'selected' : null ?>>Februari</option>
                                    <option value="3" <?= $m == '3' ? 'selected' : null ?>>Maret</option>
                                    <option value="4" <?= $m == '4' ? 'selected' : null ?>>April</option>
                                    <option value="5" <?= $m == '5' ? 'selected' : null ?>>Mei</option>
                                    <option value="6" <?= $m == '6' ? 'selected' : null ?>>Juni</option>
                                    <option value="7" <?= $m == '7' ? 'selected' : null ?>>Juli</option>
                                    <option value="8" <?= $m == '8' ? 'selected' : null ?>>Agustus</option>
                                    <option value="9" <?= $m == '9' ? 'selected' : null ?>>September</option>
                                    <option value="10" <?= $m == '10' ? 'selected' : null ?>>Oktober</option>
                                    <option value="11" <?= $m == '11' ? 'selected' : null ?>>November</option>
                                    <option value="12" <?= $m == '12' ? 'selected' : null ?>>Desember</option>
                                </select></div>
                            <div class="col-xs-3"><select name="thn" class="form-control">
                                    <option selected="">- Tahun -</option>
                                    <?php
                                    for ($i = 2015; $i <= date('Y'); $i++) { ?>
                                        <option value="<?= $i ?>" <?= $i == $y ? 'selected' : null ?>><?= $i ?></option>
                                    <?php } ?>
                                </select></div>
                            <input name="lihat" class="btn btn-primary" type="submit" value="Lihat Absen">
                        </form>
                        <form class="form-horizontal" action="<?= base_url('absen_siswa/simpan') ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="kodejdwl" value="<?= $detail->kodejdwl ?>">
                            <input type="hidden" name="tanggal" value="<?= $tanggal ?>">
                            <div class="col-md-12">
                                <table class="table table-condensed table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIPD</th>
                                            <th>NISN</th>
                                            <th>Nama Siswa</th>
                                            <th>Jenis Kelamin</th>
                                            <th width="120px">Kehadiran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $siswa = $this->db->from('tb_siswa')->where('kode_kelas', $detail->kode_kelas)->get();
                                        foreach ($siswa->result() as $data) {
                                            $cek_absen = $this->db->get_where('tb_absensi_siswa', array('nisn' => $data->nisn, 'kodejdwl' => $detail->kodejdwl, 'tanggal' => $tanggal));
                                            if ($cek_absen->num_rows() > 0) {
                                                $absen = $cek_absen->row();
                                            } else {
                                                $absen = new stdClass();
                                                $absen->kode_kehadiran = null;
                                            }
                                        ?>

                                            <input type="hidden" value="<?= $data->nisn ?>" name="nisn[]">
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $data->nipd ?></td>
                                                <td><?= $data->nisn ?></td>
                                                <td><?= $data->nama ?></td>
                                                <td><?= $data->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
                                                <td>
                                                    <select style="width:100px;" name="kode_kehadiran[]" class="form-control">
                                                        <option value="">- Pilih -</option>
                                                        <option value="H" <?= $absen->kode_kehadiran == 'H' ? 'selected' : null ?>>Hadir</option>
                                                        <option value="I" <?= $absen->kode_kehadiran == 'I' ? 'selected' : null ?>>Izin</option>
                                                        <option value="S" <?= $absen->kode_kehadiran == 'S' ? 'selected' : null ?>>Sakit</option>
                                                        <option value="A" <?= $absen->kode_kehadiran == 'A' ? 'selected' : null ?>>Alpa</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                    <div class="box-footer">
                        <a href="<?= base_url('absen_siswa') ?>" class="btn btn-default">Kembali</a>
                        <button type="submit" class="btn btn-info">simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>