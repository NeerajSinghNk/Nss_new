<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage
        <small>Overall Responses</small>
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
                 <input id="myInput" type="text" placeholder="Search..">
                <table id="mytable" class="table table-bordred table-striped">
                  <thead>
                  <!-- <th>Timestamp</th> -->
                        <th>#</th>
                        <th>Reg. No.</th>
                        <th>Name</th>
                        <th>Father's Name</th>
                        <th>Year</th>
                        <th>Branch</th>
                        <th>Category</th>
                        <th>Blood group</th>
                        <th>Whatsapp No.</th>
                        <!-- <th>Alt Contact No.</th> -->
                        <th>Email Id</th>
                        <th>Gender</th>
                        <th width="60">Action</th>
                        <!-- <th width="100">Delete</th> -->
                  </thead>
                  <tbody id="myTable">
                  <?php
                  $cnt=1;
                  if(!empty($users)){
                  foreach($users as $user)
                  {
                  ?>
                      <tr>
                      <!-- <td><?php echo $user['timestamp']?></td> -->
                        <td><?php echo htmlentities($cnt);?></td>
                        <td><?php echo $user['reg_no']?></td>
                        <td><?php echo $user['name']?></td>
                        <td><?php echo $user['fathername']?></td>
                        <td><?php echo $user['class']?></td>
                        <td><?php echo $user['branch']?></td>
                        <td><?php echo $user['category']?></td>
                        <td><?php echo $user['bloodgrp']?></td>
                        <td><?php echo $user['whatsappno']?></td>
                        <!-- <td><?php echo $user['altno']?></td> -->
                        <td><?php echo $user['email']?></td>
                        <td><?php echo $user['gender']?></td>
                      <td>
                  <?php
                  //for passing row id to controller
                  echo  anchor("Dashboard/delete/{$user['sno']}",' ','class="glyphicon glyphicon-trash btn-danger btn-xs"')?>
                  </td>
                  <!-- <td> -->
                  <?php
                  //for passing row id to controller
                  //echo anchor("Dashboard/update/{$user['sno']}",' ','class="glyphicon glyphicon-trash btn-danger btn-xs"')?>
                  <!-- </td> -->
                  <!-- </tr> -->
                  <?php
                  // for serial number increment
                  $cnt++;
                  }} ?>
                  </tbody>
                  </table>                

                  <p><?php echo $this->pagination->create_links(); ?></p>


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

<script type="text/javascript">
  $(document).ready(function() {
    $("#groups").select2();

    $("#userMainNav").addClass('active');
    $("#createUserSubNav").addClass('active');
    
  });
</script>

