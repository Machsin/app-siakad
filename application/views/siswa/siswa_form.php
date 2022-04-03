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
                    <form class="form-horizontal" action="<?= base_url('siswa/simpan') ?>" method="post" enctype="multipart/form-data">
                        <div class="box-body">

                            <div class="panel-body">
                                <ul id="myTabs" class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#siswa" id="siswa-tab" role="tab" data-toggle="tab" aria-controls="siswa" aria-expanded="true">Data Siswa </a></li>
                                    <li role="presentation" class=""><a href="#ortu" role="tab" id="ortu-tab" data-toggle="tab" aria-controls="ortu" aria-expanded="false">Data Orang Tua / Wali</a></li>
                                </ul><br>

                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active in" id="siswa" aria-labelledby="siswa-tab">
                                        <!-- <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal"> -->
                                        <input type="hidden" name="id_siswa" value="<?= $siswa->id_siswa ?>">
                                        <div class="col-md-6">
                                            <table class="table table-condensed table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <th width="130px" scope="row">NIPD</th>
                                                        <td><input required type="text" class="form-control" name="nipd" value="<?= $siswa->nipd ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">NISN</th>
                                                        <td><input required type="text" class="form-control" name="nisn" value="<?= $siswa->nisn ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Nama Siswa</th>
                                                        <td><input required type="text" class="form-control" name="nama" value="<?= $siswa->nama ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Jurusan</th>
                                                        <td>
                                                            <select class="form-control" name="jurusan" id="sel_jur" onchange="getkelas()">
                                                                <option value="0" selected="">- Pilih Jurusan -</option>
                                                                <?php foreach ($jurusan->result() as $data) { ?>
                                                                    <option value="<?= $data->kode_jurusan ?>" <?= $siswa->kode_jurusan == $data->kode_jurusan ? 'selected' : null ?>><?= $data->nama_jurusan ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Angkatan</th>
                                                        <td><input required type="text" class="form-control" name="angkatan" value="<?= $siswa->angkatan ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Kelas</th>
                                                        <td>
                                                            <select class="form-control" name="kelas" id="sel_kelas">
                                                                <option value="0" selected="">- Pilih Kelas -</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Alamat Siswa</th>
                                                        <td><input required type="text" class="form-control" name="alamat_siswa" value="<?= $siswa->alamat ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">RT/RW</th>
                                                        <td><input required type="text" class="form-control" value="<?= $siswa->rt . '/' . $siswa->rw ?>" name="rt"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Dusun</th>
                                                        <td><input required type="text" class="form-control" name="dusun" value="<?= $siswa->dusun ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Kelurahan</th>
                                                        <td><input required type="text" class="form-control" name="kelurahan" value="<?= $siswa->kelurahan ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Kecamatan</th>
                                                        <td><input required type="text" class="form-control" name="kecamatan" value="<?= $siswa->kecamatan ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Kode Pos</th>
                                                        <td><input required type="text" class="form-control" name="kode_pos" value="<?= $siswa->kode_pos ?>"></td>
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
                                                        <th width="130px" scope="row">NIK</th>
                                                        <td><input required type="text" class="form-control" name="nik" value="<?= $siswa->nik ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Tempat Lahir</th>
                                                        <td><input required type="text" class="form-control" name="tempat_lahir" value="<?= $siswa->tempat_lahir ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Tanggal Lahir</th>
                                                        <td><input required type="date" class="form-control" name="tanggal_lahir" value="<?= $siswa->tanggal_lahir ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Jenis Kelamin</th>
                                                        <td><select class="form-control" name="jenis_kelamin" required>
                                                                <option value="">- Pilih Jenis Kelamin -</option>
                                                                <option value="L" <?= $siswa->jenis_kelamin == 'L' ? 'selected' : null ?>>Laki-laki</option>
                                                                <option value="P" <?= $siswa->jenis_kelamin == 'P' ? 'selected' : null ?>>Perempuan-laki</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Agama</th>
                                                        <td><select class="form-control" name="agama" required>
                                                                <option value="">- Pilih Agama -</option>
                                                                <option value="Islam" <?= $siswa->agama == 'Islam' ? 'selected' : null ?>>Islam</option>
                                                                <option value="Kristen" <?= $siswa->agama == 'Kristen' ? 'selected' : null ?>>Kristen</option>
                                                                <option value="Hindu" <?= $siswa->agama == 'Kristen' ? 'selected' : null ?>>Hindu</option>
                                                                <option value="Budha" <?= $siswa->agama == 'Kristen' ? 'selected' : null ?>>Budha</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">No Hp/Telp</th>
                                                        <td><input required type="text" class="form-control" name="no_telpon" value="<?= $siswa->hp ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Alamat Email</th>
                                                        <td><input required type="text" class="form-control" name="email" value="<?= $siswa->email ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Status Siswa</th>
                                                        <td><input type="radio" name="status_siswa" value="Aktif" checked=""> Aktif
                                                            <input type="radio" name="status_siswa" value="Tidak Aktif"> Tidak Aktif
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- <div style="clear:both"></div>
                                    <div class="box-footer">
                                        <button type="submit" name="tambah" class="btn btn-info">Tambahkan</button>
                                        <a href="index.php?view=siswa"><button type="button" class="btn btn-default pull-right">Cancel</button></a>
                                    </div> -->
                                        <!-- </form> -->
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade" id="ortu" aria-labelledby="ortu-tab">
                                        <div class="col-md-12">
                                            <table class="table table-condensed table-bordered">
                                                <tbody>
                                                    <tr bgcolor="#e3e3e3">
                                                        <th width="130px" scope="row">Nama Ayah</th>
                                                        <td><input required type="text" class="form-control" name="nama_ayah" value="<?= $siswa->nama_ayah ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Tahun Lahir</th>
                                                        <td><input required type="text" class="form-control" name="tahun_lahir_ayah" value="<?= $siswa->tahun_lahir_ayah ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Pendidikan</th>
                                                        <td><input required type="text" class="form-control" name="pendidikan_ayah" value="<?= $siswa->pendidikan_ayah ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Pekerjaan</th>
                                                        <td><input required type="text" class="form-control" name="pekerjaan_ayah" value="<?= $siswa->pekerjaan_ayah ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Penghasilan</th>
                                                        <td><input required type="text" class="form-control" name="penghasilan_ayah" value="<?= $siswa->penghasilan_ayah ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Kebutuhan Khusus</th>
                                                        <td><input required type="text" class="form-control" name="kebutuhan_khusus_ayah" value="<?= $siswa->kebutuhan_khusus_ayah ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">No Telpon</th>
                                                        <td><input required type="text" class="form-control" name="telpon_ayah" value="<?= $siswa->no_telpon_ayah ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" coslpan="2"><br></th>
                                                    </tr>
                                                    <tr bgcolor="#e3e3e3">
                                                        <th scope="row">Nama Ibu</th>
                                                        <td><input required type="text" class="form-control" name="nama_ibu" value="<?= $siswa->nama_ibu ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Tahun Lahir</th>
                                                        <td><input required type="text" class="form-control" name="tahun_lahir_ibu" value="<?= $siswa->tahun_lahir_ibu ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Pendidikan</th>
                                                        <td><input required type="text" class="form-control" name="pendidikan_ibu" value="<?= $siswa->pendidikan_ibu ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Pekerjaan</th>
                                                        <td><input required type="text" class="form-control" name="pekerjaan_ibu" value="<?= $siswa->pekerjaan_ibu ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Penghasilan</th>
                                                        <td><input required type="text" class="form-control" name="penghasilan_ibu" value="<?= $siswa->penghasilan_ibu ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Kebutuhan Khusus</th>
                                                        <td><input required type="text" class="form-control" name="kebutuhan_khusus_ibu" value="<?= $siswa->kebutuhan_khusus_ibu ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">No Telpon</th>
                                                        <td><input required type="text" class="form-control" name="telpon_ibu" value="<?= $siswa->no_telpon_ibu ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" coslpan="2"><br></th>
                                                    </tr>
                                                    <tr bgcolor="#e3e3e3">
                                                        <th scope="row">Nama Wali</th>
                                                        <td><input required type="text" class="form-control" name="nama_wali" value="<?= $siswa->nama_wali ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Tahun Lahir</th>
                                                        <td><input required type="text" class="form-control" name="tahun_lahir_wali" value="<?= $siswa->tahun_lahir_wali ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Pendidikan</th>
                                                        <td><input required type="text" class="form-control" name="pendidikan_wali" value="<?= $siswa->pendidikan_wali ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Pekerjaan</th>
                                                        <td><input required type="text" class="form-control" name="pekerjaan_wali" value="<?= $siswa->pekerjaan_wali ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Penghasilan</th>
                                                        <td><input required type="text" class="form-control" name="penghasilan_wali" value="<?= $siswa->penghasilan_wali ?>"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="box-footer">
                            <button type="submit" name="<?= $page ?>" class="btn btn-info"><?=$value?></button>
                            <a href="<?= base_url('siswa') ?>"><button type="button" class="btn btn-default pull-right">Cancel</button></a>
                        </div>
                    </form>
                </div>
            </div>
    </section>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    // $(document).ready(function() {

    //     $("#sel_jur").change(function() {
    //         var kode_jur = $(this).val();

    //         $.ajax({
    //             url: '<?= base_url('siswa') ?>/getkelas',
    //             type: 'post',
    //             data: {
    //                 kode_jurusan: kode_jur
    //             },
    //             dataType: 'json',
    //             success: function(response) {

    //                 var len = response.length;

    //                 $("#sel_kelas").empty();
    //                 for (var i = 0; i < len; i++) {
    //                     var kode_jurusan = response[i]['jurusan'];
    //                     var nama_kelas = response[i]['kelas'];

    //                     $("#sel_kelas").append("<option value='" + kode_jurusan + "'>" + nama_kelas + "</option>");

    //                 }
    //             }
    //         });
    //     });

    // });
    // window.onload = function() {
    //     var kode_jur = document.getElementById("sel_jur").value;
    //     if(kode_jur !=''){
    //         $.ajax({
    //         url: '<?= base_url('siswa') ?>/getkelas',
    //         type: 'post',
    //         data: {
    //             kode_jurusan: kode_jur
    //         },
    //         dataType: 'json',
    //         success: function(response) {

    //             var len = response.length;

    //             $("#sel_kelas").empty();
    //             for (var i = 0; i < len; i++) {
    //                 var kode_jurusan = response[i]['jurusan'];
    //                 var nama_kelas = response[i]['kelas'];

    //                 $("#sel_kelas").append("<option value='" + kode_jurusan + "'>" + nama_kelas + "</option>");

    //             }
    //         }
    //     });
    //     }
    // };
    function getkelas(){
        var kode_jur = document.getElementById("sel_jur").value;

            $.ajax({
                url: '<?= base_url('siswa') ?>/getkelas',
                type: 'post',
                data: {
                    kode_jurusan: kode_jur
                },
                dataType: 'json',
                success: function(response) {

                    var len = response.length;

                    $("#sel_kelas").empty();
                    for (var i = 0; i < len; i++) {
                        var kode_jurusan = response[i]['jurusan'];
                        var nama_kelas = response[i]['kelas'];

                        $("#sel_kelas").append("<option value='" + kode_jurusan + "'>" + nama_kelas + "</option>");

                    }
                }
            });
    }
</script>