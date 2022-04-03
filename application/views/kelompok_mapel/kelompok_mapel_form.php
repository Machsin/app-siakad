<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Kelompok Mapel
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-th"></i>Data Master</a></li>
            <li>Data Kelompok Mapel</li>
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
                        <form class="form-horizontal" action="<?= base_url('kelompok_mapel/simpan') ?>" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <input type="hidden" name="id_kelompok_mapel" value="<?= $kelompok_mapel->id_kelompok_mapel ?>">
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Jenis</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="jenis_kelompok_mapel" id="" value="<?= $kelompok_mapel->jenis_kelompok_mapel ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Nama Kelompok</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="nama_kelompok_mapel" id="" value="<?= $kelompok_mapel->nama_kelompok_mapel ?>" required>
                                    </div>
                                </div>
                                
                                <div class="box-footer">
                                    <a href="<?= base_url('kelompok_mapel') ?>" class="btn btn-default">Kembali</a>
                                    <button type="submit" class="btn btn-info" name="<?=$page?>">simpan</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>