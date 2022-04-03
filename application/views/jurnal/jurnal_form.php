<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Jurnal
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-th"></i>Data Master</a></li>
            <li>Data Jurnal</li>
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
                        <form class="form-horizontal" action="<?= base_url('jurnal/simpan') ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_journal" value="<?= $jurnal->id_journal ?>">
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
                                    <label for="" class="col-sm-2 control-label">Hari</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="hari" id="" value="<?= $jurnal->hari ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Tanggal</label>
                                    <div class="col-sm-3">
                                        <input type="date" class="form-control" name="tanggal" id="" value="<?= $jurnal->tanggal ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Jam Ke</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="jam_ke" id="" value="<?= $jurnal->jam_ke ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Materi</label>
                                    <div class="col-sm-3">
                                    <textarea name="materi" id="" cols="100" rows="3"><?=$jurnal->materi?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Keterangan</label>
                                    <div class="col-sm-3">
                                        <textarea name="keterangan" id="" cols="100" rows="6"><?=$jurnal->keterangan?></textarea>
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