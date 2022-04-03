<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Siswa
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-th"></i>Data Master</a></li>
            <li>Data Siswa</li>
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
                        <div class="box-body">
                            <ul id="myTabs" class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#siswa" id="siswa-tab" role="tab" data-toggle="tab" aria-controls="siswa" aria-expanded="true">Data Siswa </a></li>
                                <li role="presentation" class=""><a href="#ortu" role="tab" id="ortu-tab" data-toggle="tab" aria-controls="ortu" aria-expanded="false">Data Orang Tua / Wali</a></li>
                            </ul>
                            <br>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="siswa" aria-labelledby="siswa-tab">
                                    <form class="form-horizontal">
                                        <div class="col-md-7">
                                            <table class="table table-condensed table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <th style="background-color:#E7EAEC" width="160px" rowspan="17"><img class="img-thumbnail" style="width:155px" src="<?=base_url('assets/foto/siswa/'.$siswa->foto)?>"><a href="<?=base_url('siswa/edit/'.$siswa->id_siswa)?>" class="btn btn-success btn-block">Edit Profile</a></th>
                                                    </tr>
                                                    <tr>
                                                        <th width="120px" scope="row">NIPD</th>
                                                        <td><?=$siswa->nipd?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">NISN</th>
                                                        <td><?=$siswa->nisn?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Nama Siswa</th>
                                                        <td><?=$siswa->nama?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Kelas</th>
                                                        <td><?=$siswa->nama_kelas?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Angkatan</th>
                                                        <td><?=$siswa->angkatan?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Jurusan</th>
                                                        <td><?=$siswa->nama_jurusan?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Alamat Siswa</th>
                                                        <td><?=$siswa->alamat?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">RT/RW</th>
                                                        <td><?=$siswa->rt?>/<?=$siswa->rw?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Dusun</th>
                                                        <td><?=$siswa->dusun?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Kelurahan</th>
                                                        <td><?=$siswa->kelurahan?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Kecamatan</th>
                                                        <td><?=$siswa->kecamatan?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Kode Pos</th>
                                                        <td><?=$siswa->kode_pos?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Status Awal</th>
                                                        <td><?=$siswa->status_awal?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Status Siswa</th>
                                                        <td><?=$siswa->status_siswa?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-5">
                                            <table class="table table-condensed table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <th width="120px" scope="row">NIK</th>
                                                        <td><?=$siswa->nik?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Tempat Lahir</th>
                                                        <td><?=$siswa->tempat_lahir?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Tanggal Lahir</th>
                                                        <td><?=$siswa->tanggal_lahir?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Jenis Kelamin</th>
                                                        <td><?=$siswa->jenis_kelamin=='L'?'Laki-laki':'Perempuan'?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Agama</th>
                                                        <td><?=$siswa->agama?></td>
                                                    </tr>
                                                    <!-- <tr>
                                                        <th scope="row">Keb. Khusus</th>
                                                        <td><?=$siswa->kebutuhan_khusus?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Jenis Tinggal</th>
                                                        <td><?=$siswa->jenis_tinggal?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Transportasi</th>
                                                        <td><?=$siswa->alat_transportasi?></td>
                                                    </tr> -->
                                                    <tr>
                                                        <th scope="row">No Telpon</th>
                                                        <td><?=$siswa->telepon?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">No Handpone</th>
                                                        <td><?=$siswa->hp?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Alamat Email</th>
                                                        <td><?=$siswa->email?></td>
                                                    </tr>
                                                    <!-- <tr>
                                                        <th scope="row">SKHUN</th>
                                                        <td><?=$siswa->skhun?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Penerima KPS</th>
                                                        <td><?=$siswa->penerima_kps?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">No KPS</th>
                                                        <td><?=$siswa->no_kps?></td>
                                                    </tr> -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </form>
                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="ortu" aria-labelledby="ortu-tab">
                                    <form class="form-horizontal">
                                        <div class="col-md-12">
                                            <table class="table table-condensed table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <th style="background-color:#E7EAEC" width="160px" rowspan="20"><img class="img-thumbnail" style="width:155px" src="<?=base_url('assets/foto/siswa/'.$siswa->foto)?>"><a href="<?=base_url('siswa/edit/'.$siswa->id_siswa)?>" class="btn btn-success btn-block">Edit Profile</a></th>
                                                    </tr>
                                                    <tr bgcolor="#e3e3e3">
                                                        <th width="120px" scope="row">Nama Ayah</th>
                                                        <td><?=$siswa->nama_ayah?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Tahun Lahir</th>
                                                        <td><?=$siswa->tahun_lahir_ayah?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Pendidikan</th>
                                                        <td><?=$siswa->pendidikan_ayah?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Pekerjaan</th>
                                                        <td><?=$siswa->pekerjaan_ayah?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Penghasilan</th>
                                                        <td><?=$siswa->penghasilan_ayah?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">No Telpon</th>
                                                        <td><?=$siswa->no_telpon_ayah?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" coslpan="2"><br></th>
                                                    </tr>
                                                    <tr bgcolor="#e3e3e3">
                                                        <th scope="row">Nama Ibu</th>
                                                        <td><?=$siswa->nama_ibu?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Tahun Lahir</th>
                                                        <td><?=$siswa->tahun_lahir_ibu?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Pendidikan</th>
                                                        <td><?=$siswa->pendidikan_ibu?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Pekerjaan</th>
                                                        <td><?=$siswa->pekerjaan_ibu?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Penghasilan</th>
                                                        <td><?=$siswa->penghasilan_ibu?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">No Telpon</th>
                                                        <td><?=$siswa->no_telpon_ibu?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" coslpan="2"><br></th>
                                                    </tr>
                                                    <tr bgcolor="#e3e3e3">
                                                        <th scope="row">Nama Wali</th>
                                                        <td><?=$siswa->nama_wali?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Tahun Lahir</th>
                                                        <td><?=$siswa->tahun_lahir_wali?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Pendidikan</th>
                                                        <td><?=$siswa->pendidikan_wali?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Pekerjaan</th>
                                                        <td><?=$siswa->pekerjaan_wali?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Penghasilan</th>
                                                        <td><?=$siswa->penghasilan_wali?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="box-footer">
                            <a href="<?= base_url('siswa') ?>" class="btn btn-default">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>