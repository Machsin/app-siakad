<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Jadwal Pelajaran
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-th"></i>Data Akademik</a></li>
            <li>Data Jadwal Pelajaran</li>
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
                        <form class="form-horizontal" action="<?= base_url('jadwal/simpan') ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" value="<?=$jadwal->kodejdwl?>" name="kodejdwl">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Tahun Akademik</label>
                                    <div class="col-sm-3">
                                        <select name="tahun" id="" class="form-control" required>
                                            <option value="">--Pilih Tahun Akademik--</option>
                                            <?php foreach ($tahun->result() as $data) { ?>
                                                <option value="<?= $data->id_tahun_akademik ?>" <?= $data->id_tahun_akademik == $jadwal->id_tahun_akademik ? 'selected' : null ?>><?= $data->nama_tahun ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Kelas</label>
                                    <div class="col-sm-3">
                                        <select name="kelas" id="" class="form-control" required>
                                            <option value="">--Pilih Kelas--</option>
                                            <?php foreach ($kelas->result() as $data) { ?>
                                                <option value="<?= $data->kode_kelas ?>" <?= $data->kode_kelas == $jadwal->kode_kelas ? 'selected' : null ?>><?= $data->nama_kelas ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Mata Pelajaran</label>
                                    <div class="col-sm-4">
                                        <select name="mapel" id="" class="form-control" required>
                                            <option value="">--Pilih Mata Pelajaran--</option>
                                            <?php foreach ($mapel->result() as $data) { ?>
                                                <option value="<?= $data->kode_pelajaran ?>" <?= $data->kode_pelajaran == $jadwal->kode_pelajaran ? 'selected' : null ?>><?= $data->namamatapelajaran ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Ruangan</label>
                                    <div class="col-sm-4">
                                        <select name="ruangan" id="" class="form-control" required>
                                            <option value="">--Pilih Ruangan--</option>
                                            <?php foreach ($ruangan->result() as $data) { ?>
                                                <option value="<?= $data->kode_ruangan ?>" <?= $data->kode_ruangan == $jadwal->kode_ruangan ? 'selected' : null ?>><?= $data->nama_ruangan ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Guru</label>
                                    <div class="col-sm-4">
                                        <select name="guru" id="" class="form-control" required>
                                            <option value="">--Pilih Guru--</option>
                                            <?php foreach ($guru->result() as $data) { ?>
                                                <option value="<?= $data->nip ?>" <?= $data->nip == $jadwal->nip ? 'selected' : null ?>><?= $data->nama_guru ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Jadwal Paralel</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="paralel" id="" value="<?= $jadwal->paralel ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Jadwal Serial</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="serial" id="" value="<?= $jadwal->jadwal_serial ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Jam Mulai</label>
                                    <div class="col-sm-2">
                                        <input type="time" class="form-control" name="jam_mulai" id="" value="<?= $jadwal->jam_selesai ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Jam Selesai</label>
                                    <div class="col-sm-2">
                                        <input type="time" class="form-control" name="jam_selesai" id="" value="<?= $jadwal->jam_mulai ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Hari</label>
                                    <div class="col-sm-3">
                                        <select name="hari" id="" class="form-control" required>
                                            <option value="">--Pilih Hari--</option>
                                            <option value="Senin" <?= $jadwal->hari == 'Senin' ? 'selected' : null ?>>Senin</option>
                                            <option value="Selasa" <?= $jadwal->hari == 'Selasa' ? 'selected' : null ?>>Selasa</option>
                                            <option value="Rabu" <?= $jadwal->hari == 'Rabu' ? 'selected' : null ?>>Rabu</option>
                                            <option value="Kamis" <?= $jadwal->hari == 'Kamis' ? 'selected' : null ?>>Kamis</option>
                                            <option value="Jumat" <?= $jadwal->hari == 'Jumat' ? 'selected' : null ?>>Jumat</option>
                                            <option value="Sabtu" <?= $jadwal->hari == 'Sabtu' ? 'selected' : null ?>>Sabtu</option>
                                            <option value="Minggu" <?= $jadwal->hari == 'Minggu' ? 'selected' : null ?>>Minggu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Status Aktif</label>
                                    <div class="col-sm-3">
                                        <select name="status" id="" class="form-control" required>
                                            <option value="">--Pilih Status--</option>
                                            <option value="Ya" <?= $jadwal->aktif == 'Ya' ? 'selected' : null ?>>Ya</option>
                                            <option value="Tidak" <?= $jadwal->aktif == 'Tidak' ? 'selected' : null ?>>Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <a href="<?= base_url('jadwal') ?>" class="btn btn-default">Kembali</a>
                                    <button type="submit" class="btn btn-info" name="<?= $page ?>">simpan</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>