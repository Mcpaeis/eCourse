<?php $database -> connection; ?>
<?php 
	if (isset($_POST['postLogin'])) {
		$txtEmail = $_POST['txtEmail'];
		$txtPass = $_POST['txtPass'];
		$lecturer -> login_lecturer($txtEmail, $txtPass);
		//get sesson values
		//$session -> logged_lecturer($lecturer -> lecturer_id);
	}
	if (!isset($_SESSION["id"])) {
			//redirect_to("index.php");
		}
?>
<?php 
	// $id = $session -> lecturer_id;
	// $_SESSION["logged_lecturer"] = $id;
	// echo $_SESSION["logged_lecturer"]
?>