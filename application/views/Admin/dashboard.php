
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?php echo $this->session->userdata['username'];?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3><?php //echo date("Y");?>  <?php echo $currentRespo ?></h3>

                <p>Current Responses </p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo base_url('Dashboard/currentList') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-orange">
              <div class="inner">
                <h3><?php echo date("Y"); ?>-<?php echo idate('y')+1;?></h3>

                <p>Graphical Summary</p>
              </div>
              <div class="icon"> 
                <i class="fa fa-pie-chart"></i>
              </div>
              <a href="<?php echo base_url('Dashboard/summary') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-blue">
              <div class="inner">
                <h3><?php echo date("Y"); ?>-<?php echo idate('y')+1;?></h3>
 
                <p>Registration Control</p>
              </div>
              <div class="icon"> 
              <i class="fa fa-cog"></i>
              </div>
              <a href="<?php echo base_url('Dashboard/nssRegisUpdate')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3><?php echo date("Y"); ?>-<?php echo idate('y')+1;?></h3>

                <p>Review Application : <?php echo $reviewResponse_total?></p>
              </div>
              <div class="icon"> 
                <i class="fa fa-check"></i>
              </div>
              <a href="<?php echo base_url('Dashboard/showReview')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
           <!-- ./col -->

           <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner"> 
                <h3><?php echo $total_responses ?></h3>

                <p>All Volunteers Data</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-people"></i>
              </div>
              <a href="<?php echo base_url('Dashboard/list') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript">
    $(document).ready(function() {
      $("#dashboardMainMenu").addClass('active');
    });
  </script>