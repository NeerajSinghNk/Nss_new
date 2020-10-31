<!-- <link rel="stylesheet" href="<?php echo base_url('assets/css/nssUpdateRegis.css') ?>"> -->
    <!-- <link href="<?= base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" media="screen"> -->
    
    
    <!-- daterange picker -->
  <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/daterangepicker/daterangepicker.css">
   <!-- iCheck for checkboxes and radio inputs -->
   <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control Panel</small>
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
              <?php 
                $success = $this->session->flashdata('success');
                if($success != ''){ ?>
                    <div class="alert alert-success"><?php echo $success; ?></div>
                <?php 
                } 
                ?>

                <?php 
                $failure = $this->session->flashdata('failure');
                if($failure != ''){ ?>
                    <div class="alert alert-danger"><?php echo $failure; ?></div>
                <?php 
                } 
                ?>
      <div class="container">
    <!-- <form action="Dashboard/nssRegisUpdate" class="form-horizontal"  role="form" method="post"> -->

    <?php
      $boys = $this->UsersData->getBoysReg();
      $girls = $this->UsersData->getGirlsReg();
      $resDate = $this->UsersData->fetchRegDate();
          $respo = '';
          foreach($resDate as $row)
          {
              $respo = $row['regisDate'];
          }
          print_r($respo);
        
      $regStatus = $this->UsersData->getStatus();
      $formStatus = implode("",$regStatus[0]);

      $TotalBoy = implode("",$boys[0]);
      $TotalGirl = implode("",$girls[0]);
  
    ?>
    <?php echo form_open('Dashboard/nssRegisUpdate');?>   
        <fieldset>
            <legend>Please Update Registration Data...</legend>
            <div class="form-group">

            <label for="dtp_input1" class="col-md-2 control-label">Boy's</label>
            <div class="input-group date form_data col-md-5">
              <span class="input-group-addon"><span class="fa fa-male"></span></span>
              <input class="form-control" size="16" type="number" name="boys" placeholder="Enter No. Of Boy's" value="<?php echo $TotalBoy?>">
            </div>

            <label for="dtp_input1" class="col-md-2 control-label">Girl's</label>
            <div class="input-group date form_data col-md-5">
              <span class="input-group-addon"><span class="fa fa-female"></span></span>
              <input class="form-control" size="16" type="number" name="girls" placeholder="Enter No. Of Girl's"  value="<?php echo $TotalGirl?>">
            </div>

            <div class="form-group">
            <label for="dtp_input1" class="col-md-2 control-label">Date Time Picking</label>

                  <div class="input-group  date form_data col-md-5">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-clock"></i></span>
                    </div>
                    
                    <input type="text" class="form-control float-right" name="dateTime" id="reservationtime" value="<?php echo $respo?>">
                  </div>
                  <!-- /.input group -->
            </div>

            <label for="dtp_input1" class="col-md-2 control-label">Status</label>
            <div class="input-group date form_data col-md-5">
            <!-- <div class="col-sm-6"> -->
                    <!-- radio -->
                    <div class="form-group clearfix">
                      <div class="icheck-success d-inline">
                     
                        <input type="radio" name="r3"  <?php if($formStatus == 'ON') {?> checked=""  <?php }?> id="radioSuccess1" value="ON">
                     
                        <label for="radioSuccess1">Active
                        </label>
                      </div>
                      <div class="icheck-danger d-inline">
                      
                        <input type="radio" name="r3" <?php if($formStatus == 'OFF') {?>   checked="" <?php }?> id="radioSuccess2" value="OFF">
                      
                        <label for="radioSuccess2">InActive
                        </label>
                      </div>
                     
                    </div>
                  <!-- </div> -->
                   </div>

				<!-- <input type="hidden" id="dtp_input1" value="" /><br/> -->
            </div>
			<div class="col-xs-2" >
                <button type="submit" class="btn btn-primary btn-block btn-flat">Update</button>
            </div>
        </fieldset>
    </form>
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
    



        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
  </script>


<script type="text/javascript" src="<?= base_url('assets/js/jquery-1.8.3.min.js')?>" charset="UTF-8"></script>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js')?>"></script>


<script src="https://adminlte.io/themes/v3/plugins/daterangepicker/daterangepicker.js"></script>

