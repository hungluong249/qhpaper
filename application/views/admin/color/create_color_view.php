<!-- STYLE -->
<style type="text/css">
    .error{
        color: red;
    }
</style>
<link rel="stylesheet" href="<?php echo site_url('assets/') ?>sass/admin/forms.css">
<link rel="stylesheet" href="<?php echo base_url('assets/lib/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') ?>">
<!-- <link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css"> -->

<!-- SCRIPT -->
<script src="<?php echo site_url('assets/') ?>js/admin/script.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Bảng Màu
            <small>Thêm mới mã màu</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i> Bảng Màu</a></li>
            <li class="active">Thêm mới</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Thêm mới mã màu</h3>
                    </div>
                    <!-- /.box-header -->
                    <?php
                    echo form_open_multipart('', array('class' => 'form-horizontal'));
                    ?>
                    <div class="box-body">
                        <div class="form-group col-md-12">
                            <?php
                            echo form_label('Tên Mã Màu', 'title');
                            echo form_error('title', '<div class="error">', '</div>');
                            echo form_input('title', set_value('title'), 'class="form-control" id="title"');
                            ?>
                        </div>
                        <div class="form-group col-md-12">
                            <?php
                            echo form_label('Mã Màu', 'hexcolor');
                            echo form_error('hexcolor', '<div class="error">', '</div>');
                            echo form_input('hexcolor', set_value('hexcolor'), 'class="form-control my-colorpicker1 colorpicker-element" id=""');
                            ?>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Thêm Mới</button>
                    </div>
                    <?php form_close() ?>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- END ACCORDION & CAROUSEL-->
    </section>
</div>

<!-- TINYMCE JS-->
<script type="text/javascript" src="<?php echo site_url('tinymce/tinymce.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/lib/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') ?>"></script>
<!-- <script src="assets/js/admin/bootstrap-timepicker.min.js"></script> -->
<script>
    tinymce.init({
        selector: ".box_content",
        theme: "modern",
        height: 200,
        relative_urls: false,
        remove_script_host: false,
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "save table contextmenu directionality emoticons template paste textcolor responsivefilemanager"
        ],
        content_css: "css/content.css",
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | responsivefilemanager | print preview media fullpage | forecolor backcolor emoticons",
        style_formats: [
            {title: "Bold text", inline: "b"},
            {title: "Red text", inline: "span", styles: {color: "#ff0000"}},
            {title: "Red header", block: "h1", styles: {color: "#ff0000"}},
            {title: "Example 1", inline: "span", classes: "example1"},
            {title: "Example 2", inline: "span", classes: "example2"},
            {title: "Table styles"},
            {title: "Table row 1", selector: "tr", classes: "tablerow1"}
        ],
        external_filemanager_path: "<?php echo site_url('filemanager/'); ?>",
        filemanager_title: "Responsive Filemanager",
        external_plugins: {"filemanager": "<?php echo site_url('filemanager/plugin.min.js'); ?>"}
    });

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

</script>

