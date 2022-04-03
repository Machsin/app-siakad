<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Kepala Sekolah
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-th"></i>Data Master</a></li>
            <li class="active">Data Kepala Sekolah</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <?php $this->view('pesan') ?>
                        <h3 class="box-title">Data Kepala Sekolah</h3>
                        <!-- <a class='pull-right btn btn-primary btn-sm' href='<?= base_url('kepala_sekolah/tambah') ?>'>Tambahkan Data</a> -->
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style='width:40px'>No</th>
                                    <th>NIP</th>
                                    <th>Nama Lengkap</th>
                                    <th>Alamat Email</th>
                                    <th>No Telepon</th>
                                    <th>Jabatan</th>
                                    <th style='width:70px'>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($kepala_sekolah->result() as $data) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data->nip ?></td>
                                        <td><?= $data->nama_kepala_sekolah ?></td>
                                        <td><?= $data->email ?></td>
                                        <td><?= $data->telepon ?></td>
                                        <td>Kepala Sekolah</td>
                                        <td>
                                            <center>
                                                <a class='btn btn-default btn-xs' title='Detail Data' href='<?= base_url('kepala_sekolah/detail/' . $data->nip) ?>'><span class='glyphicon glyphicon-search'></span></a>
                                                <a class='btn btn-success btn-xs' title='Edit Data' href='<?= base_url('kepala_sekolah/edit/' . $data->nip) ?>'><span class='glyphicon glyphicon-edit'></span></a>
                                                <a class='btn btn-danger btn-xs' onclick="return confirm ('Apakah anda ingin menghapus data ini?')" title='Delete Data' href='<?= base_url('kepala_sekolah/hapus/' . $data->nip) ?>'><span class='glyphicon glyphicon-remove'></span></a>
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