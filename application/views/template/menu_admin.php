<ul class="sidebar-menu" data-widget="tree">
    <li class="header">Menu Administrator</li>
    <li class="treeview">
        <a href="<?= base_url('assets/') ?>#">
            <i class="fa fa-dashboard"></i><span>Dashboard</span>
        </a>
    </li>
    <li class="treeview <?= $this->uri->segment(1) == 'identitas_sekolah' || $this->uri->segment(1) == 'kurikulum' || $this->uri->segment(1) == 'tahun' || $this->uri->segment(1) == 'gedung' || $this->uri->segment(1) == 'ruangan' || $this->uri->segment(1) == 'ptk' || $this->uri->segment(1) == 'jurusan' || $this->uri->segment(1) == 'kelas' || $this->uri->segment(1) == 'kepegawaian' ? 'active menu-open' : null ?>">
        <a href="<?= base_url('assets/') ?>#">
            <i class="fa fa-th"></i>
            <span>Data Master</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="<?= $this->uri->segment(1) == 'identitas_sekolah' ? 'active' : null ?>"><a href="<?= base_url("identitas_sekolah") ?>"><i class="fa fa-circle-o"></i> Data Identitas Sekolah</a></li>
            <li class="<?= $this->uri->segment(1) == 'kurikulum' ? 'active' : null ?>"><a href="<?= base_url("kurikulum") ?>"><i class="fa fa-circle-o"></i> Data Kurikulum</a></li>
            <li class="<?= $this->uri->segment(1) == 'tahun' ? 'active' : null ?>"><a href="<?= base_url("tahun") ?>"><i class="fa fa-circle-o"></i> Data Tahun Akademik</a></li>
            <li class="<?= $this->uri->segment(1) == 'gedung' ? 'active' : null ?>"><a href="<?= base_url("gedung") ?>"><i class="fa fa-circle-o"></i> Data Gedung</a></li>
            <li class="<?= $this->uri->segment(1) == 'ruangan' ? 'active' : null ?>"><a href="<?= base_url("ruangan") ?>"><i class="fa fa-circle-o"></i> Data Ruangan</a></li>
            <li class="<?= $this->uri->segment(1) == 'golongan' ? 'active' : null ?>"><a href="<?= base_url("golongan") ?>"><i class="fa fa-circle-o"></i> Data Golongan</a></li>
            <li class="<?= $this->uri->segment(1) == 'ptk' ? 'active' : null ?>"><a href="<?= base_url("ptk") ?>"><i class="fa fa-circle-o"></i> Data Jenis PTK</a></li>
            <li class="<?= $this->uri->segment(1) == 'jurusan' ? 'active' : null ?>"><a href="<?= base_url("jurusan") ?>"><i class="fa fa-circle-o"></i> Data Jurusan</a></li>
            <li class="<?= $this->uri->segment(1) == 'kelas' ? 'active' : null ?>"><a href="<?= base_url("kelas") ?>"><i class="fa fa-circle-o"></i> Data Kelas</a></li>
            <li class="<?= $this->uri->segment(1) == 'kepegawaian' ? 'active' : null ?>"><a href="<?= base_url("kepegawaian") ?>"><i class="fa fa-circle-o"></i> Data Status Kepegawaian</a></li>
        </ul>
    </li>
    <li class="treeview <?= $this->uri->segment(1) == 'siswa' || $this->uri->segment(1) == 'guru' || $this->uri->segment(1) == 'kepala_sekolah' || $this->uri->segment(1) == 'administrator' ? 'active menu-open' : null ?>">
        <a href="<?= base_url('assets/') ?>#">
            <i class="fa fa-user"></i>
            <span>Data Pengguna</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="<?= $this->uri->segment(1) == 'siswa' ? 'active' : null ?>"><a href="<?= base_url("siswa") ?>"><i class="fa fa-circle-o"></i> Data Siswa</a></li>
            <li class="<?= $this->uri->segment(1) == 'guru' ? 'active' : null ?>"><a href="<?= base_url("guru") ?>"><i class="fa fa-circle-o"></i> Data Guru</a></li>
            <li class="<?= $this->uri->segment(1) == 'kepala_sekolah' ? 'active' : null ?>"><a href="<?= base_url("kepala_sekolah") ?>"><i class="fa fa-circle-o"></i> Data Kepala Sekolah</a></li>
            <li class="<?= $this->uri->segment(1) == 'administrator' ? 'active' : null ?>"><a href="<?= base_url("administrator") ?>"><i class="fa fa-circle-o"></i> Data Administrator</a></li>
        </ul>
    </li>
    <li class="treeview <?= $this->uri->segment(1) == 'kelompok_mapel' || $this->uri->segment(1) == 'mata_pelajaran' || $this->uri->segment(1) == 'jadwal' || $this->uri->segment(1) == 'kompetensi' || $this->uri->segment(1) == 'predikat' ? 'active menu-open' : null ?>">
        <a href="<?= base_url('assets/') ?>#">
            <i class="fa fa-tag"></i>
            <span>Data Akademik</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="<?= $this->uri->segment(1) == 'kelompok_mapel' ? 'active' : null ?>"><a href="<?= base_url("kelompok_mapel") ?>"><i class="fa fa-circle-o"></i> Data Kelompok Mapel</a></li>
            <li class="<?= $this->uri->segment(1) == 'mata_pelajaran' ? 'active' : null ?>"><a href="<?= base_url("mata_pelajaran") ?>"><i class="fa fa-circle-o"></i> Data Mata Pelajaran</a></li>
            <li class="<?= $this->uri->segment(1) == 'jadwal' ? 'active' : null ?>"><a href="<?= base_url("jadwal") ?>"><i class="fa fa-circle-o"></i> Data Jadwal Pelajaran</a></li>
            <li class="<?= $this->uri->segment(1) == 'kompetensi' ? 'active' : null ?>"><a href="<?= base_url("kompetensi") ?>"><i class="fa fa-circle-o"></i> Data Kompetensi Dasar</a></li>
            <li class="<?= $this->uri->segment(1) == 'predikat' ? 'active' : null ?>"><a href="<?= base_url("predikat") ?>"><i class="fa fa-circle-o"></i> Data Rentang Nilai</a></li>
        </ul>
    </li>
    <li class="treeview <?= $this->uri->segment(1) == 'absen_siswa' || $this->uri->segment(1) == 'absen_guru' || $this->uri->segment(1) == 'rekap_absen' ? 'active menu-open' : null ?>">
        <a href="<?= base_url('assets/') ?>#">
            <i class="fa fa-th-large"></i>
            <span>Data Absensi</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="<?= $this->uri->segment(1) == 'absen_guru' ?'active':null?>"><a href="<?= base_url('absen_guru') ?>"><i class="fa fa-circle-o"></i> Absensi Guru</a></li>
            <li class="<?= $this->uri->segment(1) == 'absen_siswa'?'active':null ?>"><a href="<?= base_url('absen_siswa') ?>"><i class="fa fa-circle-o"></i> Absensi Siswa</a></li>
            <li class="<?= $this->uri->segment(1) == 'rekap_absen'?'active':null ?>"><a href="<?= base_url('rekap_absen') ?>"><i class="fa fa-circle-o"></i> Rekap Absensi Siswa</a></li>
        </ul>
    </li>
    <li class="<?= $this->uri->segment(1) == 'jurnal' ? 'active' : null ?>">
        <a href="<?= base_url("jurnal") ?>">
            <i class="fa fa-tags"></i>
            <span>Jurnal KBM</span>
        </a>
    </li>
    <li class="treeview <?= $this->uri->segment(1) == 'nilai_uts' || $this->uri->segment(1) == 'capaian_belajar' || $this->uri->segment(1) == 'extrakulikuler' || $this->uri->segment(1) == 'prestasi' || $this->uri->segment(1) == 'nilai_raport'||$this->uri->segment(1) == 'cetak_raport'||$this->uri->segment(1) == 'catatan'||$this->uri->segment(1) == 'pkl' ? 'active menu-open' : null ?>">
        <a href="<?= base_url('assets/') ?>#">
            <i class="fa fa-calendar"></i>
            <span>Laporan Nilai</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="<?= $this->uri->segment(1) == 'nilai_uts' ? 'active' : null ?>"><a href="<?= base_url('nilai_uts') ?>"><i class="fa fa-circle-o"></i> Data Nilai UTS</a></li>
            <li class="<?= $this->uri->segment(1) == 'cuts' ? 'active' : null ?>"><a href="<?= base_url('') ?>"><i class="fa fa-circle-o"></i> Cetak Raport UTS</a></li>
            <li class="<?= $this->uri->segment(1) == 'capaian_belajar' ? 'active' : null ?>"><a href="<?= base_url('capaian_belajar') ?>"><i class="fa fa-circle-o"></i> Data Capaian Belajar</a></li>
            <li class="<?= $this->uri->segment(1) == 'extrakulikuler' ? 'active' : null ?>"><a href="<?= base_url('extrakulikuler') ?>"><i class="fa fa-circle-o"></i> Data Extrakulikuler</a></li>
            <li class="<?= $this->uri->segment(1) == 'prestasi' ? 'active' : null ?>"><a href="<?= base_url('prestasi') ?>"><i class="fa fa-circle-o"></i> Data Prestasi</a></li>
            <li class="<?= $this->uri->segment(1) == 'catatan' ? 'active' : null ?>"><a href="<?= base_url('catatan') ?>"><i class="fa fa-circle-o"></i> Data Catatan Akademik</a></li>
            <li class="<?= $this->uri->segment(1) == 'pkl' ? 'active' : null ?>"><a href="<?= base_url('pkl') ?>"><i class="fa fa-circle-o"></i> Data PKL</a></li>
            <li class="<?= $this->uri->segment(1) == 'nilai_raport' ? 'active' : null ?>"><a href="<?= base_url('nilai_raport') ?>"><i class="fa fa-circle-o"></i> Data Nilai Raport</a></li>
            <li class="<?= $this->uri->segment(1) == 'cetak_raport' ? 'active' : null ?>"><a href="<?= base_url('cetak_raport') ?>"><i class="fa fa-circle-o"></i> Cetak Raport</a></li>
        </ul>
    </li>
</ul>