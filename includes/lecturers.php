<?php require_once("includes.php"); ?>

<?php 

	class Lecturer {
		private $lecturer_id;
		protected $query = "";
		protected $result;
		public $register_success = "";
		public $login_success = "";
		public $min_max; public $mail; public $pass; public $Fname; public $Lname; public $Email; #registration
		public $lecturer_login_mail_message; public $lecturer_login_pass_message; public $login_array = array();#login
		#find out why the validate properties won't work.
		public function validate_moderator($txtFname, $txtLname, $txtPass, $txtEmail){
			$this -> Fname = $txtFname; $this -> Lname = $txtLname; $this -> Email = $txtEmail;
			$validate_registration = new ValidateRegistration();
			if (!($validate_registration -> validate_email($txtEmail))) {
				//echo $validate_registration -> error_email_message;
				return  $this -> mail = $validate_registration -> error_email_message;
				//return false;
			}elseif (!($validate_registration -> strong_password($txtPass))) {
				return $this -> pass = $validate_registration -> error_pass_message;
				//return false;
			}elseif (!($validate_registration -> min_max_name($txtFname))) {
				return $this -> min_max = $validate_registration -> error_min_max;
				//return false;
			}elseif (!($validate_registration -> min_max_name($txtLname))) {
				return $this -> min_max = $validate_registration -> error_min_max;
				//return false;
			}else{
				$database = new Database();
				$safeFname = $database -> escape_string($txtFname);
				$safeLname = $database -> escape_string($txtLname);
				$safePass = $database -> escape_string($txtPass);
				$hashedPass = $validate_registration -> encrypt($safePass);
				$safeEmail = $database -> escape_string($txtEmail);
				$this -> insert_moderator($safeFname, $safeLname, $hashedPass, $safeEmail);
			}
		}

		public function insert_moderator($txtFname, $txtLname, $txtPass, $txtEmail){
			$database = new Database();
			$database -> set_table("lecturers");
			$table = $database -> get_table();
			$this -> query = "INSERT INTO $table (first_name, last_name, email, password) VALUES ('{$txtFname}', '{$txtLname}', '{$txtEmail}', '{$txtPass}')";
			$this -> result = mysqli_query($database -> connection, $this -> query);
			if ($database -> confirm_query($this -> result)) {
				$this -> register_success = "Registration Was Successful! Thank You For Joining eCourse.";
				//return true;
			}else{
				$this -> register_success = "Registration Was Not Successful! Please Try Again.";

			}
		}

		public function login_lecturer($txtEmail, $txtPass){
			$validate_login = new ValidateLogin();
			if ($validate_login -> lecturer_login($txtEmail, $txtPass)) {
				//login successful
				// $session = new Session();
				// $this -> set_lecturerId();
				// $session -> logged_lecturer($this -> get_lecturerId());
				$_SESSION["logged_lecturer"] = $validate_login -> lecturer_id;
				redirect_to("tutor.php");
			}else{
				$a = $validate_login -> lecturer_login_mail_message;
				$b = $validate_login -> lecturer_login_pass_message;
				return $this -> login_array = array($a, $b);

			}
		}

		public function set_lecturerId(){
			return $this -> lecturer_id;
		}

		public function get_lecturerId(){
			return $this -> set_lecturerId();
		}

		public function update_suffix($selected, $oddSelect){
			if ($post -> valid_suffix($suffix, $odd_select)) {
				//good select update suffix column
				$database -> set_table("lecturers");
				$table = $database -> get_table();
				$column = "suffix";
				$query = "UPDATE $table SET $column = '$suffix' ";
				$result = mysqli_query($database -> connection, $query);
				if($database -> confirm_query($result)){
					//get the suffix display method	
					$this -> display_suffix();
				}else{
					die("Database connection failed." . nysqli_error($database -> connection));
				}
			}
		}

		public function display_suffix(){
			$database -> set_table("lecturers");
			$table = $database -> get_table();
			$column = "suffix";
			$query = "SELECT $column FROM $table WHERE $column!= 'null' ";
			$result = mysqli_query($database, $query);
			if ($database -> confirm_query($result)) {
				if (mysqli_num_rows($result)!=0) {
					$result_array = mysqli_fetch_assoc($result);
					$suffix = $result_array['$column'];
					return $suffix; 
				}else{
					return null;
				}
			}
		}

		public function update_profile_picture($postName){
			if ($post -> valid_profile_picture($postName)) {
				#file uploaded successfully....... create database record
				$file_name = $post -> get_picture_name();
				if (isset($file_name)) {
					$database -> set_table("lecturers");
					$table = $database -> get_table();
					$column = "profile_picture";
					$safe_file_name = $database -> escape_string($file_name); 
					$query = "UPDATE $table SET $column = '$safe_file_name' ";
					$result = mysqli_query($database -> connection, $query);
					if ($database -> confirm_query($result)) {
						//get display picture method
						$this -> display_picture();
					}else{
						die("Database connection failed. " . mysqli_error($database -> connection));
					}
				}
			}
		}

		public function display_picture(){
			$database -> set_table("lecturers");
			$table = $database -> get_table();
			$column = "profile_picture";
			$query = "SELECT $column FROM $table WHERE $column!= 'null' ";
			$result = mysqli_query($database, $query);
			if ($database -> confirm_query($result)) {
				if (mysqli_num_rows($result)!=0) {
					$result_array = mysqli_fetch_assoc($result);
					$picture_name = $result_array['$column'];
					return $picture_name; 
				}else{
					return null;
				}
			}
		}

		public function schedule_test($txtTitle, $txtContent, $txtDay, $txtDmonth, $txtMonth, $txtTime){
			$response = array("error" => true);
			$post = new ValidatePost();
			$database = new Database();
			if ($post -> valid_test($txtTitle, $txtContent, $txtDay, $txtDmonth, $txtMonth, $txtTime)) {
				//everything is good
				$database -> set_table("test");
				$table = $database -> get_table();
				$test_date = $txtDay ." ". $txtDmonth ." ". $txtMonth;
				$test_time = $txtTime;
				$safeTime = $database -> escape_string($test_time);
				$safeTitle = $database -> escape_string($txtTitle);
				$safeContent = $database -> escape_string($txtContent);
				$safedate = $database -> escape_string($test_date);
				$query = "INSERT INTO $table(caption, description, test_date, test_time) VALUES('$safeTitle', '$safeContent', '$safedate', '$safeTime')";
				$result = mysqli_query($database -> connection, $query);
				if (!$result) {
					die("Could not schedule test". mysqli_error($database -> connection));
				}	
			}else{
				$response["err_msg"] = $post -> test_message;
				$response["error"] = false;
			}
			echo json_encode($response);
		}

		public function get_test_schedule(){
			$database = new Database();
			$database -> set_table("test");
			$database -> get_table();
			return $database -> find_all();
			//will retirn the result for looping and other constructions
		}

		public function post_assignment($txtTitle, $txtContent, $txtDay, $txtMonth, $txtTime){
			$response = array("error" => true);
			$post = new ValidatePost();
			$database = new Database();
			if ($post -> valid_assignment($txtTitle, $txtContent, $txtDay, $txtMonth, $txtTime)) {
				//everythid is good
				$database -> set_table("assignments");
				$table = $database -> get_table();
				$test_date = $txtDay ." ". $txtMonth;
				$safeTitle = $database -> escape_string($txtTitle);
				$safeContent = $database -> escape_string($txtContent);
				//$safedate = $database -> escape_string($test_date);
				$query = "INSERT INTO $table(title, subject, assignment_date, assignment_time) VALUES('$safeTitle', '$safeContent', '$test_date', '$txtTime')";
				$result = mysqli_query($database -> connection, $query);
				if (!$result) {
					die("Could not schedule test". mysqli_error($database -> connection));
				}
			}else{
				$response["err_msg"] = $post -> assignment_message;
				$response["error"] = false;
			}
			echo json_encode($response);
		}

		public function get_posted_assignment(){
			$database = new Database();
			$database -> set_table("assignments");
			$database -> get_table();
			return $database -> find_all();
			//will retirn the result for looping and other constructions
		}

		public function post_announcement($txtContent){
			$response = array("error" => true);
			$post = new ValidatePost();
			$database = new Database();
			if ($post -> valid_announcement($txtContent)) {
				//everythid is good
				$database -> set_table("announcements");
				$table = $database -> get_table();
				$safeContent = $database -> escape_string($txtContent);
				$query = "INSERT INTO $table(content) VALUES('$safeContent')";
				$result = mysqli_query($database -> connection, $query);
				if (!$result) {
					die("Could not post assignment". mysqli_error($database -> connection));
				}
			}else{
				$response["err_msg"] = $post -> announcement_message;
				$response["error"] = false;
			}
			echo json_encode($response);
		}

		public function get_posted_announcements(){
			$database = new Database();
			$database -> set_table("announcements");
			$database -> get_table();
			return $database -> find_all();
			//will return the result for looping and other constructions
		}

		public function post_outline() {
			if ($post -> valid_outline($pPost)) {
				$this -> get_posted_outline();
			}
		}

		protected function get_posted_outline(){
			$database -> set_table("course_outline_topics");
			$topic_table = $database -> get_table();
			$database -> set_table("course_outline_subtopics");
			$sub_table = $database -> get_table();
			$query = "SELECT * FROM $topic_table, $sub_table, WHERE $topic_table.id = $sub_table.topic_id ";
			$result = mysqli_query($database -> connection, $query);
			if ($database -> confirm_query($result)) {
				return $result;
			}else{
				die("Connection failed. " . mysqli_query($database -> connection));
			}
		}
	}
?>
<?php $lecturer = new Lecturer(); ?>
<?php 

	class Assistant extends Lecturer{

		public function insert_moderator($txtFname, $txtLname, $txtPass, $txtEmail){
			$database -> set_table("assistants");
			$table = $database -> get_table();
		}

		public function login_moderator($txtEmail, $txtPass){
			if ($validate_login -> assistant_login($txtEmail, $txtPass)) {
				//login successful
				redirect_to("#");
			}else{
				//login not successful
				redirect_to("#");
			}
		}

		public function set_assistantId($id){
			return $this -> $id;
		}

		public function get_assistantId(){
			return $this -> set_assistantId();
		}

	}
	$assistant = new Assistant();
?>