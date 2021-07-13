
<!DOCTYPE html>
<html>
<head>
	<title>National Sevice Scheme</title>
	<link rel="icon" type="image/jpg" href="<?= base_url('assets/img/images/nsslogo.png'); ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link href="<?= base_url('assets/css/login.css');?>" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
	
</head>
<body>
	
	<body class="text-center container">
		<!-- <form class="card form-signin" method="post" action="Users/loginForm"> -->
			<?php echo form_open('Users/loginForm',['class' => 'card form-signin']);?>
			<div align="center" >
				<img class="mb-4" src="<?= base_url('assets/img/images/nsslogo.png'); ?>" alt="" width="100" height="100" style="margin-top: -65px;">
			</div>
			<h1 class="h4 mb-3 font-weight-bold" style="font-family: serif;">National Service Scheme</h1>
			<h3 class="h4 mb-3 font-weight-normal" style="font-family: serif;">IET-DAVV</h3>
			<label for="inputEmail" class="sr-only">Email address</label>
			<input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="username" required autofocus>

			<label for="inputPassword" class="sr-only">Password</label>
			<br>
			<input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>

			<br>
			<button name="signin" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

			<div style="text-align: right">
				<a href="<?= base_url('Users/index');?>" >New Registration</a>
			</div>
			
				
			</form>
		</body>
	<!--// Once user Registers
		// User tries to login but registration number is not alloted
		// If  User tries to login but registration number is not alloted and application was rejected
	-->
	<script type="text/javascript">
		<?php
		if($this->session->flashdata('success_msg') == 'registered'){
			?>
			Swal.fire(
				'Thanks! Your Registration Application is recieved!',
				'Your application is under review you will be informed if you are selected',
				'success'
				);
			<?php 
		}
		?>

		<?php 
			if ($this->session->flashdata('not_approve') == 'notApproved') 
				{ ?>
					Swal.fire({
					icon: 'info',
					title: 'Application Status',
					text: 'Your Application under review you will be informed after the verfication process is completed',
					})
		<?php }?>

		<?php
			if($this->session->flashdata('error_msg') == 'error_msg'){
			?>
				Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Email Id or Password is invalid',
				footer: '<a href>Why do I have this issue?</a>'
				})		

		<?php } ?>

		<?php
			if($this->session->flashdata('error_msg') == 'matchFound'){
			?>
				Swal.fire({
				icon: 'info',
				title: 'Match Found',
				text: 'Your email is already registered...',
				footer: '<a href>Why do I have this issue?</a>'
				})		

		<?php } ?>

		
	</script>
	</html>