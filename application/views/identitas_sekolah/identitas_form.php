<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Identitas Sekolah
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('assets/') ?>#"><i class="fa fa-th"></i>Data Master</a></li>
            <li class="active">Identitas Sekolah</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Data Identitas Sekolah</h3>
                    </div>
                    <form class="form-horizontal" action="<?= base_url('identitas_sekolah/simpan') ?>" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <input type="hidden" name="id_identitas" value="<?= $identitas->id_identitas_sekolah ?>">
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Nama Sekolah</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="nama_sekolah" id="" value="<?= $identitas->nama_sekolah ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">NPSN</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="npsn" id="" value="<?= $identitas->npsn ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">NSS</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="nss" id="" value="<?= $identitas->nss ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Alamat Sekolah</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="alamat_sekolah" id="" value="<?= $identitas->alamat_sekolah ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Kode Pos</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="kode_pos" id="" value="<?= $identitas->kode_pos ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">No Telpon</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="no_telpon" id="" value="<?= $identitas->no_telpon ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Kelurahan</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="kelurahan" id="" value="<?= $identitas->kelurahan ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Kecamatan</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="kecamatan" id="" value="<?= $identitas->kecamatan ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Kabupaten / Kota</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="kabupaten_kota" id="" value="<?= $identitas->kabupaten_kota ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Provinsi</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="provinsi" id="" value="<?= $identitas->provinsi ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Website</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="website" id="" value="<?= $identitas->website ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="email" id="" value="<?= $identitas->email ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <a href="<?= base_url('identitas_sekolah') ?>" class="btn btn-default">Kembali</a>
                            <button type="submit" class="btn btn-info">simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>