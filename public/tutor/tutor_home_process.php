<?php $database -> connection; ?>
<?php 
	$a = $session -> logged_lecturer();
	if(!isset($a)){
		redirect_to("index.php");
	}
?>
<?php 
	if (isset($_POST["postLogout"])) {
		$session -> logout_lecturer("index.php");

	}
?>