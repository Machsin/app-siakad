<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Tahun
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-th"></i>Data Master</a></li>
            <li>Data Tahun</li>
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
                        <form class="form-horizontal" action="<?= base_url('tahun/simpan') ?>" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <input type="hidden" name="id_tahun_akademik" value="<?= $tahun->id_tahun_akademik ?>">
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Nama tahun</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="nama_tahun" id="" value="<?= $tahun->nama_tahun ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Keterangan</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="keterangan" id="" value="<?= $tahun->keterangan ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Status Aktif</label>
                                    <div class="col-sm-3">
                                        <select name="status" id="" class="form-control" required>
                                            <option value="">--Pilih Status--</option>
                                            <option value="Ya" <?= $tahun->aktif == 'Ya' ? 'selected' : null ?>>Ya</option>
                                            <option value="Tidak" <?= $tahun->aktif == 'Tidak' ? 'selected' : null ?>>Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <a href="<?= base_url('tahun') ?>" class="btn btn-default">Kembali</a>
                                    <button type="submit" class="btn btn-info" name="<?=$page?>">simpan</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>