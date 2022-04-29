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
        <?php $this->view('template/menu_admin')?>
    </section>
    <!-- /.sidebar -->
</aside>