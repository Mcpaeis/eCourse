<?php require_once("includes.php"); ?>
<?php 
	class ValidateRegistration {

		public $error_email_message;
		public $error_pass_message;
		public $error_min_max;

		public function strong_password($txtPassword){
			//should not be empty or have a zero value
			//should have atleast one uppercase and lowercase letter
			// should have one symbol
			// should have one numeral
			if (empty($txtPassword)) {
				$this -> error_pass_message = "Password is empty!";
				return false;
			}elseif(!ereg('[A-Z]', $txtPassword)){
				$this -> error_pass_message = "Password Should have atleast one uppper case letter.";
				return false;
			}elseif(!ereg('[a-z]', $txtPassword)){
				$this -> error_pass_message = "Password Should have atleast one lower case letter.";
				return false;

			}elseif (!ereg('[0-9]', $txtPassword)) {
				$this -> error_pass_message = "Password should contain atleast one numeral.";
				return false;
			}elseif(!ereg("@#*", $txtPassword)){
				$this ->error_pass_message = "Password should contain atleast one special symbol eg (@ # *)";
				return false;
			}else{
				return true;
			}
		}
	 	
		public function encrypt($password){
			$length = 22;
			$salt = $this -> generate_salt($length);
			$hash_format = '$2y$10$';
			$format_salt = $hash_format.$salt;
			$hashed_password = crypt($password, $format_salt);
			return $hashed_password;
		}
		public function generate_salt($length){
			$unique_random_string = md5(uniqid(mt_rand(), true));
			$base64_string = base64_encode($unique_random_string);
			$modified_base64_string = str_replace('+', '.', $base64_string);
			$salt = substr($modified_base64_string, 0, $length);
			return $salt;
		}
		public function decrypt($password, $existing_hash){
			$hash = crypt($password, $existing_hash);
			if ($hash === $existing_hash) {
				return true;
			}else{
				return false;
			}
		}

		public function validate_email($txtEmail){
			if(empty($txtEmail)){
				$this -> error_email_message = "Email is empty!";
				return false;
			}elseif (!(filter_var($txtEmail, FILTER_VALIDATE_EMAIL))) {
				$this -> error_email_message = "Email not valid!";
				return false;
			}else{
				return true;
			}
		}
	 
		public function min_max_name($txtName){
			if (strlen($txtName) < 3) {
				$this -> error_min_max = "Characters Should Be Atleast Three.";
				return false;
			}elseif (strlen($txtName) > 30) {
				$this -> error_min_max = "Characters must not exceed thirty(30).";
				return false;
			}else{
				return true;
			}
		}
	}
?>

<?php $validate_registration = new ValidateRegistration(); ?>

