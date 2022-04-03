<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Kurikulum
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-th"></i>Data Master</a></li>
            <li>Data Kurikulum</li>
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
                        <form class="form-horizontal" action="<?= base_url('kurikulum/simpan') ?>" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <input type="hidden" name="kode_kurikulum" value="<?= $kurikulum->kode_kurikulum ?>">
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Nama Kurikulum</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="nama_kurikulum" id="" value="<?= $kurikulum->nama_kurikulum ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Status Aktif</label>
                                    <div class="col-sm-3">
                                        <select name="status" id="" class="form-control" required>
                                            <option value="">--Pilih Status--</option>
                                            <option value="Ya" <?= $kurikulum->status_kurikulum == 'Ya' ? 'selected' : null ?>>Ya</option>
                                            <option value="Tidak" <?= $kurikulum->status_kurikulum == 'Tidak' ? 'selected' : null ?>>Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <a href="<?= base_url('kurikulum') ?>" class="btn btn-default">Kembali</a>
                                    <button type="submit" class="btn btn-info" name="<?=$page?>">simpan</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>