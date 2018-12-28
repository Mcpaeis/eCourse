<?php include("../includes.php"); ?>
<?php 
	if (isset($_POST["postSchedule"])) {
		$txtTitle = $_POST["txtTitle"];
		$txtDescription = $_POST["txtDescription"];
		$txtDay = $_POST["txtDay"];
		$txtDayMonth = $_POST["txtDayMonth"];
		$txtMonth = $_POST["txtMonth"];
		$txtTime = $_POST["txtTime"];
		$lecturer -> schedule_test($txtTitle, $txtDescription, $txtDay, $txtDayMonth, $txtMonth, $txtTime);
	}
	if (isset($_POST["postAssignment"])) {
		$txtTitle = $_POST["txtTitle"];
		$txtDescription = $_POST["txtDescription"];
		$txtDay = $_POST["txtDay"];
		$txtMonth = $_POST["txtMonth"];
		$txtTime = $_POST["txtTime"];
		$lecturer -> post_assignment($txtTitle, $txtDescription, $txtDay, $txtMonth, $txtTime);
	}
	if (isset($_POST["postAnnouncement"])) {
		$txtContent = $_POST["txtContent"];
		$lecturer -> post_announcement($txtContent);
	}
?>
