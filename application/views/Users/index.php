<?php

	//$dataStatus = $this->session->userdata('dataStatus');
	//$last_date = $dataStatus['last_date'];
	$lastdate = strtotime($end_at);
	//print_r($dataStatus);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NSS Registration 2020-21</title>
	<link rel="icon" type="image/jpg" href="<?= base_url('assets/img/images/nsslogo.png'); ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <style type="text/css">
		.container{
			margin-top: 10px;
		}
		.content{
			font-family: arial;
			font-size: 18px;
		}
		.card{
			padding:20px; 
		}
		.footer{
			margin-top:20px;
			font-size:20px;
			text-align: center;
			background-color: grey;
			color:white;
		}
		.highlight{
			background-color: yellow;
		}
	</style>
</head>
<body>
   <?php 
	 $boys = $this->UsersData->getBoysReg();
	 $girls = $this->UsersData->getGirlsReg();
	
	 $TotalBoy = implode("",$boys[0]);
	 $TotalGirl = implode("",$girls[0]);

	 $BoysGirls = $TotalBoy + $TotalGirl;

   ?>
    <div class="container">
		<div align="center">
			<img src="<?= base_url('assets/img/images/nsslogo.png');?>" height="80" width="80">
			<div class="h3" style="font-family:serif;">
				National Service Scheme
			</div>
			<div class="h4" style="font-family:serif;">
				Institute Of Engineering & Technology, DAVV Indore, M.P
			</div>

		</div>

		<div class="card">
			
			<div align="right" class="h5">Total Registration  till now : <?php echo $this->UsersData->allRecord();?></div>
			<!-- <div class="btn-danger font-italic" > <b>NOTICE :</b> We have increased number of registration for Boys from <?php //echo $TotalBoy?> to <?php //echo $TotalGirl?> after that registration for Boys will be closed.</div> -->
			<span class="small" align="right">updated at <?php echo date("d/m/Y h:i:s A",time())?></span>
			<div class="h3 text-uppercase" align="center" style="font-family: sans-serif;">Instructions for NSS Registration</div>
			<div class="content">
				<ul>
					<li class="highlight">Last Date to fill NSS Registration Form is <b><?php echo date('d/m/Y h:i:s A',$lastdate);?></b>
					<li>ONLY the NSS VOLUNTEERS 2020-21 Selected Students will be considered for registration (<?php echo $TotalBoy?> Boys + <?php echo $TotalGirl?> Girls).
					<li>Use your <b>Email Id</b> to fill NSS Registration Form and <b>Remember your Password</b> as it will be used to access your Final Filled Form.</li>
					<li>After successful submission of your form, a FINAL FILLED FORM will be generated like one shown below.<b> Save the FINAL FILLED FORM</b> as PDF for future use or you can login <a href="<?= base_url('Users/login')?>" target="_blank">here</a> to view/download your FINAL FILLED FORM.</li>
					<li>Remember your <b>NSS Registration Number</b> given in Final Filled Form.</li>
					<!-- <li>Registered students will be added to "NSS VOLUNTEER <?php echo idate('Y')?>-<?php echo idate('y')+1?>" Whatsapp group once all registrations are completed.</li> -->
                    <li> Check the detailed instructions <a href="https://drive.google.com/file/d/1NtiEMoHYEdLo_x_W-dlcIQBEIQiQbt6S/view?usp=sharing" target="_blank">here</a>.</li>
					<img class="img-fluid" src="<?= base_url('assets/img/finalform.png');?>">
					
					</ul>

				<!-- <form action="Users/checkSet" method="post"> -->
				<?php echo form_open('Users/check_terms'); ?>
					<input type="checkbox" name="instructions" required=""><i>&nbsp;&nbsp;&nbsp;I have read all the given instructions carefully.</i><br>
					<div class="center" align="center">
						<button class="btn btn-primary" type="submit">Fill Registration Form</button><br>
					</div>
				<!-- </form> -->
				<?php echo form_close();?>
			</div>
		</div>
		<div align="center" style="margin-top: 20px;">
			<a href="<?= base_url('Users/login')?>"><button class="btn btn-primary"> LOG IN</button><br></a>
			If already Registered
		</div>
	</div>

	<?php $sirName = $this->UsersData->head(); $name = " "; $phone = " "; foreach($sirName as $row){ $name = $row['FullName']; $phone = $row['Phone']; } ?> 

	<div class="footer">
		In case of any problem/query please contact<br>Prof. <?php echo $name;?>  (<?php echo $phone;?>)
	</div>
</body>
</html>