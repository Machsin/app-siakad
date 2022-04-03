<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Jurusan
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-th"></i>Data Master</a></li>
            <li>Data Jurusan</li>
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
                            <table class='table table-condensed table-bordered'>
                                <tbody>
                                    <tr>
                                        <th width='140px' scope='row'>Kode Jurusan</th>
                                        <td><?= $jurusan->kode_jurusan ?></td>
                                    </tr>
                                    <tr>
                                        <th scope='row'>Nama Jurusan</th>
                                        <td><?= $jurusan->nama_jurusan ?></td>
                                    </tr>
                                    <tr>
                                        <th scope='row'>Bidang Keahlian</th>
                                        <td><?= $jurusan->bidang_keahlian ?></td>
                                    </tr>
                                    <tr>
                                        <th scope='row'>Kompetensi Umum</th>
                                        <td><?= $jurusan->kompetensi_umum ?></td>
                                    </tr>
                                    <tr>
                                        <th scope='row'>Kompetensi Khusus</th>
                                        <td><?= $jurusan->kompetensi_khusus ?></td>
                                    </tr>
                                    <tr>
                                        <th scope='row'>Pejabat</th>
                                        <td><?= $jurusan->pejabat ?></td>
                                    </tr>
                                    <tr>
                                        <th scope='row'>Jabatan</th>
                                        <td><?= $jurusan->jabatan ?></td>
                                    </tr>
                                    <tr>
                                        <th scope='row'>Keterangan</th>
                                        <td><?= $jurusan->keterangan ?></td>
                                    </tr>
                                    <tr>
                                        <th scope='row'>Aktif</th>
                                        <td><?= $jurusan->aktif ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="box-footer">
                                <a href="<?= base_url('jurusan') ?>" class="btn btn-default">Kembali</a>
                                <a href="<?= base_url('jurusan/edit/'.$jurusan->kode_jurusan) ?>" class="btn btn-success">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>