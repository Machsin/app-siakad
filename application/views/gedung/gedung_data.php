<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Gedung
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-th"></i>Data Master</a></li>
            <li class="active">Data Gedung</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <?php $this->view('pesan')?>
                        <h3 class="box-title">Data Gedung</h3>
                        <a class='pull-right btn btn-primary btn-sm' href='<?= base_url('gedung/tambah') ?>'>Tambahkan Data</a>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style='width:40px'>No</th>
                                    <th>Nama Gedung</th>
                                    <th>Jumlah Lantai</th>
                                    <th>Panjang</th>
                                    <th>Tinggi</th>
                                    <th>Lebar</th>
                                    <th>Keterangan</th>
                                    <th>Aktif</th>
                                    <th style='width:70px'>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($gedung->result() as $data) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data->nama_gedung ?></td>
                                        <td><?= $data->jumlah_lantai ?></td>
                                        <td><?= $data->panjang ?></td>
                                        <td><?= $data->tinggi ?></td>
                                        <td><?= $data->lebar ?></td>
                                        <td><?= $data->keterangan ?></td>
                                        <td><?= $data->aktif ?></td>
                                        <td>
                                            <center>
                                                <a class='btn btn-success btn-xs' title='Edit Data' href='<?= base_url('gedung/edit/' . $data->kode_gedung) ?>'><span class='glyphicon glyphicon-edit'></span></a>
                                                <a class='btn btn-danger btn-xs' onclick="return confirm ('Apakah anda ingin menghapus data ini?')" title='Delete Data' href='<?= base_url('gedung/hapus/' . $data->kode_gedung) ?>'><span class='glyphicon glyphicon-remove'></span></a>
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