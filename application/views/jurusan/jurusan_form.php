<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Jurusan
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-th"></i>Data Master</a></li>
            <li>Data Jurusan</li>
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
                        <form class="form-horizontal" action="<?= base_url('jurusan/simpan') ?>" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Kode Jurusan</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="kode_jurusan" id="" value="<?= $jurusan->kode_jurusan ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Nama Jurusan</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="nama_jurusan" id="" value="<?= $jurusan->nama_jurusan ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Bidang Keahlian</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="bidang_keahlian" id="" value="<?= $jurusan->bidang_keahlian ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Kompetensi Umum</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="kompetensi_umum" id="" value="<?= $jurusan->kompetensi_umum ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Kompetensi Khusus</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="kompetensi_khusus" id="" value="<?= $jurusan->kompetensi_khusus ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Pejabat</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="pejabat" id="" value="<?= $jurusan->pejabat ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Jabatan</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="jabatan" id="" value="<?= $jurusan->jabatan ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Keterangan</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="keterangan" id="" value="<?= $jurusan->keterangan ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Status Aktif</label>
                                    <div class="col-sm-3">
                                        <select name="status" id="" class="form-control" required>
                                            <option value="">--Pilih Status--</option>
                                            <option value="Ya" <?= $jurusan->aktif == 'Ya' ? 'selected' : null ?>>Ya</option>
                                            <option value="Tidak" <?= $jurusan->aktif == 'Tidak' ? 'selected' : null ?>>Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <a href="<?= base_url('jurusan') ?>" class="btn btn-default">Kembali</a>
                                    <button type="submit" class="btn btn-info" name="<?=$page?>">simpan</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>