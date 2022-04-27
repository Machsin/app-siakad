<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Nilai Raport
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-th"></i>Data Master</a></li>
            <li>Data Nilai Raport</li>
            <li class="active"><?= $title ?></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?= $title ?></h3>
                        <a class="pull-right btn btn-default btn-sm" style="margin-right:5px" href="<?= base_url('nilai_raport') ?>">Kembali</a>
                    </div>
                    <div class="box-body">
                        <?php $this->view('pesan') ?>
                        <input type="hidden" name="kodejdwl" value="<?= $detail->kodejdwl ?>">
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
                                <div class="panel-body">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            <tr>
                                                <th style="border:1px solid #e3e3e3" width="30px" rowspan="2">No</th>
                                                <th style="border:1px solid #e3e3e3" width="170px" rowspan="2">Nama Lengkap</th>
                                                <th style="border:1px solid #e3e3e3; width:55px" rowspan="2">
                                                    <center>KD</center>
                                                </th>
                                                <th style="border:1px solid #e3e3e3" colspan="6">
                                                    <center>Penilaian</center>
                                                </th>
                                                <th style="border:1px solid #e3e3e3; width:55px" rowspan="2">
                                                    <center>Nilai</center>
                                                </th>
                                                <th style="border:1px solid #e3e3e3; width:55px" rowspan="2">
                                                    <center>Grade</center>
                                                </th>
                                                <th style="border:1px solid #e3e3e3" rowspan="2">
                                                    <center>Deskripsi</center>
                                                </th>
                                                <th style="border:1px solid #e3e3e3; width:65px" rowspan="2">
                                                    <center>Action</center>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th style="border:1px solid #e3e3e3; width:110px" colspan="2">
                                                    <center>Praktek</center>
                                                </th>
                                                <th style="border:1px solid #e3e3e3; width:110px" colspan="2">
                                                    <center>Proyek</center>
                                                </th>
                                                <th style="border:1px solid #e3e3e3; width:110px" colspan="2">
                                                    <center>Portofolio</center>
                                                </th>
                                            </tr>
                                        </tbody>
                                        <tbody>
                                            <?php
                                            $query = $this->db->from('tb_siswa')->where('kode_kelas', $detail->kode_kelas)->get();
                                            $no = 1;
                                            foreach ($query->result() as $data) {
                                                $cek = $this->db->get_where('tb_nilai_keterampilan', array('nisn' => $data->nisn, 'kodejdwl' => $detail->kodejdwl));
                                            ?>
                                                <form class="form-horizontal" action="<?= base_url('nilai_raport/simpanketerampilan') ?>" method="post" enctype="multipart/form-data">
                                                    <tr>
                                                        <td><?=$no++?></td>
                                                        <td style="font-size:12px"><?=$data->nama?></td>
                                                        <input type="hidden" name="kodejdwl" value="<?=$detail->kodejdwl?>">
                                                        <input type="hidden" name="nisn[]" value="<?=$data->nisn?>">
                                                        <td align="center"><input type="text" name="kd[]" style="width:35px; text-align:center; padding:0px"></td>
                                                        <td align="center"><input type="text" name="nilai1[]" style="width:35px; text-align:center; padding:0px"></td>
                                                        <td align="center"><input type="text" name="nilai2[]" style="width:35px; text-align:center; padding:0px"></td>
                                                        <td align="center"><input type="text" name="nilai3[]" style="width:35px; text-align:center; padding:0px"></td>
                                                        <td align="center"><input type="text" name="nilai4[]" style="width:35px; text-align:center; padding:0px"></td>
                                                        <td align="center"><input type="text" name="nilai5[]" style="width:35px; text-align:center; padding:0px"></td>
                                                        <td align="center"><input type="text" name="nilai6[]" style="width:35px; text-align:center; padding:0px"></td>
                                                        <td align="center"><input type="text" style="width:35px; background:#e3e3e3; border:1px solid #e3e3e3;" disabled=""></td>
                                                        <td align="center"><input type="text" style="width:35px; background:#e3e3e3; border:1px solid #e3e3e3;" disabled=""></td>
                                                        <td align="center"><input type="text" name="deskripsi[]" style="width:100%; padding:0px"></td>
                                                        <td align="center"><input type="submit" name="simpan" class="btn btn-xs btn-primary" style="width:65px" value="Simpan"></td>
                                                    </tr>
                                                </form>
                                                <?php
                                                if ($cek->num_rows() > 0) {
                                                    foreach ($cek->result() as $d) {
                                                        $ratarata = average(array($d->nilai1, $d->nilai2, $d->nilai3, $d->nilai4, $d->nilai5,$d->nilai6));
                                                        $jdwal = $this->db->get_where('tb_jadwal_pelajaran', array('kodejdwl' => $detail->kodejdwl))->row();
                                                        $cekpredikat = $this->db->get_where('tb_predikat', array('kode_kelas' => $jdwal->kode_kelas));

                                                        // $maxn = mysql_fetch_array(mysql_query("SELECT deskripsi, GREATEST(nilai1,nilai2,nilai3,nilai4,nilai5,nilai6) as tertinggi FROM rb_nilai_keterampilan where kodejdwl='$_GET[jdwl]' AND nisn='$r[nisn]' ORDER BY tertinggi DESC LIMIT 1"));
                                                        $maxn = $this->db->query("SELECT ((nilai1+nilai2+nilai3+nilai4+nilai5+nilai6)/6) as rata_rata, deskripsi FROM tb_nilai_keterampilan where kodejdwl='$detail->kodejdwl' AND nisn='$d->nisn' ORDER BY rata_rata DESC LIMIT 1;")->row();
                                                        $rapn = $this->db->query("SELECT sum((nilai1+nilai2+nilai3+nilai4+nilai5+nilai6)/6)/count($d->nisn) as raport FROM tb_nilai_keterampilan where kodejdwl='$detail->kodejdwl' AND nisn='$d->nisn'")->row();
                                                        if ($cekpredikat->num_rows() > 0) {
                                                            // $grade1 = mysql_fetch_array(mysql_query("SELECT * FROM `rb_predikat` where (".number_format($ratarata)." >=nilai_a) AND (".number_format($ratarata)." <= nilai_b) AND kode_kelas='$_GET[id]'"));
                                                            $grade1 = $this->db->query("SELECT * FROM `tb_predikat` WHERE " . number_format($ratarata) . " >= nilai_a && " . number_format($ratarata) . " <= nilai_b;")->row();
                                                            $grade2 = $this->db->query("SELECT * FROM `tb_predikat` WHERE " . number_format($maxn->rata_rata) . " >= nilai_a && " . number_format($maxn->rata_rata) . " <= nilai_b;")->row();
                                                            $grade3 = $this->db->query("SELECT * FROM `tb_predikat` WHERE " . number_format($rapn->raport) . " >= nilai_a && " . number_format($rapn->raport) . " <= nilai_b;")->row();
                                                        } else {
                                                            $grade1 = new stdClass();
                                                            $grade1->grade = null;
                                                            $grade2 = new stdClass();
                                                            $grade2->grade = null;
                                                            $grade3 = new stdClass();
                                                            $grade3->grade = null;
                                                        }
                                                ?>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td align="center"><?= $d->kd ?></td>
                                                            <td align="center"><?= $d->nilai1 ?></td>
                                                            <td align="center"><?= $d->nilai2 ?></td>
                                                            <td align="center"><?= $d->nilai3 ?></td>
                                                            <td align="center"><?= $d->nilai4 ?></td>
                                                            <td align="center"><?= $d->nilai5 ?></td>
                                                            <td align="center"><?= $d->nilai6 ?></td>
                                                            <td align="center"><?= number_format($ratarata) ?></td>
                                                            <td align="center"><?= $grade1->grade ?></td>
                                                            <td><?= $d->deskripsi ?></td>
                                                            <td align="center">
                                                                <a href="<?= base_url('nilai_raport/hapusketerampilan/' . $d->id_nilai_keterampilan . '/' . $detail->kodejdwl) ?>" class="btn btn-xs btn-danger" onclick="return confirm('Apa anda yakin untuk hapus Data ini?')"><span class="glyphicon glyphicon-remove"></span></a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td align="center" colspan="7">Nilai Max/Min</td>
                                                        <td align="center"><?= number_format($maxn->rata_rata) ?></td>
                                                        <td align="center"><?= $grade2->grade ?></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td align="center" colspan="7">Raport</td>
                                                        <td align="center"><?= number_format($rapn->raport) ?></td>
                                                        <td align="center"><?= $grade3->grade ?></td>
                                                        <td><?= $maxn->deskripsi ?></td>
                                                    </tr>
                                            <?php }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>