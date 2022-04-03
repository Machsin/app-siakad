<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Nilai UTS
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-th"></i>Data Master</a></li>
            <li>Data Nilai UTS</li>
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
                        <form class="form-horizontal" action="<?= base_url('nilai_uts/simpan') ?>" method="post" enctype="multipart/form-data">
                            <!-- <input type="hidden" name="id_nilai_uts_dasar" value="<?= $nilai_uts->id_nilai_uts_dasar ?>"> -->
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
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            <tr>
                                                <th style="border:1px solid #e3e3e3" width="30px" rowspan="2">No</th>
                                                <th style="border:1px solid #e3e3e3" width="90px" rowspan="2">NISN</th>
                                                <th style="border:1px solid #e3e3e3" width="190px" rowspan="2">Nama Lengkap</th>
                                                <th style="border:1px solid #e3e3e3" colspan="2">
                                                    <center>Pengetahuan</center>
                                                </th>
                                                <th style="border:1px solid #e3e3e3" colspan="2">
                                                    <center>Keterampilan</center>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th style="border:1px solid #e3e3e3">
                                                    <center>Angka</center>
                                                </th>
                                                <th style="border:1px solid #e3e3e3">
                                                    <center>Predikat</center>
                                                </th>
                                                <th style="border:1px solid #e3e3e3">
                                                    <center>Angka</center>
                                                </th>
                                                <th style="border:1px solid #e3e3e3">
                                                    <center>predikat</center>
                                                </th>
                                            </tr>
                                        </tbody>
                                        <tbody>
                                            <?php
                                            $query = $this->db->from('tb_siswa')->where('kode_kelas', $detail->kode_kelas)->get();
                                            $no = 0;
                                            foreach ($query->result() as $data) {
                                                $cek_nilai = $this->db->get_where('tb_nilai_uts', array('nisn' => $data->nisn, 'kodejdwl'=>$detail->kodejdwl));
                                                if ($cek_nilai->num_rows() > 0) {
                                                    $nilai = $cek_nilai->row();
                                                    if ($nilai->kodejdwl == $detail->kodejdwl) {
                                                        $cek_predikat = $this->db->get_where('tb_predikat', array('kode_kelas' => $data->kode_kelas));
                                                        if ($cek_predikat->num_rows() > 0) {
                                                            $predikat = new stdClass();
                                                            foreach ($cek_predikat->result() as $cek_predikat) {
                                                                if ($nilai->angka_pengetahuan >= $cek_predikat->nilai_a && $nilai->angka_pengetahuan <= $cek_predikat->nilai_b) {
                                                                    $predikat->deskripsi_pengetahuan = $cek_predikat->grade;
                                                                }
                                                                if ($nilai->angka_keterampilan >= $cek_predikat->nilai_a && $nilai->angka_keterampilan <= $cek_predikat->nilai_b) {
                                                                    $predikat->deskripsi_keterampilan = $cek_predikat->grade;
                                                                }
                                                            }
                                                        }
                                                    } else {
                                                        $nilai = new stdClass();
                                                        $nilai->angka_pengetahuan = null;
                                                        $nilai->angka_keterampilan = null;
                                                        $predikat = new stdClass();
                                                        $predikat->deskripsi_pengetahuan = null;
                                                        $predikat->deskripsi_keterampilan = null;
                                                    }
                                                } else {
                                                    $nilai = new stdClass();
                                                    $nilai->angka_pengetahuan = null;
                                                    $nilai->angka_keterampilan = null;
                                                    $predikat = new stdClass();
                                                    $predikat->deskripsi_pengetahuan = null;
                                                    $predikat->deskripsi_keterampilan = null;
                                                }
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $data->nisn ?></td>
                                                    <td><?= $data->nama ?></td>
                                                    <input type="hidden" name="nisn[]" value="<?= $data->nisn ?>">
                                                    <td align="center"><input type="number" name="angka_pengetahuan[]" value="<?= $nilai->angka_pengetahuan ?>" style="width:90px; text-align:center; padding:0px" placeholder="-"></td>
                                                    <td align="center"><input type="text" value="<?= $predikat->deskripsi_pengetahuan ?>" style="width:90px; text-align:center; padding:0px" placeholder="-" disabled=""></td>
                                                    <td align="center"><input type="number" name="angka_keterampilan[]" value="<?= $nilai->angka_keterampilan ?>" style="width:90px; text-align:center; padding:0px" placeholder="-"></td>
                                                    <td align="center"><input type="text" value="<?= $predikat->deskripsi_keterampilan ?>" style="width:90px; text-align:center; padding:0px" placeholder="-" disabled=""></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="box-footer">
                                    <a href="<?= base_url('nilai_uts') ?>" class="btn btn-default">Kembali</a>
                                    <button type="submit" class="btn btn-info">simpan</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>