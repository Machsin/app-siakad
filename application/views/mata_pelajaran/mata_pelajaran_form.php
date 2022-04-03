<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Mata Pelajaran
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-th"></i>Data Master</a></li>
            <li>Data Mata Pelajaran</li>
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
                        <form class="form-horizontal" action="<?= base_url('mata_pelajaran/simpan') ?>" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Kurikulum</label>
                                    <div class="col-sm-3">
                                        <select name="kurikulum" id="" class="form-control" required>
                                            <option value="">--Pilih Kurikulum--</option>
                                            <?php foreach ($kurikulum->result() as $data) { ?>
                                                <option value="<?= $data->kode_kurikulum ?>" <?= $mata_pelajaran->kode_kurikulum == $data->kode_kurikulum ? 'selected' : null ?>><?= $data->nama_kurikulum ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Kode Pelajaran</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="kode_pelajaran" id="" value="<?= $mata_pelajaran->kode_pelajaran ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Nama Mapel</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="nama_mapel" id="" value="<?= $mata_pelajaran->namamatapelajaran ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Nama Mapel En</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="nama_mapel_en" id="" value="<?= $mata_pelajaran->namamatapelajaran_en ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Jurusan</label>
                                    <div class="col-sm-3">
                                        <select name="jurusan" id="" class="form-control" required>
                                            <option value="">--Pilih Jurusan--</option>
                                            <?php foreach ($jurusan->result() as $data) { ?>
                                                <option value="<?= $data->kode_jurusan ?>" <?= $mata_pelajaran->kode_jurusan == $data->kode_jurusan ? 'selected' : null ?>><?= $data->nama_jurusan ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Guru Pengampu</label>
                                    <div class="col-sm-3">
                                        <select name="guru" id="" class="form-control" required>
                                            <option value="">--Pilih Guru Pengampu--</option>
                                            <?php foreach ($guru->result() as $data) { ?>
                                                <option value="<?= $data->nip ?>" <?= $mata_pelajaran->nip == $data->nip ? 'selected' : null ?>><?= $data->nama_guru ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Tingkat</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="tingkat" id="" value="<?= $mata_pelajaran->tingkat ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Kompetensi Umum</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="kompetensi_umum" id="" value="<?= $mata_pelajaran->kompetensi_umum ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Kompetensi Khusus</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="kompetensi_khusus" id="" value="<?= $mata_pelajaran->kompetensi_khusus ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Jumlah Jam</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="jumlah_jam" id="" value="<?= $mata_pelajaran->jumlah_jam ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Urutan</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="urutan" id="" value="<?= $mata_pelajaran->urutan ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Sesi</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="sesi" id="" value="<?= $mata_pelajaran->sesi ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Kelompok</label>
                                    <div class="col-sm-3">
                                        <select name="kelompok" id="" class="form-control" required>
                                            <option value="">--Pilih Kelompok Mapel--</option>
                                            <?php foreach ($kelompok_mapel->result() as $data) { ?>
                                                <option value="<?= $data->id_kelompok_mapel ?>" <?= $mata_pelajaran->id_kelompok_mata_pelajaran == $data->id_kelompok_mapel ? 'selected' : null ?>><?= $data->nama_kelompok_mapel ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Aktif</label>
                                    <div class="col-sm-4">
                                        <input type="radio" name="aktif" value="Ya" <?= $mata_pelajaran->aktif == 'Ya' ? 'checked' : null ?>> Ya
                                        <input type="radio" name="aktif" value="Tidak" <?= $mata_pelajaran->aktif == 'Tidak' ? 'checked' : null ?>> Tidak
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <a href="<?= base_url('mata_pelajaran') ?>" class="btn btn-default">Kembali</a>
                                    <button type="submit" class="btn btn-info" name="<?= $page ?>">simpan</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>