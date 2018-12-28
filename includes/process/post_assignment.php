<?php include("../includes.php"); ?>
<?php 
	$result = $lecturer -> get_posted_assignment();
	$response = array();
	if ($result) {
		while ($result_array  = mysqli_fetch_assoc($result)){
			$title = $result_array["title"];
			$description = $result_array["subject"];
			$test_date = $result_array["assignment_date"];
			$test_time = $result_array["assignment_time"];
			$status = $result_array["status"];
			//$innerHtml = "<div class=\"upcomingEvents\">";
			//$innerHtml .= "<div class=\"col-xs-2\">";
			$innerHtml = $title ."<br />";
			//$innerHtml .= "</div>";
			//$innerHtml .= "<div class=\"col-xs-6\">";
			$innerHtml .= $description."<br />";
			//$innerHtml .= "</div>";
			//$innerHtml .= "<div class=\"col-xs-2\">";
			$innerHtml .= $test_date."<br />";
			//$innerHtml .= "</div>";
			//$innerHtml .= "<div class=\"col-xs-2\">";
			$innerHtml .= $test_time."<br />";
			//$innerHtml .= "</div>";
			//$innerHtml .= "<span>";
			$innerHtml .= $status."<br />";
			$innerHtml .="<hr /><br />";
			//$innerHtml .= "</span>";
			//$innerHtml .= "</div>";
			//now add that to the array
			array_push($response, $innerHtml);
		}
	}else{
		
	}
	echo json_encode($response);
?>