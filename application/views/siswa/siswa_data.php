<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Siswa
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-th"></i>Data Master</a></li>
            <li class="active">Data Siswa</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <?php $this->view('pesan') ?>
                        <h3 class="box-title">Data Siswa</h3>
                        <a class='pull-right btn btn-success btn-sm' href='<?= base_url('siswa/tambah') ?>'>Print Siswa</a>
                        <a class='pull-right btn btn-primary btn-sm' href='<?= base_url('siswa/tambah') ?>' style="margin-right: 5px;">Tambahkan Data</a>
                        <form style='margin-right:5px; margin-top:0px' class='pull-right' action='<?= base_url('siswa') ?>' method='POST'>
                            <select name='angkatan' style='padding:4px'>
                                <option value=''>- Filter Angkatan -</option>
                                <?php
                                $tahunawal = '2000';
                                $tahunsekarang = date('Y');
                                for ($i = $tahunawal; $i <= $tahunsekarang; $i++) {
                                ?>
                                    <option value='<?= $i ?>'><?= $i ?></option>
                                <?php } ?>
                            </select>
                            <select name='kelas' style='padding:4px'>
                                <option value=''>- Filter Kelas -</option>
                                <?php foreach ($kelas->result() as $data) { ?>
                                    <option value='<?= $data->kode_kelas ?>'><?= $data->nama_kelas ?></option>
                                <?php } ?>
                            </select>
                            <input type="submit" style='margin-top:-4px' class='btn btn-info btn-sm' value='Lihat'>
                        </form>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style='width:40px'>No</th>
                                    <th>NIPD</th>
                                    <th>NISN</th>
                                    <th>Nama siswa</th>
                                    <th>Angkatan</th>
                                    <th>Jurusan</th>
                                    <th>Kelas</th>
                                    <th style='width:70px'>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($siswa->result() as $data) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data->nipd ?></td>
                                        <td><?= $data->nisn ?></td>
                                        <td><?= $data->nama ?></td>
                                        <td><?= $data->angkatan ?></td>
                                        <td><?= $data->nama_jurusan ?></td>
                                        <td><?= $data->nama_kelas ?></td>
                                        <td>
                                            <center>
                                                <a class='btn btn-default btn-xs' title='Detail Data' href='<?= base_url('siswa/detail/' . $data->id_siswa) ?>'><span class='glyphicon glyphicon-search'></span></a>
                                                <a class='btn btn-success btn-xs' title='Edit Data' href='<?= base_url('siswa/edit/' . $data->id_siswa) ?>'><span class='glyphicon glyphicon-edit'></span></a>
                                                <a class='btn btn-danger btn-xs' onclick="return confirm ('Apakah anda ingin menghapus data ini?')" title='Delete Data' href='<?= base_url('siswa/hapus/' . $data->id_siswa) ?>'><span class='glyphicon glyphicon-remove'></span></a>
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