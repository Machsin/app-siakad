<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?php $akun=$this->db->get_where('tb_guru',array('nip'=>$this->session->userdata('nip')))->row();?>
                <img src="<?= base_url('assets/foto/guru/'.$akun->foto) ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>
                <?= $akun->nama_guru;?>
                </p>
                <a href="<?= base_url('assets/') ?>#"><i class="fa fa-circle text-success"></i>Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Menu Administrator</li>
            <li class="active treeview">
                <a href="<?= base_url('assets/') ?>#">
                    <i class="fa fa-dashboard"></i><span>Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?= base_url('assets/') ?>#">
                    <i class="fa fa-th"></i>
                    <span>Data Master</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url("identitas_sekolah") ?>"><i class="fa fa-circle-o"></i> Data Identitas Sekolah</a></li>
                    <li><a href="<?= base_url("kurikulum") ?>"><i class="fa fa-circle-o"></i> Data Kurikulum</a></li>
                    <li><a href="<?= base_url("tahun") ?>"><i class="fa fa-circle-o"></i> Data Tahun Akademik</a></li>
                    <li><a href="<?= base_url("gedung") ?>"><i class="fa fa-circle-o"></i> Data Gedung</a></li>
                    <li><a href="<?= base_url("ruangan") ?>"><i class="fa fa-circle-o"></i> Data Ruangan</a></li>
                    <li><a href="<?= base_url("golongan") ?>"><i class="fa fa-circle-o"></i> Data Golongan</a></li>
                    <li><a href="<?= base_url("ptk") ?>"><i class="fa fa-circle-o"></i> Data Jenis PTK</a></li>
                    <li><a href="<?= base_url("jurusan") ?>"><i class="fa fa-circle-o"></i> Data Jurusan</a></li>
                    <li><a href="<?= base_url("kelas") ?>"><i class="fa fa-circle-o"></i> Data Kelas</a></li>
                    <li><a href="<?= base_url("kepegawaian") ?>"><i class="fa fa-circle-o"></i> Data Status Kepegawaian</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="<?= base_url('assets/') ?>#">
                    <i class="fa fa-user"></i>
                    <span>Data Pengguna</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url("siswa") ?>"><i class="fa fa-circle-o"></i> Data Siswa</a></li>
                    <li><a href="<?= base_url("guru") ?>"><i class="fa fa-circle-o"></i> Data Guru</a></li>
                    <li><a href="<?= base_url("kepala_sekolah") ?>"><i class="fa fa-circle-o"></i> Data Kepala Sekolah</a></li>
                    <li><a href="<?= base_url("administrator") ?>"><i class="fa fa-circle-o"></i> Data Administrator</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="<?= base_url('assets/') ?>#">
                    <i class="fa fa-tag"></i>
                    <span>Data Akademik</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url("kelompok_mapel") ?>"><i class="fa fa-circle-o"></i> Data Kelompok Mapel</a></li>
                    <li><a href="<?= base_url("Mata_Pelajaran") ?>"><i class="fa fa-circle-o"></i> Data Mata Pelajaran</a></li>
                    <li><a href="<?= base_url("jadwal") ?>"><i class="fa fa-circle-o"></i> Data Jadwal Pelajaran</a></li>
                    <li><a href="<?= base_url("kompetensi") ?>"><i class="fa fa-circle-o"></i> Data Kompetensi Dasar</a></li>
                    <li><a href="<?= base_url("predikat") ?>"><i class="fa fa-circle-o"></i> Data Rentang Nilai</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="<?= base_url('assets/') ?>#">
                    <i class="fa fa-th-large"></i>
                    <span>Data Absensi</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=base_url('absen_guru')?>"><i class="fa fa-circle-o"></i> Absensi Guru</a></li>
                    <li><a href="<?=base_url('absen_siswa')?>"><i class="fa fa-circle-o"></i> Absensi Siswa</a></li>
                    <li><a href="<?=base_url('rekap_absen')?>"><i class="fa fa-circle-o"></i> Rekap Absensi Siswa</a></li>
                </ul>
            </li>
            <li>
                <a href="<?= base_url("jurnal") ?>">
                    <i class="fa fa-tags"></i>
                    <span>Jurnal KBM</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?= base_url('assets/') ?>#">
                    <i class="fa fa-calendar"></i>
                    <span>Laporan Nilai</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=base_url('nilai_uts')?>"><i class="fa fa-circle-o"></i> Data Nilai UTS</a></li>
                    <li><a href="<?=base_url('')?>"><i class="fa fa-circle-o"></i> Cetak Raport UTS</a></li>
                    <li><a href="<?=base_url('capaian_belajar')?>"><i class="fa fa-circle-o"></i> Data Capaian Belajar</a></li>
                    <li><a href="<?=base_url('extrakulikuler')?>"><i class="fa fa-circle-o"></i> Data Extrakulikuler</a></li>
                    <li><a href="<?=base_url('prestasi')?>"><i class="fa fa-circle-o"></i> Data Prestasi</a></li>
                    <li><a href="<?=base_url('nilai_raport')?>"><i class="fa fa-circle-o"></i> Data Nilai Raport</a></li>
                    <li><a href="<?=base_url('')?>"><i class="fa fa-circle-o"></i> Cetak Raport</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>