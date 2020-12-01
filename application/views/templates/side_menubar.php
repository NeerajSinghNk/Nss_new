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

        
        <li id="manageUserSubNav"><a href="<?php echo base_url('Dashboard/list')?>" ><i class="ion ion-android-people"></i><span>Overall Responses</span></a></li>
        <li id="createUserSubNav"><a href="<?php echo base_url('Dashboard/currentList')?>" ><i class="ion ion-person-add"></i><span>Current Responses</span></a></li>
        <li id="createUserSubNav"><a href="<?php echo base_url('Dashboard/showReview')?>" ><i class="fa fa-check"></i><span>Under Review Application</span></a></li>
        <li id="createUserSubNav"><a href="<?php echo base_url('Dashboard/summary')?>" ><i class="fa fa-pie-chart"></i><span>Graphical Summary</span></a></li>
        
       
        <li id="createUserSubNav"><a href="<?php echo base_url('Dashboard/nssRegisUpdate')?>" ><i class="ion ion-android-calendar"></i><span>Create New Registration Date</span></a></li>
        
        
        <!-- <li id="manageUserSubNav"><a href="<?php echo base_url('Dashboard/update') ?>" ><i class="fa fa-circle-o"></i><span>Update Registration</span></a></li> -->
        <li><a href="<?php echo base_url('Admin/logout') ?>"><i class="glyphicon glyphicon-log-out"></i> <span>Logout</span></a></li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