<?php 

	class ValidateLogin {
		public $lecturer_login_mail_message;
		public $assistant_mail_message;
		public $student_mail_message;
		public $lecturer_login_pass_message;
		public $assistant_pass_message;
		public $student_refno_message;
		public $lecturer_id;
		public function lecturer_login($txtEmail, $txtPass){
			$database = new Database();
			if (empty($txtEmail)) {
				$this -> lecturer_login_mail_message = "Email is empty!";
				return false;
			}elseif(empty($txtPass)){
				$this -> lecturer_login_pass_message = "Password is empty";
				return false;
			}else{
				//check that the said email is in the database
				$ref = "email";
				$value = $txtEmail;
				$database -> set_table("lecturers");
				$database -> get_table();
				$database -> find_by_sql($ref, $value);
				$database -> set_result();
				$result = $database -> get_result();
				$result_array = mysqli_fetch_assoc($result);
				if (mysqli_num_rows($result)==0) {
					$this -> lecturer_login_mail_message = "Email Not Found!";
					return false;
				}else{
					$validate_registration = new ValidateRegistration();
					$lecturer = new Lecturer();
					$hashedPass = $result_array["password"];
					if ($validate_registration -> decrypt($txtPass, $hashedPass)) { 
						//$lecturer -> get_lecturerId(); no need to get it here
						$this -> lecturer_id = $result_array["id"];
						return true;
					}else{
						$this -> lecturer_login_pass_message = "Wrong Password! Try Again.";
						return false;
					}
				}

			}
		}

		public function set_lid(){
				return $this -> lecturer_id;
			}

		public function get_lid(){
			return $this -> set_lid();
		}

		public function assistant_login($txtEmail, $txtPass){
			if (empty($txtEmail)) {
				$this -> assistant_mail_message = "Email is empty!";
				return false;
			}elseif(empty($txtPass)){
				$this -> assistant_pass_message = "Password is empty";
				return false;
			}else{
				//check that the said email is in the database
				$ref = "email";
				$value = $txtEmail;
				$database -> set_table("assistants");
				$database -> get_table();
				$database -> find_by_sql($ref, $value);
				$database -> set_result();
				$result = $database -> get_result();
				$result_array = mysqli_fetch_assoc($result);
				if (mysqli_num_rows($result_array)==0) {
					$this -> assistant_mail_message = "Email Not Found!";
					return false;
				}else{
					$hashedPass = $result_array["password"];
					if ($validate_registration -> decrypt($txtPass, $hashedPass)) {
						$id = $result_array["id"];
						$assistant -> set_assistantId($id);
						//$assistant -> get_assistantId();
						return true;
					}else{
						$this -> assistant_pass_message = "Wrong Password! Try Again.";
						return false;
					}
				}

			}
		}

		public function student_login($txtEmail, $txtPass){
			if (empty($txtEmail)) {
				$this -> student_mail_message = "Email is empty!";
				return false;
			}elseif(empty($txtPass)){
				$this -> student_refno_message = "Password is empty";
				return false;
			}else{
				//check that the said email is in the database
				$ref = "email";
				$value = $txtEmail;
				$database -> set_table("students");
				$database -> get_table();
				$database -> find_by_sql($ref, $value);
				$database -> set_result();
				$result = $database -> get_result();
				$result_array = mysqli_fetch_assoc($result);
				if (mysqli_num_rows($result_array)==0) {
					$this -> student_mail_message = "Email Not Found!";
					return false;
				}else{
					//i will decide weather to hash them or not---reference numbers/index numbers
					$hashedPass = $result_array["password"];
					if ($validate_registration -> decrypt($txtPass, $hashedPass)) {
						//$validate_registration so that i have acces to the decrypt method
						$id = $result_array["id"];
						$lecturer -> set_studentId($id); 
						//$lecturer -> get_studentId();
						return true;
					}else{
						$this -> lecturer_pass_message = "Wrong Password! Try Again.";
						return false;
					}
				}

			}
		}
		
	}
