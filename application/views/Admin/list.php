<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
  

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

<script>
$(document).ready(function() {
    $('#mytable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
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
                 <!-- <input id="myInput" type="text" placeholder="Search.."> -->
                <table id="mytable" class="display" style="width:100%">
                  <thead>
                  <!-- <th>Timestamp</th> -->
                        <th>#</th>
                        <th width="60">Action</th>
                        <th>Reg. No.</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Father's Name</th>
                        <th>Year</th>
                        <th>Branch</th>
                        <th>Category</th>
                        <th>Blood group</th>
                        <th>Whatsapp No.</th>
                        <!-- <th>Alt Contact No.</th> -->
                        <th>Email Id</th>
                        <th>Session</th>
                        
                        
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
                        <td>
                        <button type="submit" class="btn btn-danger pull-center" style="padding:1px 1px; margin:1px 1px" onclick="archiveFunction()">
                          <?php
                          //for passing row id to controller
                          echo  anchor("Dashboard/deleteList/{$user['sno']}",'Delete','class="glyphicon glyphicon-trash btn-danger btn-xs"')?>
                        </button>  
                      </td>
                        <td><?php echo $user['reg_no']?></td>
                        <td><?php echo $user['name']?></td>
                        <td><?php echo $user['gender']?></td>
                        <td><?php echo $user['fathername']?></td>
                        <td><?php echo $user['class']?></td>
                        <td><?php echo $user['branch']?></td>
                        <td><?php echo $user['category']?></td>
                        <td><?php echo $user['bloodgrp']?></td>
                        <td><?php echo $user['whatsappno']?></td>
                        <!-- <td><?php echo $user['altno']?></td> -->
                        <td><?php echo $user['email']?></td>
                        <td><?php echo $user['session']?></td>
                       
                    
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

                  <!-- <p><?php //echo $this->pagination->create_links(); ?></p> -->


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

<script>
  function archiveFunction() {
  event.preventDefault(); // prevent form submit
  var form = event.target.form; // storing the form
          swal({
    title: "Are you sure?",
    text: "But you will still be able to retrieve this data.",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Yes, archive it!",
    cancelButtonText: "No, cancel please!",
    closeOnConfirm: false,
    closeOnCancel: false
  },
  function(isConfirm){
    if (isConfirm) {
      form.submit();          // submitting the form when user press yes
    } else {
      swal("Cancelled", "Your imaginary data is safe :)", "error");
    }
  });
  }

</script>
<!-- 
<script type="text/javascript">
		<?php
		//if($this->session->flashdata('success_msg') == 'deleted'){
			?>
			Swal.fire(
				'Data Successfully Deleted...'
				);
			<?php 
		//}
		?>
	</script>
 -->
