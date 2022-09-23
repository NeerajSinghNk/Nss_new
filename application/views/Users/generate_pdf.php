<!DOCTYPE html>
<html>
<head>
	
	<?php $sessionNss = $this->UsersData->getSessionYear();?>
	<title>NSS Registration <?php echo  $sessionNss[0]['sessionYear'];?><?php echo $this->session->loginUser->name;?>_<?php echo $this->session->loginUser->timestamp;?></title>
	<link rel="icon" type="image/jpg" href="<?= base_url('assets/img/images/nsslogo.png'); ?>">
	<!-- <meta name="google" content="notranslate"> -->
	

	<link rel="icon" type="image/jpg" href="<?= base_url('assets/img/images/nsslogo.png'); ?>">
	<meta charset="utf-8">
<!-- 	<meta name="viewport" content="width=device-width, initial-scale=1"> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="<?= base_url('assets/css/generate_pdf.css');?>" rel="stylesheet">
	<script src="<?= base_url('assets/js/generate_pdf.js');?>" type="text/javascript"></script>
	
</head>
<!-- <body oncontextmenu="return false" onselectstart="return false" ondragstart="return false"> -->
	<body>

		<div class="container" style="border: 2px solid black; margin-top:20px; margin-bottom: 10px;" >
			<div class="alert alert-success alert-dismissible fade show" id="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Congratulations</strong> Your NSS Registration 2020-21 was successful. <b>Your Registration number is <?php echo $this->session->loginUser->reg_no ?>.</b><br>Save this form in PDF format and remember your registration number. 
			</div>
			<p align="center">
				<img style="height:85px;"src="<?= base_url('assets/img/images/nsslogo.png'); ?>"/><br>

				<span style="font-size:22px;">राष्ट्रीय सेवा योजना<br/>
					<b id="a">देवी अहिल्या विश्वविद्यालय, इंदौर</b></span>
				</p>
				<p align="center">
					<b>महाविद्यालय/विद्यालय का नाम :- <i>&nbsp;&nbsp;अभियांत्रिकी एवं प्रौद्योगिकी संस्थान (आई. ई. टी.) देवीअहिल्या विश्वविद्यालय, इंदौर, मध्यप्रदेश </i></b>
				</p>
				<p align="center" style="font-size: 20px; font-weight: 700;">
					राष्ट्रीय सेवा योजना में पंजीयन हेतु आवेदन-पत्र 
				</p>
				<ol>
					<li>
						<div class="row">
							<div class="col-md-3" >
								<b>छात्र/छात्रा  का नाम :- </b>
							</div>

							<span class="col-md-5 data">
								<?php echo $this->session->loginUser->name ?>
							</span>
						</div>
					</li>
					<li>
						<div class="row">
							<div class="col-md-3" >
								<b>पिता का नाम :- </b>
							</div>

							<div class="col-md-5 data">
								<?php echo $this->session->loginUser->fathername?>
							</div>
						</div>
					</li>

					<li>
						<div class="row">
							<div class="col-md-3">
								<b>पिता का व्यवसाय :- </b>
							</div>
							<div class="col-md-4 data">
								<?php echo $this->session->loginUser->fatheroccupation?>
							</div>

							<div class="col-md-2">
								<b>वार्षिक आय :- </b>	
							</div>
							<div class="col-md-2 data">
								<?php echo $this->session->loginUser->familyincome?> &nbsp;रु 
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<div class="col-md-1">
								<b>जाति:- </b>
							</div>
							<div class="col-md-2 data">
								<?php switch($this->session->loginUser->category){
									case 'GEN': 
									echo 'सामान्य';
									break;
									case 'OBC':
									echo 'अन्य पिछड़ा वर्ग';
									break;
									case 'SC':
									echo 'अनुसूचित जाति';
									break;
									case 'ST':
									echo 'अनुसूचित जनजाति ';
									break;
									case 'MIN':
									echo 'अल्संख्यक';
									break;
									default: 
									echo '';
								}
								?>  
							</div>
							<div class="col-md-1">
							</div>
							<div class="col-md-1">
								<b>लिंग :-</b>
							</div>
							<div class="col-md-2 data">
								<?php echo $this->session->loginUser->gender?>
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<div class="col-md-2">
								<b>जन्म तिथि :-</b> 
							</div>
							<div class="col-md-2 data">
								<?php
								$dob=date_create($this->session->loginUser->dob);
								echo date_format($dob,"d/m/Y");?>
							</div>
							<div class="col-md-1">
								<b>आयु :</b> 	
							</div>
							<div class="col-md-2 data">
								<?php 	
								$today = date("Y-m-d");
								$diff = date_diff(date_create($this->session->loginUser->dob), date_create($today));
								echo $diff->format('%y');
                                 ?>
								वर्ष 
							</div>
							<div class="col-md-2">
								<b>रक्त समूह :-</b> 
							</div>
							<div class="col-md-2 data">
								<?php echo $this->session->loginUser->bloodgrp?> 
							</div>

						</div>
					</li>
					<li>
						<div class="row">
							<div class="col-md-1">
								<b>कक्षा : </b>
							</div>
							<div class="col-md-2 data">
								B.E. <?php echo $this->session->loginUser->class?> Year 
							</div>
							<div class="col-md-2">
								<b>अनुभाग :-</b>
							</div>
							<div class="col-md-4 data"> 
								<?php 
								switch ($this->session->loginUser->branch) {
									case 'CS-A':
									echo "Computer Engg - 'A'";
									break;
									case 'CS-B':
									echo "Computer Engg - 'B'";
									break;
									case 'IT-A':
									echo "Information Technology Engg - 'A'";
									break;
									case 'IT-B':
									echo "Information Technology Engg - 'B'";
									break;
									case 'E&TC-A':
									echo "Elec. & Telecomm. Engg - 'A'";
									break;
									case 'E&TC-B':
									echo "Elec. & Telecomm. Engg - 'B'";
									break;
									case 'E&I':
									echo "Elec. & Inst. Engg";
									break;
									case 'MECH':
									echo "Mechanical Engg";
									break;
									case 'Civil':
									echo "Civil Engg";
									break;
									default:
									echo "";
									break;
								}?>	
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<div class="col-md-2">
								<b>वर्त्तमान पता :-</b> 
							</div>
							<div class="col-md-9 data">
								<?php echo $this->session->loginUser->caddr?>
							</div>	
						</div>
					</li>
					<li>
						<div class="row">
							<div class="col-md-2">
								<b>फ़ोन नं. :-</b>  
							</div>
							<div class="col-md-3 data">
								+91 <?php echo $this->session->loginUser->whatsappno?>
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<div class="col-md-2">
								<b>स्थायी पता :- </b>
							</div>
							<div class="col-md-9 data">
								<?php echo $this->session->loginUser->paddr?>
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<div class="col-md-6">
								<b>एन.एस.एस./ एन.सी.सी. में से किसी एक के सदस्य हैं:-</b>

								<?php switch ($this->session->loginUser->is_nssV) {
									case 'Yes (NSS)':
									echo 'हाँ (एन.एस.एस.)';
									break;
									case 'Yes (NCC)':
									echo 'हाँ (एन.सी.सी.)';
									break;
									case 'No':
									echo 'नहीं';
									break;
									default:
									echo '';
									break;
								};?>
							</div>
							<?php if($this->session->loginUser->is_nssV != 'No'){
								?><div class="col-md-6">
									<b>किस वर्ष से:- </b>
									<span class="data">
										<?php echo $this->session->loginUser->nssYear?>
									</span>
									से
								</div>
							<?php }?>
						</div>
					</li>
					<li>
						<b>गतिविधियां जिनमें रूचि हो :-</b>
						<table class="table table-bordered ">
							<thead>
								<tr>
									<td>क्रमांक</td>
									<td>रूचि की गतिविधियां </td>
									<td>गतिविधि की जानकारी </td>
									<td>भाग लिया है या नहीं </td>
									<td>नेतृत्व/भागीदारी की इच्छा </td>
								</thead>
								<tbody>
									<tr>
										<td>1.</td>
										<td>क्रीडा एवं खेलकुद (नाम दें)</td>
										<td><?php echo $this->session->loginUser->t1?></td>
										<td><?php echo $this->session->loginUser->t1a?></td>
										<td><?php echo $this->session->loginUser->t1b?></td>
									</tr>
									<tr>
										<td>2.</td>
										<td>अध्ययन-यात्रा</td>
										<td><?php echo $this->session->loginUser->t2?></td>
										<td><?php echo $this->session->loginUser->t2a?></td>
										<td><?php echo $this->session->loginUser->t2b?></td>
									</tr>
									<tr>
										<td>3.</td>
										<td>शिल्प कला</td>
										<td><?php echo $this->session->loginUser->t3?></td>
										<td><?php echo $this->session->loginUser->t3a?></td>
										<td><?php echo $this->session->loginUser->t3b?></td>
									</tr>
									<tr>
										<td>4.</td>
										<td>संगीत/गायन</td>
										<td><?php echo $this->session->loginUser->t4?></td>
										<td><?php echo $this->session->loginUser->t4a?></td>
										<td><?php echo $this->session->loginUser->t4b?></td>
									</tr>
									<tr>
										<td>5.</td>
										<td>नृत्य/नाटक</td>
										<td><?php echo $this->session->loginUser->t5?></td>
										<td><?php echo $this->session->loginUser->t5a?></td>
										<td><?php echo $this->session->loginUser->t5b?></td>
									</tr>
									<tr>
										<td>6.</td>
										<td>लेखन/वाद-विवाद/कथा वर्णन </td>
										<td><?php echo $this->session->loginUser->t6?></td>
										<td><?php echo $this->session->loginUser->t6a?></td>
										<td><?php echo $this->session->loginUser->t6b?></td>
									</tr>
									<tfoot>
										<tr>
											<td colspan="5">
												<p style="font-weight: 700">
													मै वचन <?php switch($this->session->loginUser->gender){
														case 'Male' :
														echo 'देता हूँ';
														break;
														case 'Female':
														echo 'देती हूँ ';
														break;
														default:
														echo '';
													}?> कि समय-समय पर विश्वविद्यालय/ महाविद्यालय/ विद्यालय रा.से.यो. द्वारा बनाये गये नियमों का पालन <?php switch($this->session->loginUser->gender){
														case 'Male' :
														echo 'करूँगा';
														break;
														case 'Female':
														echo 'करुँगी';
														break;
														default:
														echo '';
													}?> |
												</p>
												
												<br>
												<div class="row" style="margin-top: 50px;">
													<div class="col-md-6">
														<b>दिनांक :- </b><?php echo date("d/m/Y"); ?>
													</div>
													<div class="col-md-6">
														<div style="height: 50%;" align="right" >
															<!-- <img style="border: 1px solid black;" src="" height="60px;" width="250px"> -->

														</div>
														<div style="height: 50%;" align="right">

															आवेदक के हस्ताक्षर 
														</div>
													</div>
												</div>
												<!-- <span style="float:left">
													<b>दिनांक :- </b><?php echo date("d/m/Y"); ?>
												</span>  
												<span style="float:right">
													<img src="res/images/ietlogo.png" height="100px" width="100px" style="float:left;">
													<?php echo $this->session->loginUser->sign?>
													आवेदक के हस्ताक्षर 
												</span> --> 
											</td>
										</tr>
									</tfoot>
								</table>
								<hr>
								<center><b>(केवल कार्यालय उपयोग के लिए)</b></center>
								<ol>
									<li>पंजीयन का दिनांक :- <?php echo $this->session->loginUser->timestamp;?></li>
									<li>पंजीयन संख्या :- NSS/20/<?php echo $this->session->loginUser->reg_no?></li>
									<li>आमान्य का कारण :- </li>
								</ol>
								<br>
								<br>
								<div style="float:right; margin-right: 15px;">
									हस्ताक्षर कार्यक्रम अधिकारी एवं सील  
								</div> 
								<br>
								<hr>
								

							</div>
							<div align="center">
								<?php 
									if($this->session->loginUser->email)
									{
								?>
								<button id="mybtn" class="btn btn-success" onclick="hideme();window.print();">Print</button>
								<br>
								<!-- <a href="<?= base_url('Users/pdf_download'); ?>"><button id="mybtn2" class="btn btn-success" style="margin-top: 10px;">View in pdf</button></a> -->
								<br>
								<a href="<?= base_url('Users/logout'); ?>"><button id="mybtn2" class="btn btn-info" style="margin-top: 10px;">Logout</button></a>
									<?php }?>
							</div>
							<br>
							<br>
						</body>
						</html>