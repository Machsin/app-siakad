<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Kepala Sekolah
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-th"></i>Data Master</a></li>
            <li>Data Kepala Sekolah</li>
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
                            <form method="POST" class="form-horizontal" action="" enctype="multipart/form-data">
                                <div class="col-md-7">
                                    <table class="table table-condensed table-bordered">
                                        <tbody>
                                            <input type="hidden" name="id" value="123">
                                            <tr>
                                                <th style="background-color:#E7EAEC" width="160px" rowspan="25"><img class="img-thumbnail" style="width:155px" src="<?=base_url('assets/foto/kepala_sekolah/'.$kepala_sekolah->foto)?>"><a href="<?=base_url('kepala_sekolah/edit/'.$kepala_sekolah->nip)?>" class="btn btn-success btn-block">Edit Profile</a></th>
                                            </tr>
                                            <tr>
                                                <th width="120px" scope="row">Nip</th>
                                                <td><?=$kepala_sekolah->nip?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Nama Lengkap</th>
                                                <td><?=$kepala_sekolah->nama_kepala_sekolah?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tempat Lahir</th>
                                                <td><?=$kepala_sekolah->tempat_lahir?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tanggal Lahir</th>
                                                <td><?=$kepala_sekolah->tanggal_lahir?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Jenis Kelamin</th>
                                                <td><?=$kepala_sekolah->jenis_kelamin=='L'?'Laki-laki':'Perempuan'?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Agama</th>
                                                <td><?=$kepala_sekolah->agama?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">No Hp</th>
                                                <td><?=$kepala_sekolah->hp?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Alamat Email</th>
                                                <td><?=$kepala_sekolah->email?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Alamat</th>
                                                <td><?=$kepala_sekolah->alamat_jalan?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">RT/RW</th>
                                                <td><?=$kepala_sekolah->rt.'/'.$kepala_sekolah->rw?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Dusun</th>
                                                <td><?=$kepala_sekolah->nama_dusun?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Kelurahan</th>
                                                <td><?=$kepala_sekolah->desa_kelurahan?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Kecamatan</th>
                                                <td><?=$kepala_sekolah->kecamatan?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Kode Pos</th>
                                                <td><?=$kepala_sekolah->kode_pos?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">NUPTK</th>
                                                <td><?=$kepala_sekolah->nuptk?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Bidang Studi</th>
                                                <td><?=$kepala_sekolah->pengawas_bidang_studi?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Jenis PTK</th>
                                                <td><?=$kepala_sekolah->jenis_ptk?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tugas Tambahan</th>
                                                <td><?=$kepala_sekolah->tugas_tambahan?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Status Pegawai</th>
                                                <td><?=$kepala_sekolah->kepegawaian?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Status Keaktifan</th>
                                                <td><?=$kepala_sekolah->id_status_keaktifan=='1'?'Aktif':'Tidak Aktif'?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Status Nikah</th>
                                                <td><?=$kepala_sekolah->id_status_pernikahan=='1'?'Menikah':'Belom Menikah'?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-md-5">
                                    <table class="table table-condensed table-bordered">
                                        <tbody>
                                            <tr>
                                                <th width="150px" scope="row">NIK</th>
                                                <td><?=$kepala_sekolah->nik?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">SK CPNS</th>
                                                <td><?=$kepala_sekolah->sk_cpns?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tanggal CPNS</th>
                                                <td><?=$kepala_sekolah->tanggal_cpns?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">SK Pengangkat</th>
                                                <td><?=$kepala_sekolah->sk_pengangkatan?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">TMT Pengangkat</th>
                                                <td><?=$kepala_sekolah->tmt_pengangkatan?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Lemb. Pengangkat</th>
                                                <td><?=$kepala_sekolah->lembaga_pengangkatan?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Golongan</th>
                                                <td><?=$kepala_sekolah->nama_golongan?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">NIY</th>
                                                <td><?=$kepala_sekolah->niy_nigk?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">NPWP</th>
                                                <td><?=$kepala_sekolah->npwp?></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                        <div class="box-footer">
                            <a href="<?= base_url('kepala_sekolah') ?>" class="btn btn-default">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>