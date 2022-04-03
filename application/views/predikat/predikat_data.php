<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Predikat
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-th"></i>Data Akademik</a></li>
            <li class="active">Data Predikat</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <?php $this->view('pesan') ?>
                        <h3 class="box-title">Data Predikat</h3>
                        <a class='pull-right btn btn-primary btn-sm' href='<?= base_url('predikat/tambah') ?>'>Tambahkan Data</a>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style='width:40px'>No</th>
                                    <th>Kelas</th>
                                    <th>Dari</th>
                                    <th>Sampai</th>
                                    <th>Grade</th>
                                    <th>Keterangan</th>
                                    <th style='width:70px'>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($predikat->result() as $data) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data->nama_kelas ?></td>
                                        <td><?= $data->nilai_a ?></td>
                                        <td><?= $data->nilai_b ?></td>
                                        <td><?= $data->grade ?></td>
                                        <td><?= $data->keterangan ?></td>
                                        <td>
                                            <center>
                                                <a class='btn btn-success btn-xs' title='Edit Data' href='<?= base_url('predikat/edit/' . $data->id_predikat) ?>'><span class='glyphicon glyphicon-edit'></span></a>
                                                <a class='btn btn-danger btn-xs' onclick="return confirm ('Apakah anda ingin menghapus data ini?')" title='Delete Data' href='<?= base_url('predikat/hapus/' . $data->id_predikat) ?>'><span class='glyphicon glyphicon-remove'></span></a>
                                            </center>
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