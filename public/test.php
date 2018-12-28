<?php include("../includes/includes.php"); ?>
<?php 
	$database -> connect_to_db() or die("Database connection failed.")
?>
<?php 
	$table = "lecturers";
	$database -> set_table($table);
	$database -> get_table();
	$database -> find_by_sql("email", "dakurahsixtus@yahoo.com");
	$database -> set_result();
	while ($value = mysqli_fetch_assoc($database -> get_result())) {
		//echo $value["last_name"] . " " . $value["first_name"];
	}

?>
<?php 
	$txtTitle = "test title";
	$txtDescription = "test description";
	$txtDay = "Thurs";
	//$txtDayMonth = "20";
	$txtMonth = "March";
	$txtTime = "23";
	$lecturer -> post_announcement($txtDescription);
?>
<?php 
	// $arraySub = array('sub5', 'sub6', 'sub7', 'sub8', 'sub9');
	// //$safe_topic = $database -> escape_string($topic);
	// echo $subNumber = count($arraySub);
	// echo "<br />";
	// for ($i=0; $i < $subNumber ; $i++) { 
	// 	if (empty($arraySub[$i])) {
	// 		array_shift($arraySub);
	// 	}
	// }

	// if (count($arraySub) >=1) {
	// 	echo count($arraySub);
	// 	foreach ($arraySub as $value) {
	// 		echo $value . "<br />";
	// 	}
	// }
?>
<?php 
	if (validSelect("Sixtus", "Hello")) {
		//echo "True";
	}else{
		echo "False";
	}

?>
<?php echo "<br />"; ?>
<?php 
	$pass = "2@An";
	$name = "sajaklsdjskdkj";
	$email = "dakurahsixru@sefoodog.com";
	$last_name = "dadha";
	//$lecturer -> validate_moderator($name, $last_name, $pass, $email);
	if(!($validate_registration -> strong_password($pass))){
		$validate_registration -> error_pass_message . "<br />";
	}
	if(!($validate_registration -> min_max_name($name))){
		$validate -> error_min_max . "<br />";
	}
	if(!($validate_registration -> validate_email($email))){
		$validate_registration -> error_email_message . "<br />";
	}
	echo $validate_registration -> error_pass_message . "<br />";
?>

<?php 
	
	// $database -> set_table("course_outline_topics");
	// $arraySub = array('sub5', 'sub6', 'sub7', 'sub8', 'sub9');
	// $safe_topic = "New";
	// $table = $database ->get_table();
	// $query = "INSERT INTO $table(topic) VALUES ('$safe_topic') ";
	// $result = mysqli_query($database -> connection, $query);
	// if ($database -> confirm_query($result)) {
	// 	$id = $database -> last_inserted_row($database -> connection);
	// 	//now insert topics
	// 	$database -> set_table("course_outline_subtopics");
	// 	$table =  $database -> get_table();
	// 	$num = count($arraySub);
	// 	echo $num;
	// 	foreach ($arraySub as $value) {
	// 		//$subtopic = $arraySub[$i];
	// 		$safe_subtopic = $database -> escape_string($value);
	// 		$query = "INSERT INTO $table(topic_id, sub_topic) VALUES($id, '$safe_subtopic') ";
	// 		$result = mysqli_query($database -> connection, $query);
	// 		if ($database -> confirm_query($result)) {
	// 			//return true;
	// 			continue;
	// 		}else{
	// 			die("Could not create subtopics. " . mysqli_error($database -> connection));
	// 		}
	// 	}
	// }else{
	// 	die(mysqli_error($database -> connection));
	// }

?>
<?php 
	// $database -> set_table("course_outline_topics");
	// echo $topic_table = $database -> get_table();
	// $database -> set_table("course_outline_subtopics");
	// echo $sub_table = $database -> get_table();
?>
<?php 
	// $file = "hello.jpg";
	// echo $extension = substr($file, strpos($file, '.'));
?>
<?php $database -> close_db(); ?>