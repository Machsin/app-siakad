<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Jurusan
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-th"></i>Data Master</a></li>
            <li class="active">Data Jurusan</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <?php $this->view('pesan')?>
                        <h3 class="box-title">Data Jurusan</h3>
                        <a class='pull-right btn btn-primary btn-sm' href='<?= base_url('jurusan/tambah') ?>'>Tambahkan Data</a>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style='width:40px'>No</th>
                                    <th>Kode Jurusan</th>
                                    <th>Bidang Keahlian</th>
                                    <th>Program Keahlian</th>
                                    <th>Kompetensi Keahlian</th>
                                    <th>Ketua Kompetensi Keahlian</th>
                                    <th style='width:70px'>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($jurusan->result() as $data) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data->kode_jurusan ?></td>
                                        <td><?= $data->bidang_keahlian ?></td>
                                        <td><?= $data->kompetensi_umum ?></td>
                                        <td><?= $data->nama_jurusan ?></td>
                                        <td><?= $data->pejabat ?></td>
                                        <td>
                                            <center>
                                                <a class='btn btn-primary btn-xs' title='Lihat Data' href='<?= base_url('jurusan/detail/' . $data->kode_jurusan) ?>'><span class='glyphicon glyphicon-search'></span></a>
                                                <a class='btn btn-success btn-xs' title='Edit Data' href='<?= base_url('jurusan/edit/' . $data->kode_jurusan) ?>'><span class='glyphicon glyphicon-edit'></span></a>
                                                <a class='btn btn-danger btn-xs' onclick="return confirm ('Apakah anda ingin menghapus data ini?')" title='Delete Data' href='<?= base_url('jurusan/hapus/' . $data->kode_jurusan) ?>'><span class='glyphicon glyphicon-remove'></span></a>
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