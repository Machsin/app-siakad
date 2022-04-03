<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Gedung
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-th"></i>Data Master</a></li>
            <li>Data Gedung</li>
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
                        <form class="form-horizontal" action="<?= base_url('gedung/simpan') ?>" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <input type="hidden" name="kode_gedung" value="<?= $gedung->kode_gedung ?>">
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Nama gedung</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="nama_gedung" id="" value="<?= $gedung->nama_gedung ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Jumlah Lantai</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" name="jumlah_lantai" id="" value="<?= $gedung->jumlah_lantai ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Panjang</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" name="panjang" id="" value="<?= $gedung->panjang ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">tinggi</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" name="tinggi" id="" value="<?= $gedung->tinggi ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">lebar</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" name="lebar" id="" value="<?= $gedung->lebar ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Keterangan</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="keterangan" id="" value="<?= $gedung->keterangan ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Status Aktif</label>
                                    <div class="col-sm-3">
                                        <select name="status" id="" class="form-control" required>
                                            <option value="">--Pilih Status--</option>
                                            <option value="Ya" <?= $gedung->aktif == 'Ya' ? 'selected' : null ?>>Ya</option>
                                            <option value="Tidak" <?= $gedung->aktif == 'Tidak' ? 'selected' : null ?>>Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <a href="<?= base_url('gedung') ?>" class="btn btn-default">Kembali</a>
                                    <button type="submit" class="btn btn-info" name="<?=$page?>">simpan</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>