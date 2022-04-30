<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Praktek Kerja Lapangan
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-th"></i>Data Master</a></li>
            <li class="active">Data Praktek Kerja Lapangan</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <?php $this->view('pesan') ?>
                        <h3 class="box-title">Data Praktek Kerja Lapangan</h3>
                        <form style='margin-right:5px; margin-top:0px' class='pull-right' action='<?= base_url('pkl') ?>' method='POST'>
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
                                    <th>
                                        <center>Mitra DU/DI</center>
                                    </th>
                                    <th>
                                        <center>Lokasi</center>
                                    </th>
                                    <th width="50px">
                                        <center>Lama(Bulan)</center>
                                    </th>
                                    <th>
                                        <center>Keterangan</center>
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
                                        $cek = $this->db->get_where('tb_pkl', array('nisn' => $data->nisn, 'id_tahun_akademik' => $idtahun, 'kode_kelas' => $kodekelas));
                                    ?>
                                        <form action="<?=base_url('pkl/simpan')?>" method="POST">
                                            <tr>
                                                <td><?=$no++?></td>
                                                <td><?=$data->nisn?></td>
                                                <td style="font-size:12px"><?=$data->nama?></td>
                                                <input type="hidden" name="tahun" value="<?=$idtahun?>">
                                                <input type="hidden" name="kelas" value="<?=$kodekelas?>">
                                                <input type="hidden" name="nisn" value="<?=$data->nisn?>">
                                                <td><input type="text" name="mitra" class="form-control" style="width:100%; color:blue" placeholder="Tuliskan Mitra DU/DI..."></td>
                                                <td><input type="text" name="lokasi" class="form-control" style="width:100%; color:blue" placeholder="Tuliskan Lokasi..."></td>
                                                <td><input type="text" name="lama" class="form-control" style="width:100%; color:blue" placeholder="Tuliskan Lamanya..."></td>
                                                <td><input type="text" name="keterangan" class="form-control" style="width:100%; color:blue" placeholder="Tuliskan Keterangan..."></td>
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
                                                    <td><?= $d->mitra ?></td>
                                                    <td><?= $d->lokasi ?></td>
                                                    <td><?= $d->lama ?></td>
                                                    <td><?= $d->keterangan ?></td>
                                                    <td align="center">
                                                        <a href="<?= base_url('pkl/hapus/' . $d->id_pkl . '/' . $idtahun . '/' . $kodekelas) ?>" class="btn btn-xs btn-danger" onclick="return confirm('Apa anda yakin untuk hapus Data ini?')"><span class="glyphicon glyphicon-remove"></span></a>
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