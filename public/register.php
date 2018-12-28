<?php require_once("../includes/includes.php"); ?>
<?php require_once("tutor/tutor_register_process.php"); ?>
<html>
	<head>
		<link rel='shortcut icon' type='image/x-icon' href="favicon.png" /> 		
		<link rel="stylesheet" type="text/css" href="../includes/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/register.css">
		<meta charset="utf-8" lang="en">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<div id ="container" class="row">
				
				<?php
					if (isset($lecturer -> register_success) && !empty($lecturer -> register_success)) {
						echo "<div id=\"success_message\">";
								echo $lecturer -> register_success;
								echo " <a href=\"index.php\">Login</a> ";
						echo "</div>";
					}
				 ?>
			<div id="message" class="">
				<span><i>Welcome To eCourse!</i></span>
			</div>
			<section>
				<div id="login">
					<span style="font: 2em Tahoma">Are You A Course Administrator?</span><br /><br />
					<span style="font: 2em Tahoma;">Please Register</span>
					<form method = "post" action="register.php">
						<div class="login">

							<div class="login_input col-lg-6">
								<h2 style="margin-left: -160px;">First Name</h2>
								<span>
									<input type="text" name="txtFname" placeholder="First Name" value="<?php if(isset($lecturer -> Fname)){echo $lecturer -> Fname;} ?>">
								</span>
								<?php 
									if (!empty($lecturer -> min_max)) {
										echo "<span style=\"color: red;\">*<span>" . $lecturer -> min_max;
									}
								?>
							</div>
							<div class="login_input col-lg-6">
								<h2 style="margin-left: -160px;">Last Name</h2>
								<span>
									<input type="text" name="txtLname" placeholder="Last Name" value="<?php if(isset($lecturer -> Lname)){echo $lecturer -> Lname;} ?>">
								</span>
								<?php 
									if (!empty($lecturer -> min_max)) {
										echo "<span style=\"color: red;\">*<span>" . $lecturer -> min_max;
									}
								?>
							</div>
						</div>
						<div class="login">
							<div class="login_input col-lg-6">
								<h2 style="margin-left: -230px;">Email</h2>
								<span>
									<input type="text" name="txtEmail" placeholder="Email" value="<?php if(isset($lecturer -> Email)){echo $lecturer -> Email;} ?>">
								</span><br />
								<?php 
									if (!empty($lecturer-> mail)) {
										echo "<span style=\"color: red;\">*<span>" . $lecturer -> mail;
									}
								?>
							</div>
							<div class="login_input col-lg-6">
								<h2 style="margin-left: -165px;">Password</h2>
								<span>
									<input type="password" name="txtPass" placeholder="Password">
								</span>
								<?php 
									if (!empty($lecturer -> pass)) {
										echo "<span style=\"color: red;\">*<span>" . $lecturer -> pass;
									}
								?>
								<br /><br /><br /><br />
							</div>
						</div>
						<div class="login">
							<input type="submit" value="Register" name="postRegister">
						</div>
						<br /><br />
					</form>
				</div>
			</section>


			<footer class="row">
				<script type="text/javascript" src="../includes/js/jquery-2.2.4.min.js"></script>
				<script type="text/javascript" src="../includes/js/bootstrap.min.js"></script>
				<script type="text/javascript" src="js/index.js"></script>
			</footer>
		</div>
	</body>
</html>