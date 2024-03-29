<!DOCTYPE html>
<html lang="en">
<head>
	<title>Progress Study - Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/images/logo.png"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/daterangepicker/daterangepicker.css">
</head>
<body>
	<br><br>
	<div class="container">
		<div class="row">
			<div class="col-6">
				<video width="420" height="240" controls autoplay="on" id="vid">
				  <source src="<?php echo $asset_url."videos/PSCregvideo.mp4"; ?>" type="video/mp4">
				</video>

				<form action="do_upload" method="POST" onsubmit="checkConfirmed(event)" enctype="multipart/form-data">
		            <h3 class="information mt-4">E-Client Registration Form</h3>
		            <div class="row">
		                <div class="col-sm-12">
		                    <div class="form-group">
		                        <!-- <label for="name">Name</label> --> <input class="form-control" type="text" name="firstname" placeholder="First Name"> </div>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-sm-12">
		                    <div class="form-group">
		                        <!-- <label for="name">Name</label> --> <input class="form-control" type="text" name="lastname" placeholder="Last Name" required> </div>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-sm-12">
		                    <div class="form-group">
		                        <!-- <label for="name">Name</label> --> <input class="form-control" type="text" name="middlename" placeholder="Middle Name"> </div>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-sm-12">
		                    <div class="form-group">
		                        <div class="input-group"> <input class="form-control" type="text" name="mobile" placeholder="Mobile" required> </div>
		                    </div>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-sm-12">
		                    <div class="form-group">
		                        <div class="input-group"> <input class="form-control" type="text" name="email" placeholder="Email Address" required> </div>
		                    </div>
		                </div>
		            </div>
		            <br>
		            <div class="row">
		                <div class="col-sm-12">
		                    <div class="form-group">

		                            <div class="mb-3">
		                              <label for="exampleFormControlInput1" class="form-label">Birth date</label>
		                              <input type="date" name="birthdate" class="form-control" id="exampleFormControlInput1" required>
		                            </div>
		                    </div>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-sm-12">
		                    <div class="form-group">
		                        <select class="form-control" name="country" required>
		                            <option>Select Country</option>
		                            <?php
		                                foreach ($nationality as $row1) {
		                                  echo "<option>".$row1->en_short_name."</option>";
		                                }
		                            ?>
		                        </select>
		                    </div>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-sm-12">
		                    <div class="form-group">
		                        <select class="form-control" name="nationality" required>
		                            <option>Select Nationality</option>
		                            <?php
		                                foreach ($nationality as $row1) {
		                                  echo "<option>".$row1->nationality."</option>";
		                                }
		                            ?>
		                        </select>
		                    </div>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-sm-12">
		                    <div class="form-group">
		                        <select class="form-control" name="city" required>
		                            <option>Select City</option>
		                            <option>Jakarta</option>
		                            <option>Manila</option>
		                            <option>Melbourne</option>
		                            <option>Sydney</option>
		                            <option>Surabaya</option>
		                            <option>Other</option>
		                        </select>
		                    </div>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-sm-12">
		                    <div class="form-group">
		                        <select class="form-control" name="qualifications" required>
		                            <option>Select Qualifications</option>
		                            <?php
		                                foreach ($qualifications as $row2) {
		                                  echo "<option>".$row2->value."</option>";
		                                }
		                            ?>
		                        </select>
		                    </div>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-sm-12">
		                    <div class="form-group">
		                        <select class="form-control" name="civilstatus" required>
		                            <option>Select Civil Status</option>
		                            <?php
		                                foreach ($civilstatus as $row3) {
		                                  echo "<option>".$row3->value."</option>";
		                                }
		                            ?>
		                        </select>
		                    </div>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-sm-12">
		                    <div class="form-group">
		                        <!-- <label for="name">Name</label> --> <input class="form-control" type="text" name="noofdependents" placeholder="Dependents"> </div>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-sm-12">
		                    <div class="form-group">
		                        <!-- <label for="name">Name</label> --> <input class="form-control" type="password" name="password"  placeholder="Password" required> </div>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-sm-12">
		                    <div class="form-group">
		                        <!-- <label for="name">Name</label> --> <input class="form-control" type="password" name="password2" placeholder="Re-type Password" required> </div>
		                </div>
		            </div>
		            <br>
		            <div class="row">
		                <div class="col-sm-12">
		                    <div class="form-group">
		                        <label for="resume" class="form-label">Resume</label>
		                        <input class="form-control" type="file" name="resume" required> 
		                    </div>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-sm-12">
		                    <div class="form-group">
		                        <!-- <label for="name">Name</label> --> <textarea class="form-control" name="notes" placeholder="Notes"></textarea>
		                    </div>
		                </div>
		            </div>
		            <div class=" d-flex flex-column text-center px-5 mt-3 mb-3"><small><input type="checkbox" id="confirm1" name="confirm1"> I have read, understood and content to the Privacy Policy (clickable)</small></div>
		<div class=" d-flex flex-column text-center px-5 mt-3 mb-3"><small><input type="checkbox" id="confirm2" name="confirm2"> I consent to receiving information and updates</small></div> 

		 <canvas id="captcha">captcha text</canvas>
		 <input id="textBox" type="text" class="form-control" name="captcha" placeholder="Enter CAPTCHA Here"> <button id="refreshButton" type="button" class="btn btn-primary btn-block confirm-button">Refresh</button>
		 <span id="output"></span>
		<br><br>
		<button class="btn btn-primary btn-block confirm-button" type="submit" id="submitButton">Submit</button>
		        </form>
				
			</div>
			
			<div class="col-6">
				<form class="login100-form validate-form" action="index.php/clientlogintypical" method="post">
					<center><img src='<?php echo base_url(); ?>assets/images/logomain.png' style="width: 200px;"></center><br>
					<span class="login100-form-title p-b-43">
						<h3>Login to continue</h3>
					</span><br>
					<?php 
					if (isset($_GET['error1'])) {
					?>
						<div class="alert alert-danger" role="alert">Incorrect email or password!</div>
					<?php
					} else if (isset($_GET['error2'])) {
					?>
					    <div class="alert alert-danger" role="alert">This user was already inactive!</div>
					<?php
					} else if (isset($_GET['error3'])) {
					?>
					    <div class="alert alert-danger" role="alert">Please login first to CRM!</div>
					<?php
					}
					?>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<span class="label-input100">Email</span> 
						<input class="form-control" type="text" name="email">
						<span class="focus-input100"></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span> 
						<input class="form-control" type="password" name="password">
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>
			

					<div class="container-login100-form-btn">
						<button class="btn btn-primary">
							Login
						</button>
					</div>
					
				</form>
			</div>
		</div><br>
	</div>
	
	<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendor/animsition/js/animsition.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendor/select2/select2.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendor/countdowntime/countdowntime.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/main.js"></script>

</body>
</html>