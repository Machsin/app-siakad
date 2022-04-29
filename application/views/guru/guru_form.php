<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Guru
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-th"></i>Data Master</a></li>
            <li>Data Guru</li>
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
                        <form method="POST" class="form-horizontal" action="<?= base_url('guru/simpan') ?>" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <table class="table table-condensed table-bordered">
                                    <tbody>
                                        <tr>
                                            <th width="120px" scope="row">Nip</th>
                                            <td><input required type="text" class="form-control" name="nip" value="<?=$guru->nip?>"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Nama Lengkap</th>
                                            <td><input required type="text" class="form-control" name="nama_guru" value="<?=$guru->nama_guru?>"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Tempat Lahir</th>
                                            <td><input required type="text" class="form-control" name="tempat_lahir" value="<?=$guru->tempat_lahir?>"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Tanggal Lahir</th>
                                            <td><input required type="date" class="form-control" name="tanggal_lahir" value="<?=$guru->tanggal_lahir?>"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Jenis Kelamin</th>
                                            <td><select class="form-control" name="jenis_kelamin">
                                                    <option value="">- Pilih Jenis Kelamin -</option>
                                                    <option value="L" <?=$guru->jenis_kelamin=='L'?'selected':null?>>Laki-laki</option>
                                                    <option value="P" <?=$guru->jenis_kelamin=='P'?'selected':null?>>Perempuan</option>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Agama</th>
                                            <td><select class="form-control" name="agama">
                                                    <option value="">- Pilih Agama -</option>
                                                    <option value="Islam" <?=$guru->agama=='Islam'?'Selected':null?>>Islam</option>
                                                    <option value="Kristen" <?=$guru->agama=='Kristen'?'Selected':null?>>Kristen</option>
                                                    <option value="Hindu" <?=$guru->agama=='Hindu'?'Selected':null?>>Hindu</option>
                                                    <option value="Budha" <?=$guru->agama=='Budha'?'Selected':null?>>Budha</option>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">No Hp</th>
                                            <td><input required type="text" class="form-control" name="hp"  value="<?=$guru->hp?>"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Alamat Email</th>
                                            <td><input required type="text" class="form-control" name="email"  value="<?=$guru->email?>"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Alamat</th>
                                            <td><input required type="text" class="form-control" name="alamat" value="<?=$guru->alamat_jalan?>"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">RT/RW</th>
                                            <td><input required type="text" class="form-control" name="rtrw" value="<?=$guru->rt.'/'.$guru->rw?>"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Dusun</th>
                                            <td><input required type="text" class="form-control" name="dusun" value="<?=$guru->nama_dusun?>"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Kelurahan</th>
                                            <td><input required type="text" class="form-control" name="kelurahan" value="<?=$guru->desa_kelurahan?>"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Kecamatan</th>
                                            <td><input required type="text" class="form-control" name="kecamatan" value="<?=$guru->kecamatan?>"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Kode Pos</th>
                                            <td><input required type="text" class="form-control" name="kodepos" value="<?=$guru->kode_pos?>"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">NUPTK</th>
                                            <td><input required type="text" class="form-control" name="nuptk" value="<?=$guru->nuptk?>"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Bidang Studi</th>
                                            <td><input required type="text" class="form-control" name="bidang_studi" value="<?=$guru->pengawas_bidang_studi?>"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Jenis PTK</th>
                                            <td><select class="form-control" name="jenis_ptk">
                                                    <option value="">- Pilih Jenis PTK -</option>
                                                    <?php foreach ($ptk->result() as $data) { ?>
                                                        <option value="<?= $data->id_jenis_ptk ?>" <?=$guru->id_jenis_ptk==$data->id_jenis_ptk?'selected':null?>><?= $data->jenis_ptk ?></option>
                                                    <?php } ?>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Tugas Tambahan</th>
                                            <td><input required type="text" class="form-control" name="tugas" value="<?=$guru->tugas_tambahan?>"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Status Pegawai</th>
                                            <td><select class="form-control" name="kepegawaian">
                                                    <option value="">- Pilih Status Kepegawaian -</option>
                                                    <?php foreach ($kepegawaian->result() as $data) { ?>
                                                        <option value="<?= $data->id_kepegawaian ?>" <?=$guru->id_status_kepegawaian==$data->id_kepegawaian?'selected':null?>><?= $data->kepegawaian ?></option>
                                                    <?php } ?>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Status Keaktifan</th>
                                            <td><select class="form-control" name="status">
                                                    <option value="0" selected="">- Pilih Status Keaktifan -</option>
                                                    <option value="1"<?=$guru->id_status_keaktifan=='1'?'Selected':null?>>Aktif</option>
                                                    <option value="2"<?=$guru->id_status_keaktifan=='2'?'Selected':null?>>Tidak Aktif</option>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Status Nikah</th>
                                            <td><select class="form-control" name="nikah">
                                                    <option value="0" selected="">- Pilih Status Pernikahan -</option>
                                                    <option value="1" <?=$guru->id_status_pernikahan=='1'?'selected':null?>>Menikah</option>
                                                    <option value="2" <?=$guru->id_status_pernikahan=='2'?'selected':null?>>Belum Menikah</option>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Foto</th>
                                            <td>
                                                <input type="file" class="form-control" name="img" <?= $page == 'tambah' ? 'required' : null ?>>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-6">
                                <table class="table table-condensed table-bordered">
                                    <tbody>
                                        <tr>
                                            <th width="150px" scope="row">NIK</th>
                                            <td><input required type="text" class="form-control" name="nik" value="<?=$guru->nik?>"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">SK CPNS</th>
                                            <td><input required type="text" class="form-control" name="skcpns" value="<?=$guru->sk_cpns?>"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Tanggal CPNS</th>
                                            <td><input required type="date" class="form-control" name="tanggal_cpns" value="<?=$guru->tanggal_cpns?>"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">SK Pengangkat</th>
                                            <td><input required type="text" class="form-control" name="sk_pengangkat"  value="<?=$guru->sk_pengangkatan?>"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">TMT Pengangkat</th>
                                            <td><input required type="text" class="form-control" name="tmt_pengangkat" value="<?=$guru->tmt_pengangkatan?>"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Lemb. Pengangkat</th>
                                            <td><input required type="text" class="form-control" name="lemb_pengangkat" value="<?=$guru->lembaga_pengangkatan?>"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Golongan</th>
                                            <td><select class="form-control" name="golongan">
                                                    <option value="">- Pilih Golongan -</option>
                                                    <?php foreach ($golongan->result() as $data) { ?>
                                                        <option value="<?= $data->id_golongan ?>" <?=$guru->id_golongan==$data->id_golongan?'selected':null?>><?= $data->nama_golongan ?></option>
                                                    <?php } ?>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">NIY</th>
                                            <td><input required type="text" class="form-control" name="niy" value="<?=$guru->niy_nigk?>"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">NPWP</th>
                                            <td><input required type="text" class="form-control" name="npwp" value="<?=$guru->npwp?>"></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div style="clear:both"></div>
                            <div class="box-footer">
                                <button type="submit" name="<?= $page ?>" class="btn btn-info"><?= $value ?></button>
                                <!-- <a href="<?= base_url('guru') ?>"><button type="button" class="btn btn-default pull-right">Cancel</button></a> -->
                                <button type="button" onclick="window.history.go(-1)" class="btn btn-default pull-right">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>