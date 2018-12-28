<?php 

	function validSelect($selected, $odd_select){
		//if selected value does not match descriptive txt return true else return false
		return $selected!=$odd_select ? true : false;
	}

?>

<?php 
// 	function strong_password($txtPassword){
// 		//should not be empty or have a zero value
// 		//should have atleast one uppercase and lowercase letter
// 		// should have one symbol
// 		// should have one numeral
// 		$error_pass_message = null;
// 		if (empty($txtPassword)) {
// 			$error_pass_message = "Password is empty!";
// 			return false;
// 		}elseif(!ereg('[A-Z]', $txtPassword)){
// 			$error_pass_message = "Password Should have atleast one uppper case letter.";
// 			return false;
// 		}elseif(!ereg('[a-z]', $txtPassword)){
// 			$error_pass_message = "Password Should have atleast one lower case letter.";
// 			return false;

// 		}elseif (!ereg('[0-9]', $txtPassword)) {
// 			$error_pass_message = "Password should contain atleast one numeral.";
// 			return false;
// 		}elseif(!ereg("@#*", $txtPassword)){
// 			$error_pass_message = "Password should contain atleast one special symbol eg (@ # *)";
// 			return false;
// 		}else{
// 			return true;
// 		}
// 		return $error_pass_message;
// 	}
// ?>
<?php 
// 	function validate_email($txtEmail){
// 		$error_email_message = null;
// 		if (filter_var($txtEmail, FILTER_VALIDATE_EMAIL)) {
// 			return true;
// 		}else{
// 			$error_email_message = "Email not valid!";
// 			return false;
// 		}
// 		return $error_email_message;
// 	}
// ?>
<?php 
// 	function min_max_name($txtName){
// 		$error_email_message = null;
// 		if (strlen($txtName) < 3) {
// 			$error_min_max = "Characters Should Be Atleast Three.";
// 			return false;
// 		}elseif (strlen($txtName) > 30) {
// 			$error_min_max = "Characters must not excedd thirty(30).";
// 			return false;
// 		}else{
// 			return true;
// 		}
// 		return $error_min_max;
// 	}
// ?>