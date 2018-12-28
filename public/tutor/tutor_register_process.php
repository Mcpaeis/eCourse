<?php 
	$database -> connect_to_db() or die("Database connection failed.");
?>

<?php
	$database -> connection;
	if (isset($_POST['postRegister'])) {
		$txtFname = $_POST['txtFname'];
		$txtLname = $_POST['txtLname'];
		$txtEmail = $_POST['txtEmail'];
		$txtPass = $_POST['txtPass'];
		//call the validate method for processing and addition
		$lecturer -> validate_moderator($txtFname, $txtLname, $txtPass, $txtEmail);
	}
 ?>