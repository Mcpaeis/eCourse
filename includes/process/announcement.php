<?php include("../includes.php"); ?>
<?php 
	$result = $lecturer -> get_posted_announcements();
	$response = array();
	if ($result) {
		while ($result_array  = mysqli_fetch_assoc($result)){
			$content = $result_array["content"];
			//$innerHtml = "<div class=\"upcomingEvents\">";
			//$innerHtml .= "<div class=\"col-xs-2\">";
			$innerHtml = $content ."<br />";
			array_push($response, $innerHtml);
		}
	}else{
		
	}
	echo json_encode($response);
?>