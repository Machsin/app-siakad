<html>

<head>
    <title>Cover Raport Siswa</title>
    <link rel="icon" href="<?=base_url('assets/logo.png')?>" type="image/x-icon" />
    <!-- <link rel="stylesheet" href="../bootstrap/css/printer.css"> -->
    <style type="text/css">
        /* Kode CSS Untuk PAGE ini dibuat oleh http://jsfiddle.net/2wk6Q/1/ */
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #FFFF;
            font: 12pt "Arial";
        }

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .page {
            width: 210mm;
            min-height: 297mm;
            padding: 20mm;
            margin: 10mm auto;
            border: 1px #FFF solid;
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .subpage {
            padding: 1cm;
            /* border: 5px red solid; */
            height: 257mm;
            outline: 2cm #FFF solid;
        }

        @page {
            size: A4;
            margin: 0;
        }

        @media print {

            html,
            body {
                width: 210mm;
                height: 297mm;
            }

            .page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }
        }

        table.rapor td {
            padding-left: 5px;
            padding-bottom: 25px;
            padding-right: 15px;
        }

        table.tentang td {
            padding-left: 5px;
            padding-bottom: 2px;
            padding-right: 5px;
        }
    </style>
</head>

<body onload="window.print()">
    <div class="book">
        <div class="page">
            <div class="subpage">
                <h2 align=center>RAPOR PESERTA DIDIK <br>SEKOLAH MENENGAH KEJURUAN <br> (SMK)</h2><br><br><br><br>
                <center>
                    <img width='170px' src='<?= base_url('assets/') ?>logo.png'><br><br><br><br><br><br>
                    <h3>Nama Peserta Didik :<br></h3>
                    <p style='border:1px solid #000; width:50%; padding:6px'><?= $siswa->nama; ?></p><br><br>

                    <h3>NISN :<br></h3>
                    <p style='border:1px solid #000; width:50%; padding:3px'><?= $siswa->nisn; ?></p><br><br><br><br><br><br>

                    <h3 style='font-size:22px'>KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN <br>REPUBLIK INDONESIA</h3>
                </center>
            </div>
        </div>

        <div class="page">
            <div class="subpage">
                <h2 align=center>RAPOR PESERTA DIDIK <br>SEKOLAH MENENGAH KEJURUAN <br> (SMK)</h2><br><br><br><br>
                <table style="width: 100%;" class="rapor">
                    <tr>
                        <td>Nama Sekolah</td>
                        <td>:</td>
                        <td><?= $sekolah->nama_sekolah ?></td>
                    </tr>
                    <tr>
                        <td>NPSN</td>
                        <td>:</td>
                        <td><?= $sekolah->npsn ?></td>
                    </tr>
                    <tr>
                        <td>NIS/NSS/NDS</td>
                        <td>:</td>
                        <td><?= $sekolah->nss ?></td>
                    </tr>
                    <tr>
                        <td>Alamat Sekolah</td>
                        <td>:</td>
                        <td><?= $sekolah->alamat_sekolah ?> <br> <?php echo " Kode Pos $sekolah->kode_pos Telp $sekolah->no_telpon" ?></td>
                    </tr>
                    <tr>
                        <td>Kelurahan</td>
                        <td>:</td>
                        <td><?= $sekolah->kelurahan ?></td>
                    </tr>
                    <tr>
                        <td>Kecamatan</td>
                        <td>:</td>
                        <td><?= $sekolah->kecamatan ?></td>
                    </tr>
                    <tr>
                        <td>Kota/Kabupaten</td>
                        <td>:</td>
                        <td><?= $sekolah->kabupaten_kota ?></td>
                    </tr>
                    <tr>
                        <td>Provinsi</td>
                        <td>:</td>
                        <td><?= $sekolah->provinsi ?></td>
                    </tr>
                    <tr>
                        <td>Website</td>
                        <td>:</td>
                        <td><?= $sekolah->website ?></td>
                    </tr>
                    <tr>
                        <td>E-mail</td>
                        <td>:</td>
                        <td><?= $sekolah->email ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="page">
            <div class="subpage">
                <h3 align=center>KETERANGAN TENTANG DIRI PESERTA DIDIK</h3>
                <table style="width: 100%;" class="tentang">
                    <tr>
                        <td>1.</td>
                        <td style="width: 45%">Nama Peserta Didik (Lengkap)</td>
                        <td>:</td>
                        <td><?= $siswa->nama ?></td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>Nomor Induk/NISN</td>
                        <td>:</td>
                        <td><?= $siswa->nisn ?></td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>Tempat, Tanggal Lahir</td>
                        <td>:</td>
                        <td><?= $siswa->tempat_lahir . ", " . tgl_raport($siswa->tanggal_lahir) ?></td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td><?= $siswa->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' ?></td>
                    </tr>
                    <tr>
                        <td>5.</td>
                        <td>Agama/Kepercayaan</td>
                        <td>:</td>
                        <td><?= $siswa->agama ?></td>
                    </tr>
                    <tr>
                        <td>6.</td>
                        <td>Status dalam Keluarga</td>
                        <td>:</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>7.</td>
                        <td>Anak ke</td>
                        <td>:</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>8.</td>
                        <td>Alamat Peserta Didik</td>
                        <td>:</td>
                        <td rowspan="4"><?php echo "$siswa->dusun RT:$siswa->rt RW:$siswa->rw, Kel. $siswa->kelurahan, Kec. $siswa->kecamatan" ?></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td>9.</td>
                        <td>Nomor Telepon Rumah</td>
                        <td>:</td>
                        <td><?= $siswa->no_telpon_ayah ?></td>
                    </tr>
                    <tr>
                        <td>10.</td>
                        <td>Sekolah Asal</td>
                        <td>:</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>11.</td>
                        <td>Diterima di sekolah ini</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Di Kelas</td>
                        <td>:</td>
                        <td><?php $kelas = $this->db->get_where('tb_kelas', array('kode_kelas' => $siswa->kode_kelas))->row();
                            echo $kelas->nama_kelas ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Pada Tanggal</td>
                        <td>:</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Nama Orang Tua</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>a. Ayah</td>
                        <td>:</td>
                        <td><?= $siswa->nama_ayah ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>b. Ibu</td>
                        <td>:</td>
                        <td><?= $siswa->nama_ibu ?></td>
                    </tr>
                    <tr>
                        <td>12.</td>
                        <td>Alamat Orang Tua</td>
                        <td>:</td>
                        <td rowspan="4"><?php echo "$siswa->dusun RT:$siswa->rt RW:$siswa->rw, Kel. $siswa->kelurahan, Kec. $siswa->kecamatan" ?></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Nomor Telepon Rumah</td>
                        <td>:</td>
                        <td><?= $siswa->no_telpon_ayah ?></td>
                    </tr>
                    <tr>
                        <td>13.</td>
                        <td>Pekerjaan Orang Tua</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>a. Ayah</td>
                        <td>:</td>
                        <td><?= $siswa->pekerjaan_ayah ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>b. Ibu</td>
                        <td>:</td>
                        <td><?= $siswa->pekerjaan_ibu ?></td>
                    </tr>
                    <tr>
                        <td>14.</td>
                        <td>Nama Wali Peserta Didik</td>
                        <td>:</td>
                        <td><?= $siswa->nama_wali ?></td>
                    </tr>
                    <tr>
                        <td>15.</td>
                        <td>Alamat Wali Peserta Didik</td>
                        <td>:</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Nomor Telepon Rumah</td>
                        <td>:</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>16.</td>
                        <td>Pekerjaan Wali Peserta Didik</td>
                        <td>:</td>
                        <td><?= $siswa->pekerjaan_wali ?></td>
                    </tr>
                    <tr style="height: 50px;">
                        <td colspan="4"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td rowspan="3"><img src="<?= base_url('assets/foto/siswa' . $siswa->foto) ?>" width="113px"></td>
                        <td></td>
                        <td style="vertical-align: baseline;">Lumajang, <?php echo date('d') . tgl_raport(date('dmY')) ?><br>Kepala Sekolah,</td>
                    </tr>
                    <tr style="height: 80px;">
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td style="vertical-align: bottom;"><?php echo "<u><b>" . strtoupper($kepala->nama_kepala_sekolah) . "</b></u>" ?><br>NIY. <?= $kepala->niy_nigk ?></td>
                        <!-- <td></td> -->
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>

</html>