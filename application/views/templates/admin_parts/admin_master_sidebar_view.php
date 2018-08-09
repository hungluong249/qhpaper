<?php
//if($this->ion_auth->logged_in()) {
//?>
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo site_url('assets/lib/dist/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Alexander Pierce</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li class="<?php echo ($this->uri->segment(2) == '') ? 'active' : '' ?>">
                    <a href="<?php echo base_url('admin') ?>">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                
                <li class="<?php echo ($this->uri->segment(2) == 'color') ? 'active' : '' ?>">
                    <a href="<?php echo base_url('admin/color') ?>">
                        <i class="fa fa-paint-brush" aria-hidden="true"></i> <span>Bảng Màu</span>
                    </a>
                </li>
                <li class="<?php echo ($this->uri->segment(2) == 'property') ? 'active' : '' ?>">
                    <a href="<?php echo base_url('admin/property') ?>">
                        <i class="fa fa-flask" aria-hidden="true"></i> <span>Tính Chất</span>
                    </a>
                </li>
                <li class="<?php echo ($this->uri->segment(2) == 'weight') ? 'active' : '' ?>">
                    <a href="<?php echo base_url('admin/weight') ?>">
                        <i class="fa fa-balance-scale" aria-hidden="true"></i> <span>Định Lượng</span>
                    </a>
                </li>
                <li class="<?php echo ($this->uri->segment(2) == 'product') ? 'active' : '' ?>">
                    <a href="<?php echo base_url('admin/product') ?>">
                        <i class="fa fa-book" aria-hidden="true"></i> <span>Sản Phẩm</span>
                    </a>
                </li>
                <li class="header">DOCUMENTATION</li>
                <li>
                    <a href="<?php echo base_url('admin/documentation') ?>">
                        <i class="fa fa-book"></i> <span>Documentation</span>
                    </a>
                </li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
<?php //} ?>



