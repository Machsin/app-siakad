<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Jenis PTK
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-th"></i>Data Master</a></li>
            <li>Data Jenis PTK</li>
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
                        <form class="form-horizontal" action="<?= base_url('ptk/simpan') ?>" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <input type="hidden" name="id_jenis_ptk" value="<?= $ptk->id_jenis_ptk ?>">
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Jenis PTK</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="jenis_ptk" id="" value="<?= $ptk->jenis_ptk ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Keterangan</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="keterangan" id="" value="<?= $ptk->keterangan ?>" required>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <a href="<?= base_url('ptk') ?>" class="btn btn-default">Kembali</a>
                                    <button type="submit" class="btn btn-info" name="<?=$page?>">simpan</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>