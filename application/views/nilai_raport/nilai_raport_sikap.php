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
                    </div>
                    <div class="box-body">
                        <?php $this->view('pesan') ?>
                        <form class="form-horizontal" action="<?= base_url('nilai_raport/simpansikap') ?>" method="post" enctype="multipart/form-data">
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
                                        <ul id="myTabs" class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#spiritual" id="spiritual-tab" role="tab" data-toggle="tab" aria-controls="spiritual" aria-expanded="true">Penilaian Spiritual </a></li>
                                            <li role="presentation" class=""><a href="#sosial" role="tab" id="sosial-tab" data-toggle="tab" aria-controls="sosial" aria-expanded="false">Penilaian Sosial</a></li>
                                        </ul><br>
                                        <div id="myTabContent" class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade active in" id="spiritual" aria-labelledby="spiritual-tab">
                                                <div class="col-md-12">
                                                    <!-- <form action="index.php?view=raport&amp;act=listsiswasikap&amp;jdwl=5&amp;kd=MK02&amp;id=X.MIPA.1&amp;tahun=20161" method="POST"> -->
                                                    <input type="hidden" value="spiritual" name="status">
                                                    <table class="table table-bordered table-striped">
                                                        <tbody>
                                                            <tr>
                                                                <th style="border:1px solid #e3e3e3" width="30px" rowspan="2">No</th>
                                                                <th style="border:1px solid #e3e3e3" width="80px" rowspan="2">NISN</th>
                                                                <th style="border:1px solid #e3e3e3" width="190px" rowspan="2">Nama Lengkap</th>
                                                                <th style="border:1px solid #e3e3e3" colspan="3">
                                                                    <center>Penilaian Spiritual</center>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th style="border:1px solid #e3e3e3;">
                                                                    <center>Positif</center>
                                                                </th>
                                                                <th style="border:1px solid #e3e3e3;">
                                                                    <center>Negatif</center>
                                                                </th>
                                                                <th style="border:1px solid #e3e3e3;">
                                                                    <center>Desktipsi</center>
                                                                </th>
                                                            </tr>
                                                        </tbody>
                                                        <tbody>
                                                            <?php
                                                            $query = $this->db->from('tb_siswa')->where('kode_kelas', $detail->kode_kelas)->get();
                                                            $no = 1;
                                                            foreach ($query->result() as $data) {
                                                                $cek = $this->db->get_where('tb_nilai_sikap', array('nisn' => $data->nisn, 'kodejdwl' => $detail->kodejdwl, 'status' => 'spiritual'));
                                                                if ($cek->num_rows() > 0) {
                                                                    $spiritual = $cek->row();
                                                                } else {
                                                                    $spiritual = new stdClass();
                                                                    $spiritual->positif = null;
                                                                    $spiritual->negatif = null;
                                                                    $spiritual->deskripsi = null;
                                                                }
                                                            ?>
                                                                <tr>
                                                                    <td><?= $no++ ?></td>
                                                                    <td><?= $data->nisn ?></td>
                                                                    <td><?= $data->nama ?></td>
                                                                    <input type="hidden" name="nisn[]" value="<?= $data->nisn ?>">
                                                                    <td align="center"><textarea name="spiritual_positif[]" class="form-control" style="width:100%; color:blue" placeholder=" Tuliskan Positif..."><?= $spiritual->positif ?></textarea></td>
                                                                    <td align="center"><textarea name="spiritual_negatif[]" class="form-control" style="width:100%; color:blue" placeholder=" Tuliskan Negatif..."><?= $spiritual->negatif ?></textarea></td>
                                                                    <td align="center"><textarea name="spiritual_deskripsi[]" class="form-control" style="width:100%; color:blue" placeholder=" Tuliskan Deskripsi..."><?= $spiritual->deskripsi ?></textarea></td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                    <!-- </form> -->
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="sosial" aria-labelledby="sosial-tab">
                                                <div class="col-md-12">
                                                    <!-- <form action="index.php?view=raport&amp;act=listsiswasikap&amp;jdwl=5&amp;kd=MK02&amp;id=X.MIPA.1&amp;tahun=20161" method="POST"> -->
                                                    <input type="hidden" value="sosial" name="status">
                                                    <table class="table table-bordered table-striped">
                                                        <tbody>
                                                            <tr>
                                                                <th style="border:1px solid #e3e3e3" width="30px" rowspan="2">No</th>
                                                                <th style="border:1px solid #e3e3e3" width="80px" rowspan="2">NISN</th>
                                                                <th style="border:1px solid #e3e3e3" width="190px" rowspan="2">Nama Lengkap</th>
                                                                <th style="border:1px solid #e3e3e3" colspan="3">
                                                                    <center>Penilaian Sosial</center>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th style="border:1px solid #e3e3e3;">
                                                                    <center>Positif</center>
                                                                </th>
                                                                <th style="border:1px solid #e3e3e3;">
                                                                    <center>Negatif</center>
                                                                </th>
                                                                <th style="border:1px solid #e3e3e3;">
                                                                    <center>Desktipsi</center>
                                                                </th>
                                                            </tr>
                                                        </tbody>
                                                        <tbody>
                                                            <?php
                                                            $query = $this->db->from('tb_siswa')->where('kode_kelas', $detail->kode_kelas)->get();
                                                            $no = 1;
                                                            foreach ($query->result() as $data) {
                                                                $cek = $this->db->get_where('tb_nilai_sikap', array('nisn' => $data->nisn, 'kodejdwl' => $detail->kodejdwl, 'status' => 'sosial'));
                                                                if ($cek->num_rows() > 0) {
                                                                    $sosial = $cek->row();
                                                                } else {
                                                                    $sosial = new stdClass();
                                                                    $sosial->positif = null;
                                                                    $sosial->negatif = null;
                                                                    $sosial->deskripsi = null;
                                                                }
                                                            ?>
                                                                <tr>
                                                                    <td><?= $no++ ?></td>
                                                                    <td><?= $data->nisn ?></td>
                                                                    <td><?= $data->nama ?></td>
                                                                    <input type="hidden" name="nisn2[]" value="<?= $data->nisn ?>">
                                                                    <td align="center"><textarea name="sosial_positif[]" class="form-control" style="width:100%; color:blue" placeholder=" Tuliskan Positif..."><?= $sosial->positif ?></textarea></td>
                                                                    <td align="center"><textarea name="sosial_negatif[]" class="form-control" style="width:100%; color:blue" placeholder=" Tuliskan Negatif..."><?= $sosial->negatif ?></textarea></td>
                                                                    <td align="center"><textarea name="sosial_deskripsi[]" class="form-control" style="width:100%; color:blue" placeholder=" Tuliskan Deskripsi..."><?= $sosial->deskripsi ?></textarea></td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                    <!-- </form> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <a href="<?= base_url('nilai_raport') ?>" class="btn btn-default">Kembali</a>
                                    <button type="submit" class="btn btn-info">simpan</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>