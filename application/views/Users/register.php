<?php
// print_r($this->session->flashdata('disabledMsg'));
// print_r($this->session->flashdata('boys_disabled'));
// print_r($this->session->flashdata('girls_disabled'));
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>NSS Volunteer Registration 2020-21</title>
	<link rel="icon" type="image/jpg" href="<?= base_url('assets/img/images/nsslogo.png'); ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="<?= base_url('assets/css/register.css');?>" rel="stylesheet">
	<script src="<?= base_url('assets/js/register.js');?>" type="text/javascript"></script>

	<!-- Signature links -->
	<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet"> 
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/jquery.signature.min.js')?>"></script>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/js/jquery.signature.css')?>">
	<style>

	.kbw-signature { width: 400px; height: 200px;}

	#sig canvas{

		width: 100% !important;

		height: auto;

	}

</style> -->

</head>
<body onload="load()">
	<div class="container-fluid ">
		<div align="center">
			<img style="height: 90px; margin: auto;"src="<?= base_url('assets/img/images/nsslogo.png');?>">
		</div>
		<h1>National Service Scheme</h1>
		<h2>IET-DAVV</h2>
		<h3>Volunteer Registration Form</h3>
		<div class="text-uppercase btn-danger" style="padding-left: 10px;"><?php echo $this->session->userdata('disabledMsg');?>