?>
<?php $validate_login = new ValidateLogin(); ?>
<?php 
	class ValidatePost {
		public $test_message = "";
		public $assignment_message = "";
		public $announcement_message = "";

		public function valid_test($txtTitle, $txtContent, $txtDay, $txtDmonth, $txtMonth, $txtTime){
			if (empty($txtTitle)) {
				$this -> test_message = "Title is empty";
				return false;
			}elseif (empty($txtContent)) {
				$this -> test_message = "No description given!";
				return false;
			}elseif (!validSelect($txtDay, "Day") && !validSelect($txtDmonth, "Day Of Month") && !validSelect($txtMonth, "Month") && !validSelect($txtTime, "Time") ) {
				$this -> test_message = "Test Date Not Correct/Incomplete";
				return false;
			}else{
				return true;
			}
		}

		public function valid_assignment($txtTitle, $txtContent, $txtDay, $txtMonth, $txtTime){
			if (empty($txtTitle)) {
				$this -> assignment_message = "Title is empty";
				return false;
			}elseif (empty($txtContent)) {
				$this -> assignment_messag = "No description given!";
				return false;
			}elseif (!validSelect($txtDay, "Day") && !validSelect($txtMonth, "Month") && !validSelect($txtTime, "Time") ) {
				$this -> assignment_message = "Assignment Date Not Correct/Incomplete";
				return false;
			}else{
				return true;
			}
		}

		public function valid_announcement($txtContent){
			if (empty($txtContent)) {
				$this -> announcement_message  = "Empty announcement";
				return false;
			}else{
				return true;
			}
		}

		public function valid_outline($pPost){
			$topic = $_POST['txtTopic']; 
			$sub1 = $_POST['subtopic1']; $sub2 = $_POST['subtopic2']; $sub3 = ['subtopic3'];
			$sub4 = $_POST['subtopic4']; $sub5 = $_POST['subtopic5']; $sub6 = ['subtopic6'];
			$sub7 = $_POST['subtopic7']; $sub8 = $_POST['subtopic8']; $sub9 = ['subtopic9'];
			$sub10 = $_POST['subtopic10'];
			$arraySub = array(trim($sub1), trim($sub2), trim($sub3), trim($sub4), trim($sub5), trim($sub6), trim($sub7), trim($sub8), trim($sub9));
			if (empty(trim($topic))) {
				return false;
			}else{
				$safe_topic = $database -> escape_string($topic);
				$subNumber = count($arraySub);
				for ($i=0; $i <$subNumber ; $i++) { 
					if (empty($arraySub[$i])) {
						array_shift($arraySub[$i]);
					}
				}

				if (count($arraySub) >=1) {
					//there is a subtopic 
					//add the topic and sub topics
					$database -> set_table("course_outline_topics");
					$table = $database -> get_table();
					$query = "INSERT INTO $table(topic) VALUES ('$safe_topic') ";
					$result = mysqli_query($database -> connection, $query);
					if ($database -> confirm_query($result)) {
						$id = $database -> last_inserted_row($database -> connection);
						//now insert subtopics
						$database -> set_table("course_outline_subtopics");
						$table =  $database -> get_table();
						foreach ($arraySub as $value) {
							$safe_subtopic = $database -> escape_string($value);
							$query = "INSERT INTO $table(topic_id, sub_topic) VALUES($id, '$safe_subtopic') ";
							$result = mysqli_query($database -> connection, $query);
							if ($database -> confirm_query($result)) {
								//return true;
								continue;
							}else{
								die("Could not create subtopics. " . mysqli_error($database -> connection));
							}
						}
					}else{
						return false;
					}
				}else{
					//no subtopic insert only the topic
					$database -> set_table("course_outline_topics");
					$table = $database -> get_table();
					$query = "INSERT INTO $table(topic) VALUES ('$safe_topic') ";
					$result = mysqli_query($database -> connection, $query);
					if ($database -> confirm_query($result)) {
					  return true;
					}else{
						die("Connection failed. " . mysqli_error($database -> connection));
					}
				}
			}
		}

		public function valid_suffix($suffix, $odd_select){
			//odd select --- will be the suffix descriptive text
			$selected = $_POST['$suffix'];
			if (validSelect($selected, $odd_select)) {
				return true;
			}else{
				return false;
			}
		}

		public function valid_profile_picture($postName) {
			$file = $_POST['$postName'];
			//jpg/png/jpeg file extension
			//name must be the lecturer id (p_id)
			$extension = substr($file, strpos($file, '.'));
			$extArray = array("jpg", "jpeg", "png");
			$extension = strtolower($extension);
			if (in_array($extension, $extArray)) {
				//good image format
				$lecturer_id = $session -> logged_lecturer();
				$_FILES[$file]['name'] = "p". "_" . $lecturer_id . "$extension";
				$target_file = basename($_FILES[$file]['name']);
				$upload_dir = "tutor/picture";
				if (move_uploaded_file($target_file, $upload_dir)) {
					set_picture_name($target_file);
					return true;
				}else{
					return false;
				}
			}
		}

		public function set_picture_name($file_name){
			return $file_name;
		}

		public function get_picture_name(){
			return $this -> set_picture_name($file_name);
		}

	}
?>
<?php $post = new ValidatePost(); ?>