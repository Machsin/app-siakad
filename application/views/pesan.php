<?php if ($this->session->has_userdata('success')) { ?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <!-- <h4><i class="icon fa fa-info"></i> Alert!</h4> -->
        <?= $this->session->flashdata('success') ?>
    </div>
<?php } ?>
<?php if ($this->session->has_userdata('error')) { ?>
    <div class="alert alert-error alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <!-- <h4><i class="icon fa fa-info"></i> Alert!</h4> -->
        <?= $this->session->flashdata('error') ?>
    </div>
<?php } ?>
