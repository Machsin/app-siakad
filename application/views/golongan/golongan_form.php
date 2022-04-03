<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Golongan
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-th"></i>Data Master</a></li>
            <li>Data Golongan</li>
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
                        <form class="form-horizontal" action="<?= base_url('golongan/simpan') ?>" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <input type="hidden" name="id_golongan" value="<?= $golongan->id_golongan ?>">
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Nama Golongan</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="nama_golongan" id="" value="<?= $golongan->nama_golongan ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Keterangan</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="keterangan" id="" value="<?= $golongan->keterangan ?>" required>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <a href="<?= base_url('golongan') ?>" class="btn btn-default">Kembali</a>
                                    <button type="submit" class="btn btn-info" name="<?=$page?>">simpan</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>