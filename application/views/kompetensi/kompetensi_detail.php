<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Kompetensi Dasar
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-th"></i>Data Master</a></li>
            <li class="active">Data Kompetensi Dasar</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <?php $this->view('pesan') ?>
                        <?php $kodejdwl= $this->uri->segment(3)?>
                        <h3 class="box-title">Data Kompetensi Dasar</h3>
                        <a class='pull-right btn btn-primary btn-sm' href='<?= base_url('kompetensi/tambah/'.$kodejdwl) ?>'>Tambahkan Data</a>
                        <a class='pull-right btn btn-default btn-sm' style="margin-right:5px" href='<?=base_url('kompetensi')?>'>Kembali</a>
                    </div>
                    <div class="box-body">
                        <table class='table table-condensed table-hover'>
                            <tbody>
                                <tr>
                                    <th width='120px' scope='row'>Nama Kelas</th>
                                    <td><?=$detail->nama_kelas?></td>
                                </tr>
                                <tr>
                                    <th scope='row'>Nama Guru</th>
                                    <td><?=$detail->nama_guru?></td>
                                </tr>
                                <tr>
                                    <th scope='row'>Mata Pelajaran</th>
                                    <td><?=$detail->namamatapelajaran?></td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style='width:40px'>No</th>
                                    <th>Ranah</th>
                                    <th>Indikator</th>
                                    <th style='width:70px'>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($kompetensi->result() as $data) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data->ranah ?></td>
                                        <td><?= $data->kompetensi_dasar ?></td>
                                        <td>
                                            <center>
                                                <a class='btn btn-success btn-xs' title='Edit Data' href='<?= base_url('kompetensi/edit/' . $data->id_kompetensi_dasar) ?>'><span class='glyphicon glyphicon-edit'></span></a>
                                                <a class='btn btn-danger btn-xs' onclick="return confirm ('Apakah anda ingin menghapus data ini?')" title='Delete Data' href='<?= base_url('kompetensi/hapus/' . $data->id_kompetensi_dasar) ?>'><span class='glyphicon glyphicon-remove'></span></a>
                                            </center>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>