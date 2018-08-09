<!-- STYLE -->
<style type="text/css">
    .error{
        color: red;
    }
</style>
<link rel="stylesheet" href="<?php echo site_url('assets/') ?>sass/admin/forms.css">
<link rel="stylesheet" href="<?php echo base_url('assets/css/select2.min.css'); ?>">
<!-- <link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css"> -->

<!-- SCRIPT -->
<script src="<?php echo site_url('assets/') ?>js/admin/script.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sản Phẩm
            <small>Cập Nhật sản phẩm</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i> Sản Phẩm</a></li>
            <li class="active">Cập Nhật</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Cập Nhật sản phẩm</h3>
                    </div>
                    <!-- /.box-header -->
                    <?php
                    echo form_open_multipart('', array('class' => 'form-horizontal'));
                    ?>
                    <div class="box-body">
                        <div class="form-group col-xs-12">
                            <?php
                            echo form_label('Hình Ảnh Đang Dùng');
                            ?>
                            <br>
                            <img src="<?php echo base_url('assets/upload/products/'. $detail['image']) ?>" width=150>
                            
                        </div>
                        <div class="form-group col-xs-12">
                            <?php
                            echo form_label('Hình Ảnh', 'image');
                            echo form_error('image', '<div class="error">', '</div>');
                            echo form_upload('image', set_value('image'), 'class="form-control"');
                            ?>
                            <br>
                        </div>
                        <div class="form-group col-md-12">
                            <?php
                            echo form_label('Tên Sản Phẩm', 'title');
                            echo form_error('title', '<div class="error">', '</div>');
                            echo form_input('title', $detail['title'], 'class="form-control" id="title"');
                            ?>
                        </div>
                        <div class="form-group col-md-12">
                            <?php
                            echo form_label('Mã Màu', 'color[]');
                            echo form_error('color[]', '<div class="error">', '</div>');
                            echo form_dropdown('color[]', $colors, json_decode($detail['color']), 'class="form-control select2" multiple="multiple" data-placeholder="Chọn màu"
                            style="width: 100%;"');
                            ?>
                        </div>
                        <div class="form-group col-md-12">
                            <?php
                            echo form_label('Tính Chất', 'property[]');
                            echo form_error('property[]', '<div class="error">', '</div>');
                            echo form_dropdown('property[]', $properties, json_decode($detail['property']), 'class="form-control select2" multiple="multiple" data-placeholder="Chọn tính chất"
                            style="width: 100%;"');
                            ?>
                        </div>
                        <div class="form-group col-md-12">
                            <?php
                            echo form_label('Định Lượng', 'weight[]');
                            echo form_error('weight[]', '<div class="error">', '</div>');
                            echo form_dropdown('weight[]', $weights, json_decode($detail['weight']), 'class="form-control select2" multiple="multiple" data-placeholder="Chọn định lượng"
                            style="width: 100%;"');
                            ?>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Cập Nhật</button>
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
<script src="<?php echo base_url('assets/js/select2.full.min.js') ?>"></script>
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

    $(function(){
        $('.select2').select2()
    });

</script>

