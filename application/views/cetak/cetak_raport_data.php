<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Cetak Raport Siswa
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-th"></i>Data Master</a></li>
            <li class="active">Cetak Raport Siswa</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <?php $this->view('pesan') ?>
                        <h3 class="box-title">Cetak Raport Siswa</h3>
                        <form style='margin-right:5px; margin-top:0px' class='pull-right' action='<?= base_url('cetak_raport') ?>' method='POST'>
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
                                    <th>No</th>
                                    <th>NIPD</th>
                                    <th>NISN</th>
                                    <th>Nama Siswa</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($idtahun != null && $kodekelas != null) {
                                    $no = 1;
                                    $siswa = $this->db->from('tb_siswa')->where('kode_kelas', $kodekelas)->get();
                                    foreach ($siswa->result() as $data) {
                                ?>
                                        <tr>
                                            <td width="40px"><?= $no++ ?></td>
                                            <td><?= $data->nipd ?></td>
                                            <td><?= $data->nisn ?></td>
                                            <td><?= $data->nama ?></td>
                                            <td><?= $data->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' ?></td>
                                            <td width="420px">
                                                <center>
                                                    <a target="_BLANK" class="btn btn-success btn-xs" href="<?=base_url('cetak_raport/cetak/'.$idtahun.'/'.$data->id_siswa)?>"><span class="glyphicon glyphicon-print"></span> Cover</a>
                                                    <a target="_BLANK" class="btn btn-success btn-xs" href="print_raport/print-hal1.php?id=9991268756&amp;kelas=X.MIPA.1&amp;tahun=20161"><span class="glyphicon glyphicon-print"></span> Hal 1</a>
                                                </center>
                                            </td>
                                        </tr>
                                    <?php }
                                } else { ?>
                                    <tr>
                                        <td colspan="6">
                                            <center style="padding:60px; color:red">Silahkan Memilih Tahun akademik dan Kelas Terlebih dahulu...</center>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>