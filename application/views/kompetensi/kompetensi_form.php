<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Kompetensi Dasar
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-th"></i>Data Master</a></li>
            <li>Data Kompetensi Dasar</li>
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
                        <form class="form-horizontal" action="<?= base_url('kompetensi/simpan') ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_kompetensi_dasar" value="<?= $kompetensi->id_kompetensi_dasar ?>">
                            <input type="hidden" name="kodejdwl" value="<?= $detail->kodejdwl ?>">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Kelas</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="kelas" id="" value="<?= $detail->nama_kelas ?>" required readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Mata Pelajaran</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="mapel" id="" value="<?= $detail->namamatapelajaran ?>" required readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Ranah</label>
                                    <div class="col-sm-3">
                                        <select name="ranah" id="" class="form-control" required>
                                            <option value="">--Pilih--</option>
                                            <option value='Pengetahuan' <?= $kompetensi->ranah == 'Pengetahuan' ? 'selected' : null ?>>Pengetahuan</option>
                                            <option value='Keterampilan' <?= $kompetensi->ranah == 'Keterampilan' ? 'selected' : null ?>>Keterampilan</option>
                                            <option value='Sikap' <?= $kompetensi->ranah == 'Sikap' ? 'selected' : null ?>>Sikap</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Kompetensi Dasar</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="kompetensi_dasar" id="" value="<?= $kompetensi->kompetensi_dasar ?>" required>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <a href="#" onclick="history.go(-1)" class="btn btn-default">Kembali</a>
                                    <button type="submit" class="btn btn-info" name="<?= $page ?>">simpan</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>