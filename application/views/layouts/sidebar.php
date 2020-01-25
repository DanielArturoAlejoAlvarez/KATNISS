<!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $this->session->userdata('avatar');?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('fullname');?></p>
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
        <li class="treeview">
          <a href="<?php echo base_url();?>dashboard">
            <i class="fa fa-home"></i> <span>Home</span>            
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cogs"></i>
            <span>Maintenance</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>maintenance/categories"><i class="fa fa-circle-o"></i> Categories</a></li>
            <li><a href="<?php echo base_url();?>maintenance/clients"><i class="fa fa-circle-o"></i> Clients</a></li>
            <li><a href="<?php echo base_url();?>maintenance/products"><i class="fa fa-circle-o"></i> Products</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share-alt"></i>
            <span>Movements</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>movements/sales"><i class="fa fa-circle-o"></i> Sales</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-print"></i>
            <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Categories</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Clients</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Products</a></li>
            <li><a href="<?php echo base_url();?>reports/sales"><i class="fa fa-circle-o"></i> Sales</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Administration</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Document Types</a></li>
            <li><a href="<?php echo base_url();?>administration/users"><i class="fa fa-circle-o"></i> Users</a></li>
            <li><a href="<?php echo base_url();?>administration/permissions"><i class="fa fa-circle-o"></i> Permissions</a></li>
          </ul>
        </li>
       </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->