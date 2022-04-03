<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Ruangan
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-th"></i>Data Master</a></li>
            <li>Data Ruangan</li>
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
                        <form class="form-horizontal" action="<?= base_url('ruangan/simpan') ?>" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <input type="hidden" name="kode_ruangan" value="<?= $ruangan->kode_ruangan ?>">
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Nama Gedung</label>
                                    <div class="col-sm-3">
                                        <select name="gedung" id="" class="form-control" required>
                                            <option value="">--Pilih Gedung--</option>
                                            <?php foreach($gedung->result() as $data){?>
                                            <option value="<?=$data->kode_gedung?>" <?=$ruangan->kode_gedung==$data->kode_gedung?'selected':null?>><?=$data->nama_gedung?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Nama ruangan</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="nama_ruangan" id="" value="<?= $ruangan->nama_ruangan ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Kapasitas Belajar</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" name="kapasitas_belajar" id="" value="<?= $ruangan->kapasitas_belajar ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Kapasitas Ujian</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" name="kapasitas_ujian" id="" value="<?= $ruangan->kapasitas_ujian ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Keterangan</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="keterangan" id="" value="<?= $ruangan->keterangan ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Status Aktif</label>
                                    <div class="col-sm-2">
                                        <select name="status" id="" class="form-control" required>
                                            <option value="">--Pilih Status--</option>
                                            <option value="Ya" <?= $ruangan->aktif == 'Ya' ? 'selected' : null ?>>Ya</option>
                                            <option value="Tidak" <?= $ruangan->aktif == 'Tidak' ? 'selected' : null ?>>Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <a href="<?= base_url('ruangan') ?>" class="btn btn-default">Kembali</a>
                                    <button type="submit" class="btn btn-info" name="<?=$page?>">simpan</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>