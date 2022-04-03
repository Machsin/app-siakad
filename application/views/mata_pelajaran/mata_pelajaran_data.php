<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Mata Pelajaran
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-th"></i>Data Master</a></li>
            <li class="active">Data Mata Pelajaran</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <?php $this->view('pesan')?>
                        <h3 class="box-title">Data Mata Pelajaran</h3>
                        <a class='pull-right btn btn-primary btn-sm' href='<?= base_url('mata_pelajaran/tambah') ?>'>Tambahkan Data</a>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style='width:40px'>No</th>
                                    <th>Kode Mapel</th>
                                    <th>Nama Mapel</th>
                                    <th>Jurusan</th>
                                    <th>Tingkat</th>
                                    <th>Guru Pengampu</th>
                                    <th>Urutan</th>
                                    <th style='width:70px'>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($mata_pelajaran->result() as $data) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data->kode_pelajaran ?></td>
                                        <td><?= $data->namamatapelajaran  ?></td>
                                        <td><?= $data->nama_jurusan  ?></td>
                                        <td><?= $data->tingkat  ?></td>
                                        <td><?= $data->nama_guru  ?></td>
                                        <td><?= $data->urutan  ?></td>
                                        <td>
                                            <center>
                                                <a class='btn btn-success btn-xs' title='Edit Data' href='<?= base_url('mata_pelajaran/edit/' . $data->kode_pelajaran) ?>'><span class='glyphicon glyphicon-edit'></span></a>
                                                <a class='btn btn-danger btn-xs' onclick="return confirm ('Apakah anda ingin menghapus data ini?')" title='Delete Data' href='<?= base_url('mata_pelajaran/hapus/' . $data->kode_elajaran) ?>'><span class='glyphicon glyphicon-remove'></span></a>
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