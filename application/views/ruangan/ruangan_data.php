<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Ruangan
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-th"></i>Data Master</a></li>
            <li class="active">Data Ruangan</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <?php $this->view('pesan')?>
                        <h3 class="box-title">Data Ruangan</h3>
                        <a class='pull-right btn btn-primary btn-sm' href='<?= base_url('ruangan/tambah') ?>'>Tambahkan Data</a>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style='width:40px'>No</th>
                                    <th>Nama Gedung</th>
                                    <th>Nama Ruangan</th>
                                    <th>Kapasitas Belajar</th>
                                    <th>Kapasitas Ujian</th>
                                    <th>Keterangan</th>
                                    <th>Aktif</th>
                                    <th style='width:70px'>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($ruangan->result() as $data) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data->nama_gedung ?></td>
                                        <td><?= $data->nama_ruangan ?></td>
                                        <td><?= $data->kapasitas_belajar ?> Orang</td>
                                        <td><?= $data->kapasitas_ujian ?> Orang</td>
                                        <td><?= $data->keterangan ?></td>
                                        <td><?= $data->aktif ?></td>
                                        <td>
                                            <center>
                                                <a class='btn btn-success btn-xs' title='Edit Data' href='<?= base_url('ruangan/edit/' . $data->kode_ruangan) ?>'><span class='glyphicon glyphicon-edit'></span></a>
                                                <a class='btn btn-danger btn-xs' onclick="return confirm ('Apakah anda ingin menghapus data ini?')" title='Delete Data' href='<?= base_url('ruangan/hapus/' . $data->kode_ruangan) ?>'><span class='glyphicon glyphicon-remove'></span></a>
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