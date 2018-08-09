<!-- STYLE -->
<!--
<link rel="stylesheet" href="<?php echo site_url('assets/public/lib/') ?>dataTable/css/dataTables.bootstrap.min.css">
-->
<link rel="stylesheet" href="<?php echo site_url('assets/public/') ?>sass/admin/datatable.css">

<!-- SCRIPT -->
<!--
<script src="<?php echo site_url('assets/public/lib/') ?>dataTable/js/jquery.dataTables.min.js"></script>
<script src="<?php echo site_url('assets/public/lib/') ?>dataTable/js/dataTables.bootstrap.min.js"></script>
-->


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sản Phẩm
            <small>Danh sách sản phẩm</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i> Sản Phẩm</a></li>
            <li class="active">Danh sách</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <?php $this->load->view('admin/error_form_view.php'); ?>
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Sản Phẩm</h3>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <a href="<?php echo base_url('admin/product/create') ?>" class="btn btn-primary" role="button">Thêm Mới</a>
                        </div>
                        <div class="col-md-6">
                            <form action="<?php echo base_url('admin/product/index') ?>" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Tìm kiếm ..." name="search" value="<?php echo $keywords ?>">
                                    <span class="input-group-btn">
                                        <input type="submit" class="btn btn-block btn-primary" value="Tìm kiếm">
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="table" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Hình Ảnh</th>
                                        <th>Tên Sản Phẩm</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($result as $key => $value): ?>
                                        <tr class="remove_<?php echo $value['id'] ?>">
                                            <td><?php echo $i++ ?></td>
                                            <td><img src="<?php echo base_url('assets/upload/products/'. $value['image']) ?>" width="150"></td>
                                            <td><?php echo $value['title'] ?></td>
                                            <td>
                                                <a href="<?php echo base_url('admin/product/detail/' . $value['id']) ?>" id="dataActionEdit"><i class="fa fa-eye"></i> </a>
                                                &nbsp&nbsp&nbsp
                                                <a href="<?php echo base_url('admin/product/edit/' . $value['id']) ?>" id="dataActionEdit"><i class="fa fa-pencil" aria-hidden="true"></i> </a>
                                                &nbsp&nbsp&nbsp
                                                <a href="javascript:void(0)" class="btn-remove" data-url="<?php echo base_url('admin/product/remove'); ?>" data-id="<?php echo $value['id'] ?>">
                                                    <i class="fa fa-remove" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Hình Ảnh</th>
                                        <th>Tên Sản Phẩm</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- END ACCORDION & CAROUSEL-->
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url('assets/js/admin/remove.js'); ?>"></script>
<!-- DataTables -->
<!--<script>-->
<!--    $(function () {-->
<!--        $('#table').DataTable({-->
<!--            'paging'      : true,-->
<!--            'lengthChange': false,-->
<!--            'searching'   : false,-->
<!--            'ordering'    : true,-->
<!--            'info'        : true,-->
<!--            'autoWidth'   : false-->
<!--        })-->
<!--    })-->
<!--</script>-->
