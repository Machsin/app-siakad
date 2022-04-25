<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Extrakulikuler
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-th"></i>Data Master</a></li>
            <li class="active">Data Extrakulikuler</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <?php $this->view('pesan') ?>
                        <h3 class="box-title">Data Extrakulikuler</h3>
                        <form style='margin-right:5px; margin-top:0px' class='pull-right' action='<?= base_url('extrakulikuler') ?>' method='POST'>
                            <select name='tahun' style='padding:4px'>
                                <option value=''>- Pilih Tahun Akademik -</option>
                                <?php foreach ($tahun->result() as $data) { ?>
                                    <option value='<?= $data->id_tahun_akademik ?>' <?= $idtahun == $data->id_tahun_akademik ? 'selected' : null ?>><?= $data->nama_tahun ?></option>
                                <?php } ?>
                            </select>
                            <select name='kelas' style='padding:4px'>
                                <option value=''>- Pilih Kelas -</option>
                                <?php foreach ($kelas->result() as $data) { ?>
                                    <option value='<?= $data->kode_kelas ?>' <?= $kodekelas == $data->kode_kelas ? 'selected' : null ?>><?= $data->nama_kelas ?></option>
                                <?php } ?>
                            </select>
                            <input type="submit" style='margin-top:-4px' class='btn btn-success btn-sm' value='Lihat'>
                        </form>
                    </div>
                    <div class="box-body">
                        <table id="example" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th rowspan="2">No</th>
                                    <th>NISN</th>
                                    <th width="170px">Nama Siswa</th>
                                    <th width="240px">
                                        <center>Kegiatan Extrakulikuler</center>
                                    </th>
                                    <th>
                                        <center>Nilai</center>
                                    </th>
                                    <th>
                                        <center>Deskripsi</center>
                                    </th>
                                    <th>
                                        <center>Action</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($idtahun != '' && $kodekelas != '') { ?>
                                    <?php
                                    $no = 1;
                                    $siswa = $this->db->from('tb_siswa')->where('kode_kelas', $kodekelas)->get();
                                    foreach ($siswa->result() as $data) {
                                        $cek = $this->db->get_where('tb_nilai_extrakulikuler', array('nisn' => $data->nisn, 'id_tahun_akademik' => $idtahun, 'kode_kelas' => $kodekelas));
                                    ?>
                                        <form action="<?=base_url('extrakulikuler/simpan')?>" method="POST">
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $data->nisn ?></td>
                                                <td style="font-size:12px"><?= $data->nama ?></td>
                                                <input type="hidden" name="tahun" value="<?=$idtahun?>">
                                                <input type="hidden" name="kelas" value="<?=$kodekelas?>">
                                                <input type="hidden" name="nisn" value="<?=$data->nisn?>">
                                                <td><input type="text" name="kegiatan" class="form-control" style="width:100%; color:blue" placeholder="Tuliskan Kegiatan..."></td>
                                                <td>
                                                    <center><input type="text" class="form-control" name="nilai" style="width:50px; text-align:center; padding:0px; color:blue"></center>
                                                </td>
                                                <td><input type="text" name="deskripsi" class="form-control" style="width:100%; color:blue" placeholder="Tuliskan Deskripsi..."></td>
                                                <td align="center"><input type="submit" name="simpan" class="btn btn-xs btn-primary" style="width:65px" value="Simpan"></td>
                                            </tr>
                                        </form>
                                        <?php if ($cek->num_rows() > 0) {
                                            foreach ($cek->result() as $d) {
                                        ?>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><?= $d->kegiatan ?></td>
                                                    <td align="center"><?= $d->nilai ?></td>
                                                    <td><?= $d->deskripsi ?></td>
                                                    <td align="center">
                                                        <a href="<?=base_url('extrakulikuler/hapus/'.$d->id_nilai_extrakulikuler.'/'.$idtahun.'/'.$kodekelas)?>" class="btn btn-xs btn-danger" onclick="return confirm('Apa anda yakin untuk hapus Data ini?')"><span class="glyphicon glyphicon-remove"></span></a>
                                                    </td>
                                                </tr>
                                    <?php }
                                        }
                                    } ?>
                                <?php } else { ?>
                                    <tr>
                                        <td colspan="7">
                                            <center style="padding:60px; color:red">Silahkan Memilih Tahun akademik dan Kelas Terlebih dahulu...</center>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>