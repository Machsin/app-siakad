<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Predikat
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-th"></i>Data Predikat</a></li>
            <li>Data Predikat</li>
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
                        <form class="form-horizontal" action="<?= base_url('predikat/simpan') ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_predikat" value="<?= $predikat->id_predikat ?>">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Kelas</label>
                                    <div class="col-sm-3">
                                        <select name="kode_kelas" id="" class="form-control" required>
                                            <option value="">--Pilih Kelas--</option>
                                            <?php foreach ($kelas->result() as $data) { ?>
                                                <option value="<?= $data->kode_kelas ?>" <?= $data->kode_kelas == $predikat->kode_kelas ? 'selected' : null ?>><?= $data->nama_kelas ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Dari</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" name="nilai_a" id="" value="<?= $predikat->nilai_a ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Sampai</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" name="nilai_b" id="" value="<?= $predikat->nilai_b ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Grade</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="grade" id="" value="<?= $predikat->grade ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Keterangan</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="keterangan" id="" value="<?= $predikat->keterangan ?>" required>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <a href="<?= base_url('predikat') ?>" class="btn btn-default">Kembali</a>
                                    <button type="submit" class="btn btn-info" name="<?= $page ?>">simpan</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>