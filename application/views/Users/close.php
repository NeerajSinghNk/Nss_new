<!DOCTYPE html>
<html>
<head>
	<title>NSS Registration Closed</title>
	<link rel="icon" type="image/jpg" href="<?= base_url('assets/img/images/nsslogo.png'); ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<style type="text/css">
		body{
			margin:50px;
		}
	</style>
</head>
<body>
	<div class="container">

		<div align="center">
			<img class="img-fluid"src="<?= base_url('assets/img/register-closed.jpg');?>">
		</div>
		<div  align="center" style="font-weight: 600;font-family:sans-serif;">
			<h1>NSS Volunteer Registration <?php idate('Y')?> - <?php idate('y')+1?> has been Closed.
			</h1><br>
            <?php
                $cordi = $this->UsersData->cordiName();
                $pho = $this->UsersData->phone();
                $cordiName = implode("",$cordi[0]);
                $cordiPhone = implode("",$pho[0]);
                ?>
			<h3>In Case of any query please contact<br> Prof. <?php echo $cordiName;?>  <br> +91- <?php echo $cordiPhone;?>
		</div>
		<div align="center">
			<a href="<?= base_url('Users/login')?>"><button class="btn btn-primary">Login</button></a>
		</div>
	</div>
</body>
</html>