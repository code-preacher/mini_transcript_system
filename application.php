<?php
require_once 'library/lib.php';
require_once 'classes/crud.php';
?>

<?php
$lib=new Lib;
$crud=new Crud;

if (isset($_POST['submit'])) {
$crud->addApplication($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>BENUE STATE UNIVERSITY MAKURDI, CENTRALIZED TRANSCRIPT SYSTEM</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<!--===============================================================================================-->

	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
				<form action="application.php" class="login100-form validate-form" method="post" enctype="multipart/form-data">
<!-- 
					<span class="login100-form-title p-b-5">
						<p style="color: blue;opacity: .5;font-size: 20px;margin-top: -150px;"> <marquee behavior="alternate" scrollDelay="10">COURSEWARE FOR DISTANCE LEARNING</marquee></p>
						<br><br><br><br>
						
					</span> -->
					<h1 style="margin-top: -150px;">Application Form</h1>
					<p><?=$lib->msg();?></p>
					
					<div class="wrap-input100 validate-input" style="margin-top: -2px;" data-validate = "fullname is required">
						<input class="input100" type="text" name="name" placeholder="Your Fullname" required  />
						<span class="focus-input100">Fullname</span>
						<span class="label-input100"></span>
					</div>


					<div class="wrap-input100 validate-input" data-validate="Matriculation Number is required">
						<input class="input100" type="text" name="matno" placeholder="Your Matriculation Number" required />
						<span class="focus-input100">Matriculation Number</span>
						<span class="label-input100"></span>
					</div>



					<div class="wrap-input100 validate-input" data-validate = "Course of Study is required">
						<!-- 	<input class="input100" type="text" name="state" placeholder="Your State of Origin" required  /> -->
						<span>Course of Study</span>
						<select class="input100"  name="course" title="Please Course of Study" placeholder="Your Course of Study" required="required">
							<?php
							$rt=$crud->displayAllWithOrder('course','id','desc');
							foreach ($rt as $f) {
								?>
								<option value="<?php echo $f['name'];  ?>"><?php echo strtoupper($f['name']);  ?></option>
								
							<?php } ?>

						</select>
						<span class="label-input100"></span>
					</div>



					<div class="wrap-input100 validate-input" data-validate = "Year is required">
						<!-- 	<input class="input100" type="text" name="state" placeholder="Your State of Origin" required  /> -->
						<span>Year of Completion</span>
						<select class="input100"  name="year" title="Year of Completion" placeholder="Year of Completion" required="required">
							<?php
							for($f=1940;$f<=2021;$f++) {
								?>
								<option value="<?=$f ?>"><?=$f ?></option>
								
							<?php } ?>

						</select>
						<span class="label-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Name of School required">
						<input class="input100" type="text" name="school" placeholder="Name of School" required />
						<span class="focus-input100">Name of School</span>
						<span class="label-input100"></span>
					</div>

            
					<div class="wrap-input100 validate-input" data-validate="Cgpa 1 required">
						<input class="input100" type="text" name="c1" placeholder="100L First Semester CGPA" required />
						<span class="focus-input100">100L First Semester CGPA</span>
						<span class="label-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Cgpa 2 required">
						<input class="input100" type="text" name="c2" placeholder="100L Second Semester CGPA" required />
						<span class="focus-input100">100L Second Semester CGPA</span>
						<span class="label-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Cgpa 1 required">
						<input class="input100" type="text" name="c3" placeholder="200L First Semester CGPA" required />
						<span class="focus-input100">200L First Semester CGPA</span>
						<span class="label-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Cgpa 2 required">
						<input class="input100" type="text" name="c4" placeholder="200L Second Semester CGPA" required />
						<span class="focus-input100">200L Second Semester CGPA</span>
						<span class="label-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Cgpa 1 required">
						<input class="input100" type="text" name="c5" placeholder="300L First Semester CGPA" required />
						<span class="focus-input100">300L First Semester CGPA</span>
						<span class="label-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Cgpa 2 required">
						<input class="input100" type="text" name="c6" placeholder="300L Second Semester CGPA" required />
						<span class="focus-input100">300L Second Semester CGPA</span>
						<span class="label-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Cgpa 1 required">
						<input class="input100" type="text" name="c7" placeholder="400L First Semester CGPA" required />
						<span class="focus-input100">400L First Semester CGPA</span>
						<span class="label-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Cgpa 2 required">
						<input class="input100" type="text" name="c8" placeholder="400L Second Semester CGPA" required />
						<span class="focus-input100">400L Second Semester CGPA</span>
						<span class="label-input100"></span>
					</div>



					<div class="container-login100-form-btn">
						<button  type="submit" name="submit" class="login100-form-btn">
							Submit
						</button>
					</div>
					
					<div class="text-left p-t-46 p-b-20">
						<span class="txt2">
							

							<a href="index.html" style="text-decoration: none;">
								Go back to home?
								<i class="fa fa-home fa-2x"></i>
							</a>
							<a href="application-check.php" style="text-decoration: none;">
								Check Application Status
								<i class="fa fa-check-circle"></i>
							</a>
						</span>
					</div>


					
					
					


				</fieldset>
			</form>

		
	</div>
</div>





<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>


