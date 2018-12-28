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
				<p>
					With eCourse, Your class room is an online community.<br /><br />
					Interact with your course administrators on the go...<br /><br />
				</p>
				<p>
					Get Started On eCourse Now<span class="glyphicon glyphicon-hand-right" style="font-size: 5em;"></span>
				</p>
			</nav>
			<section class="col-md-6 col-md-offset-1">
				<div id="login">
					<span style="font: 2em Tahoma">Please Login With The Credentials Specified By Your Course Administrator.</span><br /><br />
					<form>
						<div class="login_input">
							<h2 style="margin-left: -165px;">Username</h2>
							<span>
								<input type="text" name="pEmail" placeholder="Please Type Username">
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
				<script type="text/javascript" src="../includes/js/jquery-2.2.4.min.js"></script>
				<script type="text/javascript" src="../includes/js/bootstrap.min.js"></script>
				<script type="text/javascript" src="js/index.js"></script>
			</footer>
		</div>
	</body>
</html>