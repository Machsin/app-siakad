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
                        <div class="box-body">
                            <form method="POST" class="form-horizontal" action="" enctype="multipart/form-data">
                                <div class="col-md-7">
                                    <table class="table table-condensed table-bordered">
                                        <tbody>
                                            <input type="hidden" name="id" value="123">
                                            <tr>
                                                <th style="background-color:#E7EAEC" width="160px" rowspan="25"><img class="img-thumbnail" style="width:155px" src="<?=base_url('assets/foto/guru/'.$guru->foto)?>"><a href="<?=base_url('guru/edit/'.$guru->nip)?>" class="btn btn-success btn-block">Edit Profile</a></th>
                                            </tr>
                                            <tr>
                                                <th width="120px" scope="row">Nip</th>
                                                <td><?=$guru->nip?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Nama Lengkap</th>
                                                <td><?=$guru->nama_guru?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tempat Lahir</th>
                                                <td><?=$guru->tempat_lahir?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tanggal Lahir</th>
                                                <td><?=$guru->tanggal_lahir?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Jenis Kelamin</th>
                                                <td><?=$guru->jenis_kelamin=='L'?'Laki-laki':'Perempuan'?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Agama</th>
                                                <td><?=$guru->agama?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">No Hp</th>
                                                <td><?=$guru->hp?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Alamat Email</th>
                                                <td><?=$guru->email?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Alamat</th>
                                                <td><?=$guru->alamat_jalan?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">RT/RW</th>
                                                <td><?=$guru->rt.'/'.$guru->rw?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Dusun</th>
                                                <td><?=$guru->nama_dusun?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Kelurahan</th>
                                                <td><?=$guru->desa_kelurahan?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Kecamatan</th>
                                                <td><?=$guru->kecamatan?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Kode Pos</th>
                                                <td><?=$guru->kode_pos?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">NUPTK</th>
                                                <td><?=$guru->nuptk?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Bidang Studi</th>
                                                <td><?=$guru->pengawas_bidang_studi?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Jenis PTK</th>
                                                <td><?=$guru->jenis_ptk?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tugas Tambahan</th>
                                                <td><?=$guru->tugas_tambahan?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Status Pegawai</th>
                                                <td><?=$guru->kepegawaian?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Status Keaktifan</th>
                                                <td><?=$guru->id_status_keaktifan=='1'?'Aktif':'Tidak Aktif'?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Status Nikah</th>
                                                <td><?=$guru->id_status_pernikahan=='1'?'Menikah':'Belom Menikah'?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-md-5">
                                    <table class="table table-condensed table-bordered">
                                        <tbody>
                                            <tr>
                                                <th width="150px" scope="row">NIK</th>
                                                <td><?=$guru->nik?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">SK CPNS</th>
                                                <td><?=$guru->sk_cpns?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tanggal CPNS</th>
                                                <td><?=$guru->tanggal_cpns?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">SK Pengangkat</th>
                                                <td><?=$guru->sk_pengangkatan?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">TMT Pengangkat</th>
                                                <td><?=$guru->tmt_pengangkatan?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Lemb. Pengangkat</th>
                                                <td><?=$guru->lembaga_pengangkatan?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Golongan</th>
                                                <td><?=$guru->nama_golongan?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">NIY</th>
                                                <td><?=$guru->niy_nigk?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">NPWP</th>
                                                <td><?=$guru->npwp?></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                        <div class="box-footer">
                            <a href="<?= base_url('guru') ?>" class="btn btn-default">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>