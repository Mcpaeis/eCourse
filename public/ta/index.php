<?php include("../../includes/includes.php"); ?>
<html>
	<head>
		<link rel='shortcut icon' type='image/x-icon' href="favicon.png" /> 		
		<link rel="stylesheet" type="text/css" href="../../includes/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<meta charset="utf-8" lang="en">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<div id ="container" class="row">
			<div id="message" class="">
				<span><i>Welcome To eCourse!</i></span>
			</div>
			<nav class="col-md-5" id="description">
				<p>eCourse is a <i>FREE</i> online Course Management System.</p><br />
				<p>Use eCourse To manage Your course seamlessly and effortlessly!<br /><br />
					With eCourse, Your class room is an online community.<br /><br />
					Interact with your students on the go...<br /><br />
					Course assessment will no longer be the same with our online assignment and Testing system.<br /><br />
					Our secure system ensures your course assessment is never compromised.
				</p>
				<p>
					Get Started On eCourse Now<span class="glyphicon glyphicon-hand-right" style="font-size: 5em;"></span>
				</p>
			</nav>
			<section class="col-md-6 col-md-offset-1">
				<div id="login">
					<span style="font: 2em Tahoma">Are You A Teaching Assistant?</span><br /><br />
					<span style="font: 2em Tahoma; margin-left: -230px;">Login</span>
					<form>
						<div class="login_input">
							<h2 style="margin-left: -230px;">Email</h2>
							<span>
								<input type="text" name="pEmail" placeholder="Please Type Your Email">
							</span>
						</div>
						<br />
						<div class="login_input">
							<h2 style="margin-left: -165px;">Password</h2>
							<span>
								<input type="password" name="pPass" placeholder="Type Your Password">
							</span>
						</div>
						<br /><br />
						<input type="submit" value="Login"><br /><br />
					</form>
				</div>
			</section>


			<footer>
				<script type="text/javascript" src="../../includes/js/jquery-2.2.4.min.js"></script>
				<script type="text/javascript" src="../../includes/js/bootstrap.min.js"></script>
				<script type="text/javascript" src="js/index.js"></script>
			</footer>
		</div>
	</body>
</html>