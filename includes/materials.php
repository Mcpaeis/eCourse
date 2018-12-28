<?php require_once("includes.php"); ?>

<?php 
	class Materials{
			public $upload_message = "";

		public function upload($txtFile, $txtDescription){
			$upload_errors = array(
				UPLOAD_ERR_OK			 => "No errors.",
				UPLOAD_ERR_INI_SIZE 	 => "Larger than upload_max_filesize.",
				UPLOAD_ERR_FORM_SIZE	 => "Larger than form MAX_FILE_SIZE.",
				UPLOAD_ERR_PARTIAL		 =>"Partial upload.",
				UPLOAD_ERR_NO_FILE		 => "No file.",
				UPLOAD_ERR_NO_TMP_DIR	 => "No temporary directory.",
				UPLOAD_ERR_CANT_WRITE 	 => "Can't write to disk.",
				UPLOAD_ERR_EXTENSION 	 => "File upload stopped by extension"
			);
			
			$file_size = $_FILES['$txtFile']['size'];
			$tmp_file = $_FILES['$txtFile']['tmp_name'];
			$target_file = basename($_FILES['$txtFile']['name']);
			//$extension = strtolower(substr($target_file, strpos($target_file, ".") + 1));
			$_FILES['$txtFile']['name'] = mt_rand(122653, 1242637);
			$target_file = basename($_FILES['$txtFile']['name']);
			$upload_dir = "tutor/uploads";
			if (move_uploaded_file($tmp_file, $upload_dir."/".$target_file)) {
				// proceed to record it in the database
				$column1 = "file_name";
				$column2 =  "description";
				$value = $target_file;
				$database -> set_table("course_materials");
				$table = $database -> get_table();
				$query = "INSERT INTO $table ($column1, $column2) VALUES ($value, $txtDescription)";
				$result = mysqli_query($database -> connection, $query);
				if ($database -> confirm_query($result)) {
					$upload_message = "File Uploaded Successful";
				}else{
					$upload_message = "There was a problem uploading the file. Try again.";
				}
			}else{
				$upload_message = $_FILES['$txtFile']['error'];
				$upload_message = $upload_errors[$upload_message];
			}
		}
	}
	$materials = new Materials;
?>