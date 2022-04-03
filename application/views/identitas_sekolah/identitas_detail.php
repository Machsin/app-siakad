<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Identitas Sekolah
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-th"></i>Data Master</a></li>
            <li class="active">Identitas Sekolah</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Data Identitas Sekolah</h3>
                    </div>
                    <?php $this->view('pesan')?>
                    
                    <form class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Nama Sekolah</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="" value="<?= $identitas->nama_sekolah ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">NPSN</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="" value="<?= $identitas->npsn ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">NSS</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="" value="<?= $identitas->nss ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Alamat Sekolah</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="" value="<?= $identitas->alamat_sekolah ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Kode Pos</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="" value="<?= $identitas->kode_pos ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">No Telpon</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="" value="<?= $identitas->no_telpon ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Kelurahan</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="" value="<?= $identitas->kelurahan ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Kecamatan</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="" value="<?= $identitas->kecamatan ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Kabupaten / Kota</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="" value="<?= $identitas->kabupaten_kota ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Provinsi</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="" value="<?= $identitas->provinsi ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Website</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="" value="<?= $identitas->website ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="" value="<?= $identitas->email ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <a href="<?= base_url('identitas_sekolah/edit') ?>" class="btn btn-info">Edit</a>
                        </div>
                </div>
            </div>
        </div>
    </section>
</div>