<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Administrator
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-th"></i>Data Master</a></li>
            <li>Data Administrator</li>
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
                        <form class="form-horizontal" action="<?= base_url('administrator/simpan') ?>" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <input type="hidden" name="id_administrator" value="<?= $administrator->id_administrator ?>">
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label" required>NIP</label>
                                    <div class="col-sm-4">
                                        <select name="nip" class="form-control">
                                            <option value="">- Pilih NIP -</option>
                                            <?php foreach ($guru->result() as $data) { ?>
                                                <option value="<?= $data->nip ?>" <?= $data->nip == $administrator->nip ? 'selected' : null ?>><?= $data->nip . ' || ' . $data->nama_guru ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Username</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="username" id="" value="<?= $administrator->username ?>" placeholder="Masukkkan Username" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Password</label>
                                    <div class="col-sm-4">
                                        <input type="password" class="form-control" name="password" id="" value="" placeholder="Masukkkan Password" required>
                                        <?php if ($page == 'edit') { ?>
                                            <small>Kosongi password jika tidak ingin mengubah</small>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Level</label>
                                    <div class="col-sm-2">
                                        <select name="level" class="form-control" required>
                                            <option value="">- Pilih Level -</option>
                                            <option value="Admin" <?= $administrator->level == 'Admin' ? 'selected' : null ?>>Admin</option>
                                            <option value="Kepala Sekolah" <?= $administrator->level == 'Kepala Sekolah' ? 'selected' : null ?>>Kepala Sekolah</option>
                                            <option value="Guru" <?= $administrator->level == 'Guru' ? 'selected' : null ?>>Guru</option>
                                            <option value="Wali Kelas" <?= $administrator->level == 'Wali Kelas' ? 'selected' : null ?>>Wali Kelas</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <!-- <a href="<?= base_url('administrator') ?>" class="btn btn-default">Kembali</a> -->
                                    <button onclick="window.history.go(-1)" class="btn btn-default">Kembali</a>
                                    <button type="submit" class="btn btn-info" name="<?= $page ?>">simpan</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>