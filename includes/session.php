<?php session_start(); ?>
<?php require_once("includes.php"); ?>
<?php 

	class Session {
		//login lecturer/ta/student
		//logout same people
		//create who is line function with available sessions
		public function logged_lecturer(){
			if (isset($_SESSION["logged_lecturer"])) {
				# code...
				return $_SESSION["logged_lecturer"];
			}
		}

		public function __construct(){
			$this -> logged_lecturer();
		}

		public function logged_assistant(){
			$assistant_id = $assistant -> get_assistantId(); 
			if (isset($assistant_id)) {
				return $_SESSION['logged_assistant'] = $assistant -> get_assistantId();
			}else{
				return $_SESSION['logged_assistant'] = null;
			}
		}

		public function logged_student(){
			$student_id = $student -> get_studentId();
			if (isset($student_id)) {
				return $_SESSION['logged_student'] = $student -> get_studentId();
			}else{
				return $_SESSION['logged_student'] = null;
			}
		}

		public function logout_lecturer($homeUrl) {
			if (isset($_SESSION['logged_lecturer'])) {
				unset($_SESSION['logged_lecturer']);
				redirect_to($homeUrl);
			}
		}

		public function logout_assistant() {
			if (isset($_SESSION['logged_assistant'])) {
				unset($_SESSION['logged_assistant']);
			}
		}

		public function logout_student() {
			if (isset($_SESSION['logged_student'])) {
				unset($_SESSION['logged_student']);
			}
		}

	}
	$session = new Session();
?>