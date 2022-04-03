<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Kelas
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-th"></i>Data Master</a></li>
            <li>Data Kelas</li>
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
                        <form class="form-horizontal" action="<?= base_url('kelas/simpan') ?>" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Kode kelas</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="kode_kelas" id="" value="<?= $kelas->kode_kelas ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Wali Kelas</label>
                                    <div class="col-sm-3">
                                        <select name="nip" id="" class="form-control" required>
                                            <option value="">--Pilih Wali Kelas--</option>
                                            <?php foreach ($guru->result() as $data) { ?>
                                                <option value="<?= $data->nip ?>" <?= $data->nip == $kelas->nip ? 'selected' : null ?>><?= $data->nama_guru ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Jurusan</label>
                                    <div class="col-sm-3">
                                        <select name="kode_jurusan" id="" class="form-control" required>
                                            <option value="">--Pilih Jurusan--</option>
                                            <?php foreach ($jurusan->result() as $data) { ?>
                                                <option value="<?= $data->kode_jurusan ?>" <?= $data->kode_jurusan == $kelas->kode_jurusan ? 'selected' : null ?>><?= $data->nama_jurusan ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Ruangan</label>
                                    <div class="col-sm-3">
                                        <select name="kode_ruangan" id="" class="form-control" required>
                                            <option value="">--Pilih Ruangan--</option>
                                            <?php foreach ($ruangan->result() as $data) { ?>
                                                <option value="<?= $data->kode_ruangan ?>" <?= $data->kode_ruangan == $kelas->kode_ruangan ? 'selected' : null ?>><?= $data->nama_ruangan ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Nama kelas</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="nama_kelas" id="" value="<?= $kelas->nama_kelas ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Status Aktif</label>
                                    <div class="col-sm-3">
                                        <select name="aktif" id="" class="form-control" required>
                                            <option value="">--Pilih Status--</option>
                                            <option value="Ya" <?= $kelas->aktif == 'Ya' ? 'selected' : null ?>>Ya</option>
                                            <option value="Tidak" <?= $kelas->aktif == 'Tidak' ? 'selected' : null ?>>Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <a href="<?= base_url('kelas') ?>" class="btn btn-default">Kembali</a>
                                    <button type="submit" class="btn btn-info" name="<?= $page ?>">simpan</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>