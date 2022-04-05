<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Absensi Guru
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-th"></i>Data Master</a></li>
            <li class="active">Data Absensi Guru</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <?php $this->view('pesan') ?>
                        <?php $kodejdwl = $this->uri->segment(3) ?>
                        <h3 class="box-title">Data Absensi Guru Pada : <b style="color:red"><?= tgl_indo($tanggal) ?></b></h3>
                        <form style='margin-right:5px; margin-top:0px' class='pull-right' action='<?= base_url('absen_guru') ?>' method='POST'>
                            <select name='tahun' style='padding:4px'>
                                <option value=''>- Pilih Tahun Akademik -</option>
                                <?php foreach ($tahun->result() as $data) { ?>
                                    <option value='<?= $data->id_tahun_akademik ?>'><?= $data->nama_tahun ?></option>
                                <?php } ?>
                            </select>
                            <select name='kelas' style='padding:4px'>
                                <option value=''>- Pilih Kelas -</option>
                                <?php foreach ($kelas->result() as $data) { ?>
                                    <option value='<?= $data->kode_kelas ?>'><?= $data->nama_kelas ?></option>
                                <?php } ?>
                            </select>
                            <input type="submit" style='margin-top:-4px' class='btn btn-success btn-sm' value='Lihat'>
                        </form>
                        <div style="clear:both"></div>
                        <div class="col-md-7 pull-right" style="margin:5px -14px 5px 0px">
                            <form action="<?= base_url('absen_guru') ?>" method="POST" style="margin-bottom:5px">
                                <?php
                                $d = substr($tanggal, '8', '2');
                                $m = substr($tanggal, '5', '2');
                                $y = substr($tanggal, '0', '4');
                                ?>
                                <div class="col-xs-3"><select name="tgl" class="form-control">
                                        <option selected="">- Tanggal -</option>
                                        <?php
                                        for ($i = 1; $i <= 31; $i++) { ?>
                                            <option value="<?= $i ?>" <?= $i == $d ? 'selected' : null ?>><?= $i ?></option>
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
                        </div>
                    </div>
                    <form action="<?=base_url('absen_guru/simpan')?>" method="POST">
                    <input type="hidden" name="tanggal" value="<?=$tanggal?>">
                        <div class="box-body">
                            <table id="example" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width:20px">No</th>
                                        <th>Jadwal Pelajaran</th>
                                        <th>Kelas</th>
                                        <th>Guru</th>
                                        <th>Hari</th>
                                        <th>Mulai</th>
                                        <th>Selesai</th>
                                        <th>Ruangan</th>
                                        <th width="90px">Kehadiran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($absen_guru->result() as $data) {
                                        $cek_absen = $this->db->get_where('tb_absensi_guru', array('nip' => $data->nip, 'kodejdwl' => $data->kodejdwl, 'tanggal' => $tanggal));
                                        if ($cek_absen->num_rows() > 0) {
                                            $absen = $cek_absen->row();
                                        } else {
                                            $absen = new stdClass();
                                            $absen->kode_kehadiran = null;
                                        }
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $data->namamatapelajaran ?></td>
                                            <td><?= $data->nama_kelas ?></td>
                                            <td><?= $data->nama_guru ?></td>
                                            <td><?= $data->hari ?></td>
                                            <td><?= $data->jam_mulai ?></td>
                                            <td><?= $data->jam_selesai ?></td>
                                            <td><?= $data->nama_ruangan ?></td>
                                            <input type="hidden" value="<?= $data->kodejdwl ?>" name="kodejdwl[]">
                                            <input type="hidden" value="<?= $data->nip ?>" name="nip[]">
                                            <td><select style="width:100px;" name="kode_kehadiran[]" class="form-control">
                                                    <option value="">- Pilih -</option>
                                                    <option value="H" <?= $absen->kode_kehadiran == 'H' ? 'selected' : null ?>>Hadir</option>
                                                    <option value="I" <?= $absen->kode_kehadiran == 'I' ? 'selected' : null ?>>Izin</option>
                                                    <option value="S" <?= $absen->kode_kehadiran == 'S' ? 'selected' : null ?>>Sakit</option>
                                                    <option value="A" <?= $absen->kode_kehadiran == 'A' ? 'selected' : null ?>>Alpa</option>
                                                </select></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" name="simpan" class="btn btn-info pull-right">Simpan Absensi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>