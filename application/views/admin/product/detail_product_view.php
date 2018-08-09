<!-- STYLE -->
<link rel="stylesheet" href="<?php echo site_url('assets/public/') ?>sass/admin/detail.css">

<!-- SCRIPT -->
<script src="<?php echo site_url('assets/public/lib/') ?>dataTable/js/jquery.dataTables.min.js"></script>
<script src="<?php echo site_url('assets/public/lib/') ?>dataTable/js/dataTables.bootstrap.min.js"></script>



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sản Phẩm
            <small>Chi Tiết</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i> Sản Phẩm</a></li>
            <li class="active">Chi Tiết</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-9">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Chi Tiết Sản Phẩm</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
						<div class="row">
							<div class="detail-image col-md-6">
								<label>Hình Ảnh</label>
								<div class="row">
									<div class="item col-md-12">
										<div class="mask-lg">
											<img src="<?php echo base_url('assets/upload/products/' . $detail['image']); ?>" alt="Image Detail" style="width: 100%">
										</div>
									</div>
								</div>
							</div>
							<div class="detail-info col-md-6">
								<div class="table-responsive">
									<label>Thông Tin</label>
									<table class="table table-striped">
										<tr>
											<th style="width: 120px">Tên Sản Phẩm</th>
											<td><?php echo $detail['title']; ?></td>
										</tr>
										<tr>
											<th>Màu Sắc</th>
											<td class="row">
												<?php foreach ($detail['color'] as $key => $value): ?>
													<div class="col-md-1" style="width: 30px; height: 30px; margin-left: 1em; background-color: <?php echo $value['hexcolor'] ?>"></div>
												<?php endforeach ?>
											</td>
										</tr>
										<tr>
											<th>Tính Chất</th>
											<td>
												<?php foreach ($detail['property'] as $key => $value): ?>
													<?php echo (count($detail['property']) > 1) ? $value['title'] . ' ,' : $value['title'] ?>
												<?php endforeach ?>
											</td>
										</tr>
										<tr>
											<th>Định Lượng</th>
											<td>
												<?php foreach ($detail['weight'] as $key => $value): ?>
													<?php echo (count($detail['weight']) > 1) ? $value['number'] . ' ,' : $value['number'] ?>
												<?php endforeach ?>
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
			<div class="col-md-3">
				<div class="box box-warning">
					<div class="box-header">
						<h3 class="box-title">Cập Nhật Sản Phẩm</h3>
					</div>
					<div class="box-body">
						<a href="<?php echo base_url('admin/product/edit/' . $detail['id']) ?>" class="btn btn-warning" role="button">Cập Nhật</a>
					</div>
				</div>
			</div>
        </div>
        <!-- /.row -->
        <!-- END ACCORDION & CAROUSEL-->
    </section>
</div>

<!-- DataTables -->
<script>
    $(function () {
        $('#table').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>