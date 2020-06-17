<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li id="dashboardMainMenu">
          <a href="<?php echo base_url('Dashboard/index') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        
        <li id="manageUserSubNav"><a href="<?php echo base_url('Dashboard/list')?>" ><i class="fa fa-circle-o"></i><span>Overall Responses</span></a></li>
        <li id="createUserSubNav"><a href="<?php echo base_url('Dashboard/nssRegisUpdate')?>" ><i class="fa fa-circle-o"></i><span>Create New Registration Date</span></a></li>
        <!-- <li id="manageUserSubNav"><a href="<?php echo base_url('Dashboard/update') ?>" ><i class="fa fa-circle-o"></i><span>Update Registration</span></a></li> -->
        <li><a href="<?php echo base_url('Admin/logout') ?>"><i class="glyphicon glyphicon-log-out"></i> <span>Logout</span></a></li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
