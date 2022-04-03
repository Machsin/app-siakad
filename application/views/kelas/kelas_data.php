<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Kelas
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-th"></i>Data Master</a></li>
            <li class="active">Data Kelas</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <?php $this->view('pesan') ?>
                        <h3 class="box-title">Data Kelas</h3>
                        <a class='pull-right btn btn-primary btn-sm' href='<?= base_url('kelas/tambah') ?>'>Tambahkan Data</a>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style='width:40px'>No</th>
                                    <th>Kode Kelas</th>
                                    <th>Nama Kelas</th>
                                    <th>Wali Kelas</th>
                                    <th>Jurusan</th>
                                    <th>Ruangan</th>
                                    <th>Gedung</th>
                                    <th>Jumlah Siswa</th>
                                    <th style='width:70px'>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($kelas->result() as $data) {
                                    $jsiswa = $this->db->select('*')->from('tb_siswa')->where('kode_kelas', $data->kode_kelas)->get()->num_rows()
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data->kode_kelas ?></td>
                                        <td><?= $data->nama_kelas ?></td>
                                        <td><?= $data->nama_guru ?></td>
                                        <td><?= $data->nama_jurusan ?></td>
                                        <td><?= $data->nama_ruangan ?></td>
                                        <td><?= $data->nama_gedung ?></td>
                                        <td><?= $jsiswa . ' Orang' ?></td>
                                        <td>
                                            <center>
                                                <a class='btn btn-success btn-xs' title='Edit Data' href='<?= base_url('kelas/edit/' . $data->kode_kelas) ?>'><span class='glyphicon glyphicon-edit'></span></a>
                                                <a class='btn btn-danger btn-xs' onclick="return confirm ('Apakah anda ingin menghapus data ini?')" title='Delete Data' href='<?= base_url('kelas/hapus/' . $data->kode_kelas) ?>'><span class='glyphicon glyphicon-remove'></span></a>
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