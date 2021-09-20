<script>
$(document).ready(function() {
    $("title").html('NSS 2020-2021 Volunteers List');
    $('#mytable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } )
} );
</script>
<?php date_default_timezone_set('Asia/Calcutta');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        <small>Current Responses </small>
      </h1>
      <ol class="breadcrumb">
      <div class="card-footer small text-muted">Updated at <?php echo(date("Y-m-d H:i:s A",time()));?></div>
               
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?php echo $this->session->userdata['username'];?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">
          
        <div class="row">
            <div class="col-md-12">
                <?php 
                $success = $this->session->userdata('success');
                if($success != ''){ ?>
                    <div class="alert alert-success"><?php echo $success; ?></div>
                <?php 
                } 
                ?>

                <?php 
                $failure = $this->session->userdata('failure');
                if($failure != ''){ ?>
                    <div class="alert alert-danger"><?php echo $failure; ?></div>
                <?php 
                } 
                ?>
                 <!-- <input id="myInput" type="text" placeholder="Search.."> -->
                <table id="mytable" class="display" style="width:100%">
                  <thead>
                  <!-- <th>Timestamp</th> -->
                        <!-- <th><input type = "checkbox" id="check" name="check"></th> -->
                        
                        
                      <!--  <th>Reg. No.</th>
                        <th>Name</th>
                        <th>Father's Name</th>
                        <th>Year</th>
                        <th>Branch</th>
                        <th>Category</th>
                        <th>Date of Birth </th>
                        <th>Blood group</th>
                        <th>Whatsapp No.</th>
                        <th>Email Id</th>
                        <th>Password</th>
                        <th>Gender</th>
                        <th>Activities</th> -->
                        <th>#</th>
                        <th>Reg. No.</th>
                        <th>State</th>
                        <th>District</th>
                        <th>Name Of The Institution</th>
                        <th>Name Of Volunteers</th>
                        <th>Gender</th>
                        <th>DOB</th>
                        <th>E-Mail</th>
                        <th>Phone</th>
                       
                        
                  </thead>
                  <tbody id="myTable">
                  <?php
                  $cnt=1;
                  if(!empty($currentRes)){
                  foreach($currentRes as $user)
                  {
                  ?>
                      <tr>
                     
                        <td><?php echo htmlentities($cnt);?></td>
                        
                        <td><?php echo $user['reg_no']?></td>
                        <td><?php echo $user['state_name']?></td>
                        <td><?php echo $user['city_name']?></td>
                        <td>Institute of Engineering & Technology, DAVV</td>
                        <td><?php echo $user['name']?></td>
                        <td><?php echo $user['gender']?></td>
                        <td><?php echo $user['dob']?></td>
                        <td><?php echo $user['email']?></td>
                        <td><?php echo $user['whatsappno']?></td>
                        
                        
                     
                  <?php
                  
                  ?>
                  
                 
                  </tr>
                  <?php
                  // for serial number increment
                  $cnt++;
                  }} ?>
                  </tbody>
                  </table>                

                  


            </div>
        </div>
    </div>

          
           
                
              

            
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<!-- 