</div>
		<!-- <form class="card" method="post" action="submitform.php"> -->
        <?php echo form_open('Users/getDataForm',['class' => 'card']);?>    
			<div id="data">

				<div class="form-group row">

					<label for="example-text-input " class="col-md-3 col-form-label low required">Email</label>
					<div class="col-md-9">
                        <input class="form-control" type="text" value="" name="email" id="email"  autofocus required>
                    </div>
                   
				</div>
				<div class="form-group row">

					<label for="example-text-input" class="col-md-3 col-form-label low required">Password</label>
					<div class="col-md-9">
						<input class="form-control " type="password" value="" name="pass" id="txtNewPassword" required>
                    </div>
                   
				</div>
				<div id="myalert"></div>
				<div class="form-group row">

					<label for="example-text-input" class="col-md-3 col-form-label low required">Confirm Password</label>
					<div class="col-md-9">
						<input class="form-control" type="password" value="" name="pass" id="txtConfirmPassword" required>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-3"></div>
					<div class="col-md-9"><input type="checkbox" name="" onclick="showpass();">Show password</div>
				</div>
				
				<div class="registrationFormAlert" id="divCheckPasswordMatch">
				</div>

				<br>
				<div class="form-group row">
					<label for="example-text-input" class="col-md-3 col-form-label required">Full Name</label>
					<div class="col-md-9">
						<input class="form-control  text-uppercase " type="text" value="" name="name" id="name" required>
                    </div>
                 
				</div>
				<div class="form-group row">

					<label for="example-text-input" class="col-md-3 col-form-label required">Gender</label>
					<div class="col-md-3">

						<select class="form-control" id="" name="gender" required>
							<option value="" disabled selected>Select Gender</option>
							<option value="Male" <?php echo $this->session->userdata('boys_disabled');?>>Male</option>
							<option value="Female" <?php echo $this->session->userdata('girls_disabled');?>>Female</option>
						</select>
					</div>

					<label for="example-text-input" class="col-md-3 col-form-label required">Category</label>
					<div class="col-md-3">
						<select class="form-control" id="sel1" name="category" required>
							<option value="" disabled selected>Select Category</option>
							<option value="GEN">General</option>
							<option value="OBC">OBC</option>
							<option value="SC">SC</option>
							<option value="ST">ST</option>
							<option value="MIN">Minority</option>
						</select>
					</div>
				</div>

				<div class="form-group row">

					<label for="example-text-input" class="col-md-3 col-form-label required">Date of Birth</label>
					<div class="col-md-3">
						<input class="form-control" type="date" value="" name="dob" id="dob" max="<?php echo date('Y-m-d');?>" required>
					</div>
					<label for="example-text-input" class="col-md-3 col-form-label required">Blood Group</label>
					<div class="col-md-3">
						<select class="form-control" id="blood_grp" name="bloodgrp" required>
							<option value="" disabled selected > Select Blood Group</option>
							<option value="O +ve">O +ve</option>
							<option value="O -ve">O -ve</option>
							<option value="AB +ve">AB +ve</option>
							<option value="AB -ve">AB -ve</option>
							<option value="A +ve">A +ve</option>
							<option value="A -ve">A -ve</option>
							<option value="B +ve">B +ve</option>
							<option value="B -ve">B -ve</option>
						</select>
					</div>
				</div>
				<div class="form-group row">

					<label for="example-text-input" class="col-md-3 col-form-label required">Class</label>
					<div class="col-md-3">
						<select class="form-control" name="class" required>
							<option value="" disabled selected>Select Year</option>
							<option value="1st">B.E. 1st Year</option>
							<option value="2nd">B.E. 2nd Year</option>
							<option value="3rd">B.E. 3rd Year</option>
							<option value="4th">B.E. 4th Year</option>
						</select>
					</div>
					<label for="example-text-input" class="col-md-3 col-form-label required">Branch</label>
					<div class="col-md-3">
						<select class="form-control" name="branch" required>
							<option value="" disabled selected> Select Branch</option>
							<option value="CS-A">CS-A</option>
							<option value="CS-B">CS-B</option>
							<option value="IT-A">IT-A</option>
							<option value="IT-B">IT-B</option>
							<option value="E&TC-A">E&TC-A</option>
							<option value="E&TC-B">E&TC-B</option>
							<option value="E&I">E&I</option>
							<option value="MECH">MECH</option>
							<option value="Civil">Civil</option>					
						</select>
					</div>
				</div>
				<div class="form-group row">

					<label for="example-text-input" class="col-md-3 col-form-label required">WhatsApp No.</label>
					<div class="col-md-3">
						<input class="form-control" type="tel" name="whatsappno" pattern="[6-9][0-9]{9}" value="" placeholder="10 digit Mobile No." required>
					</div>

					<label for="example-text-input" class="col-md-3 col-form-label" >Alt. Contact No. (Optional)</label>
					<div class="col-md-3">
						<input class="form-control" type="tel" value="" name="altno" placeholder="10 digit Mobile No.">
					</div>
				</div>
				<div class="form-group row">

					<label for="example-text-input" class="col-md-3 col-form-label required">Father's Name</label>
					<div class="col-md-9">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroupPrepend">Mr.</span>
							</div>
							<input class="form-control text-uppercase" type="text" name="fathername" required>
						</div>
                    </div>
                    
				</div>

				<div class="form-group row">

					<label for="example-text-input" class="col-md-3 col-form-label required">Father's Occupation</label>
					<div class="col-md-9">
						<input class="form-control" type="text" value="" name="fatheroccupation"id="name" required>
					</div>
				</div>

				<div class="form-group row">

					<label for="example-text-input" class="col-md-3 col-form-label required">Mother's Name</label>
					<div class="col-md-9">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroupPrepend">Mrs.</span>
							</div>
							<input class="form-control text-uppercase" type="text" value="" name="mothername" id="name" required>
						</div>
                    </div>
                    
				</div>
				<div class="form-group row">

					<label for="example-text-input" class="col-md-3 col-form-label required">Family Income</label>
					<div class="col-md-9">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroupPrepend">Rs.</span>
							</div>
							<input class="form-control" type="number" value="" name="familyincome" id="name" placeholder="Enter Annual Family Income in Rupees" min="0" required>
						</div>
					</div>
				</div>

				<div class="form-group row">

					<label for="caddr" class="col-md-3 col-form-label required">Current Address</label>
					<div class="col-md-9">
						<textarea class="form-control" type="text" name="caddr"value="" id="caddr" required></textarea>
					</div>
				</div>
				<div class="form-group row">

					<label for="paddr" class="col-md-3 col-form-label required">Permanent Address</label>
					<div class="col-md-9">
						<textarea class="form-control" type="text" name="paddr"value="" id="padrr" required></textarea>
					</div>
				</div>
				<div class="form-group row">

					<label for="is_nssV" class="col-md-3 col-form-label required">Are you NSS / NCC Volunteer?</label>
					<div class="col-md-3">
						<select class="form-control" name="is_nssV" id="mySelect" onChange="check(this);" required>
							<option value="No" selected>No</option>
							<option value="Yes (NSS)" >Yes (NSS)</option>
							<option value="Yes (NCC)" >Yes (NCC)</option>
						</select>
					</div>
					<div class="col-md-3 col-form-label required" id="joining">NSS Joining Year</div>
					<div class="col-md-3">
						<select class="form-control" id="mySelect1" name="nssYear" required>
                            <option id="2020" value="2020" selected>2020</option>
                            <option id="2019" value="2019" >2019</option>
							<option id="2018" value="2018">2018</option>
							<option id="2017" value="2017">2017</option>
							<option id="2016" value="2016">2016</option>
							<option id="2015" value="2015">2015</option>
						</select>
					</div>
					
				</div>
			</div>



			<div class="row">

				<div id="interests" class="col-md-12">
					<h4 style="font-family: serif; text-align:left;">Activities you are intrested in :-</h4>
					<table class="table table-bordered table-hover table-responsive">
						<thead class="btn-primary">
							<!-- <th>S.No.</th> -->
							<th>Interests/ activities </th>
							<th>Activity info/ name</th>
							<th>Have taken part or not</th>
							<th>Want to lead / participate</th>

						</thead>
						<tbody>
							<tr>
								<!-- <td>1.</td> -->
								<td>Game and Sports (name)</td>
								<td>
									<input class="form-control" type="text" value="" name="t1" >
								</td>
								<td>
									<select class="form-control" name="t1a" required>
										<option value="" disabled selected>Select</option>
										<option value="Yes" >Yes</option>
										<option value="No" >No</option>
									</select>
								</td>
								<td>
									<select class="form-control" name="t1b" required>
										<option value="" disabled selected>Select</option>
										<option value="Yes" >Yes</option>
										<option value="No" >No</option>
									</select>
								</td>
							</tr>
							<tr>
								<!-- <td>2.</td> -->
								<td>Study tour</td>
								<td>
									<input class="form-control" type="text" value="" name="t2" >
								</td>
								<td>
									<select class="form-control" name="t2a" required>
										<option value="" disabled selected>Select</option>
										<option value="Yes" >Yes</option>
										<option value="No" >No</option>
									</select>
								</td>
								<td>
									<select class="form-control" name="t2b" required>
										<option value="" disabled selected>Select</option>
										<option value="Yes" >Yes</option>
										<option value="No" >No</option>
									</select>
								</td>
							</tr>
							<tr>
								<!-- <td>3.</td> -->
								<td>Art & Craft</td>
								<td>
									<input class="form-control" type="text" value="" name="t3" >
								</td>
								<td>
									<select class="form-control" name="t3a" required>
										<option value="" disabled selected>Select</option>
										<option value="Yes" >Yes</option>
										<option value="No" >No</option>
									</select>
								</td>
								<td>
									<select class="form-control" name="t3b" required>
										<option value="" disabled selected>Select</option>
										<option value="Yes" >Yes</option>
										<option value="No" >No</option>
									</select>
								</td>
							</tr>
							<tr>
								<!-- <td>4.</td> -->
								<td>Music / singing</td>
								<td>
									<input class="form-control" type="text" value="" name="t4" >
								</td>
								<td>
									<select class="form-control" name="t4a" required>
										<option value="" disabled selected>Select</option>
										<option value="Yes" >Yes</option>
										<option value="No" >No</option>
									</select>
								</td>
								<td>
									<select class="form-control" name="t4b" required>
										<option value="" disabled selected>Select</option>
										<option value="Yes" >Yes</option>
										<option value="No" >No</option>
									</select>
								</td>
							</tr>
							<tr>
								<!-- <td>5.</td> -->
								<td>Dance / Drama</td>
								<td>
									<input class="form-control" type="text" value="" name="t5" >
								</td>
								<td>
									<select class="form-control" name="t5a" required>
										<option value="" disabled selected>Select</option>
										<option value="Yes" >Yes</option>
										<option value="No" >No</option>
									</select>
								</td>
								<td>
									<select class="form-control" name="t5b" required>
										<option value="" disabled selected>Select</option>
										<option value="Yes" >Yes</option>
										<option value="No" >No</option>
									</select>
								</td>
							</tr>

							<tr>
								<!-- <td>6.</td> -->
								<td>Writing / Debating / Story Description</td>
								<td>
									<input class="form-control" type="text" value="" name="t6" >
								</td>
								<td>
									<select class="form-control" name="t6a" required>
										<option value="" disabled selected>Select</option>
										<option value="Yes" >Yes</option>
										<option value="No" >No</option>
									</select>
								</td>
								<td>
									<select class="form-control" name="t6b" required>
										<option value="" disabled selected>Select</option>
										<option value="Yes" >Yes</option>
										<option value="No" >No</option>
									</select>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>



			<div class="form-group row">
				<!--  -->
				<label for="example-text-input" class="col-md-2 col-form-label ">Your Hobbies</label>
				<div class="col-md-10">
					<textarea class="form-control" type="text" name="hobbies"value="" id="hobbies" ></textarea>
				</div>
			</div>

			<div class="form-group row">
				<!--  -->
				<label for="example-text-input" class="col-md-5 col-form-label">Check the activities you are intersted in </label>
				<div class="col-md-7 col-form-label">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="interest[]" id="customCheck1" value="content_writing">
						<label class="custom-control-label" for="customCheck1">Content Writing</label>
					</div>

					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="interest[]" id="customCheck2" value="photography">
						<label class="custom-control-label" for="customCheck2">Photography / Video Editing</label>
					</div>

					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="interest[]" id="customCheck3" value="painting">
						<label class="custom-control-label" for="customCheck3">Painting / Poster Making</label>
					</div>
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="interest[]" id="customCheck4" value="web">
						<label class="custom-control-label" for="customCheck4"> Web Development & Data Handling</label>
					</div>
				</div>
			</div>


			<div class="row">
				<div class="col-md-12">
					<div class="custom-control custom-checkbox">

						<input type="checkbox" class="custom-control-input" id="declare" name="" required>
						<label class="custom-control-label" for="declare">
							<b>I hereby declare that all the above information given by me is true and I promise that I will follow rules made by University/ College NSS time to time.</b>
						</label>
					</div>
				</div>
			</div>
			<!-- Signature Upload-->

			<!-- <div class="col-md-12">

				<label class="" for=""><i>Signature Below:</i></label>

				<br/>

				<div id="sig" ></div>

				<br/>

				<button id="clear">Clear Signature</button>

				<textarea id="signature64" name="signed" style="display: none"></textarea>

			</div> -->

			<!-- Submit Button -->
			<div align="center" style="margin-top: 50px;">
				<!-- <button id="back" class="btn btn-primary">Go Back</button> -->
				<button name="submit" class="btn btn-success" id="submit_button">Submit</button>
			</div>
			<br>


        <?php echo form_close();?>
	</div>
	<!-- Signature Script -->
	<script type="text/javascript">

    var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});

    $('#clear').click(function(e) {

        e.preventDefault();

        sig.signature('clear');

        $("#signature64").val('');

    });

</script>
</body>
</html>