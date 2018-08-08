<?php if ($this->session->flashdata('message_error')): ?>
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-warning"></i> Alert!</h4>
        <?php echo $this->session->flashdata('message_error'); ?>
    </div>
<?php endif ?>
<?php if ($this->session->flashdata('message_success')): ?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Alert!</h4>
        <?php echo $this->session->flashdata('message_success'); ?>
    </div>
<?php endif ?>