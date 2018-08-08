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
            Bảng Màu
            <small>Danh sách mã màu</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i> Bảng Màu</a></li>
            <li class="active">Danh sách</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Bảng Màu</h3>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <a href="<?php echo base_url('admin/color/create') ?>" class="btn btn-primary" role="button">Thêm Mới</a>
                        </div>
                        <div class="col-md-6">
                            <form action="<?php echo base_url('admin/color/index') ?>" method="get">
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
                                        <th>Tên Mã Màu</th>
                                        <th>Hiển Thị</th>
                                        <th>Mã Màu</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($result as $key => $value): ?>
                                        <tr class="remove_<?php echo $value['id'] ?>">
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $value['title'] ?></td>
                                            <td><div style="background-color: <?php echo $value['hexcolor'] ?>; width: 30px; height: 30px"></div></td>
                                            <td><span style="background-color: <?php echo $value['hexcolor'] ?>" class="label"><?php echo $value['hexcolor'] ?></span></td>
                                            <td>
                                                <a href="<?php echo base_url('admin/color/edit/' . $value['id']) ?>" id="dataActionEdit"><i class="fa fa-pencil" aria-hidden="true"></i> </a>
                                                <a href="javascript:void(0)" class="btn-remove" data-url="<?php echo base_url('admin/color/remove'); ?>" data-id="<?php echo $value['id'] ?>">
                                                    <i class="fa fa-remove" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tên Mã Màu</th>
                                        <th>Hiển Thị</th>
                                        <th>Mã Màu</th>
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
<script type="text/javascript">
    $('.btn-remove').click(function(){
        var url = $(this).data('url');
        var id = $(this).data('id');

        if(confirm('Chắc chắn xóa?')){
            $.ajax({
                method: "get",
                url: url,
                data: {
                    id : id
                },
                success: function(response){
                    if(response.status == 200){
                        $('.remove_' + id).fadeOut();
                    }

                },
                error: function(jqXHR, exception){
                    console.log(errorHandle(jqXHR, exception));
                }
            });
        }
    });
</script>
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
