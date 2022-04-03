<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Nilai UTS
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-th"></i>Data Master</a></li>
            <li class="active">Data Nilai UTS</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <?php $this->view('pesan') ?>
                        <h3 class="box-title">Data Nilai UTS</h3>
                        <form style='margin-right:5px; margin-top:0px' class='pull-right' action='<?= base_url('nilai_uts') ?>' method='POST'>
                            <select name='tahun' style='padding:4px'>
                                <option value=''>- Pilih Tahun Akademik -</option>
                                <?php foreach ($tahun->result() as $data) { ?>
                                    <option value='<?= $data->id_tahun_akademik ?>'><?= $data->nama_tahun ?></option>
                                <?php } ?>
                            </select>
                            <select name='kelas' style='padding:4px'>
                                <option value=''>- Pilih Kelas -</option>
                                <?php foreach ($kelas->result() as $data) { ?>
                                    <option value='<?= $data->kode_kelas ?>'><?= $data->nama_kelas ?></option>
                                <?php } ?>
                            </select>
                            <input type="submit" style='margin-top:-4px' class='btn btn-success btn-sm' value='Lihat'>
                        </form>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style='width:10px'>No</th>
                                    <th>Jadwal Pelajaran</th>
                                    <th>Kelas</th>
                                    <th>Guru</th>
                                    <th>Hari</th>
                                    <th>Mulai</th>
                                    <th>Selesai</th>
                                    <th>Ruangan</th>
                                    <th style='width:70px'>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($nilai_uts->result() as $data) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data->namamatapelajaran ?></td>
                                        <td><?= $data->nama_kelas ?></td>
                                        <td><?= $data->nama_guru ?></td>
                                        <td><?= $data->hari ?></td>
                                        <td><?= $data->jam_mulai ?></td>
                                        <td><?= $data->jam_selesai ?></td>
                                        <td><?= $data->nama_ruangan ?></td>
                                        <td><a class="btn btn-xs btn-success" href="<?=base_url('nilai_uts/tambah/'.$data->kodejdwl)?>"><span class="glyphicon glyphicon-th-list"></span> Input Nilai</a></td>
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