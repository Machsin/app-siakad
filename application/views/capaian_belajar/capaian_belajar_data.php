<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Capaian Belajar
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-th"></i>Data Master</a></li>
            <li class="active">Data Capaian Belajar</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <?php $this->view('pesan') ?>
                        <h3 class="box-title">Data Capaian Belajar</h3>
                        <form style='margin-right:5px; margin-top:0px' class='pull-right' action='<?= base_url('capaian_belajar') ?>' method='POST'>
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
                    <form action="<?=base_url('capaian_belajar/simpan')?>" method="POST">
                        <div class="box-body">
                            <input type="hidden" name="tahun" value="20151">
                            <input type="hidden" name="kelas" value="X.MIPA.1">
                            <table id="example" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">NISN</th>
                                        <th rowspan="2">Nama Siswa</th>
                                        <th colspan="2">
                                            <center>Sikap Spiritual</center>
                                        </th>
                                        <th colspan="2">
                                            <center>Sikap Sosial</center>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <center>Predikat</center>
                                        </th>
                                        <th>
                                            <center>Deskripsi</center>
                                        </th>
                                        <th>
                                            <center>Predikat</center>
                                        </th>
                                        <th>
                                            <center>Deskripsi</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($idtahun != '' && $kodekelas != '') { ?>
                                        <?php
                                        $no = 1;
                                        // $siswa = $this->db->from('tb_siswa')->get();
                                        $siswa = $this->db->from('tb_siswa')->where('kode_kelas', $kodekelas)->get();
                                        foreach ($siswa->result() as $data) {
                                            $cek = $this->db->get_where('tb_nilai_sikap_semester', array('nisn' => $data->nisn, 'id_tahun_akademik' => $idtahun, 'kode_kelas' => $kodekelas));
                                            if ($cek->num_rows() > 0) {
                                                $capaian = $cek->row();
                                            } else {
                                                $capaian = new stdClass();
                                                $capaian->spiritual_predikat = null;
                                                $capaian->spiritual_deskripsi = null;
                                                $capaian->sosial_predikat = null;
                                                $capaian->sosial_deskripsi = null;
                                            }
                                        ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $data->nisn ?></td>
                                                <td><?= $data->nama ?></td>
                                                <input type="hidden" name="idtahun" value="<?= $idtahun ?>">
                                                <input type="hidden" name="kodekelas" value="<?= $kodekelas ?>">
                                                <input type="hidden" name="nisn[]" value="<?= $data->nisn ?>">
                                                <td>
                                                    <center><input type="text" name="spiritual_predikat[]" value="<?= $capaian->spiritual_predikat ?>" style="width:70px; text-align:center; padding:0px; color:blue"></center>
                                                </td>
                                                <td><textarea name="spiritual_deskripsi[]" class="form-control" style="width:100%; color:blue" placeholder="Tuliskan Deskripsi..."><?= $capaian->spiritual_deskripsi ?></textarea></td>
                                                <td>
                                                    <center><input type="text" name="sosial_predikat[]" value="<?= $capaian->sosial_predikat ?>" style="width:70px; text-align:center; padding:0px; color:blue"></center>
                                                </td>
                                                <td><textarea name="sosial_deskripsi[]" class="form-control" style="width:100%; color:blue" placeholder="Tuliskan Deskripsi..."><?= $capaian->sosial_deskripsi ?></textarea></td>
                                            </tr>
                                        <?php } ?>
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
                        <div class="box-footer">
                            <button type="submit" name="simpan" class="btn btn-info">Simpan</button>
                            <button type="reset" class="btn btn-default pull-right">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>