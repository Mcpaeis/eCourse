<?php include("../includes/includes.php"); ?>
<?php require_once("tutor/tutor_home_process.php"); ?>
<?php
?>
<html>
	<head>
		<link rel='shortcut icon' type='image/x-icon' href="favicon.png" /> 		
		<link rel="stylesheet" type="text/css" href="../includes/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="tutor/css/tutor.css">
		<meta charset="utf-8" lang="en">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<header class="jumbotron-custom">
			<div id="welcome" class="col-sm-9">
				<span>Welcome To eCourse</span>
			</div>
			<div id="picture" class="col-sm-2 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
				<img src="tutor/images/me.jpg" class="img img-circle"><br />
				<span>Prof. S Dakurah</span>
			</div><br /><br />
		</header>
		<section class="">
			<div id="commands" class="col-sm-3 panel-group">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h1 class="panel-title">
							<a href="#ta" class="accordion-toggle"  data-parent="#commands" data-toggle="collapse">Teaching Assitants</a>
						</h1>
					</div>
					<div class="panel-collapse collapse" id="ta">
						<div class="panel_body">
							<span>Add Teaching Assistant</span><br /><br />
							<input type="text" name="txttaFname" placeholder="TAs' First Name"/><br /><br />
							<input type="text" name="txttaLname" placeholder="TAs' Last Name"/><br /><br />
							<input type="text" name="txttaEmail" placeholder="TAs' Email"/><br /><br />
							<input type="password" name="txtPassword" placeholder="TAs' Password"/><br /><br />
							<input type="submit" value="ADD" name="postAddTa" style="width: auto;"><br /><br />
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h1 class="panel-title">
							<a href="#students" class="accordion-toggle"  data-parent="#commands" data-toggle="collapse">Students</a>
						</h1>
					</div>
					<div class="panel-collapse collapse" id="students">
						<div class="panel_body">
							<span>Add Students</span><br /><br />
							<form>
								<select name="postNumber">
									<option selected>Number Of Students</option>
									<?php 
										for ($i=1; $i <= 100; $i++) { 
											echo "<option>$i</option>";
										}
									?>
								</select>
								<input type="submit" value="Go" name="postGoAddStudent" style="width: auto;">
							</form><br /><br />
							<a href="#">View Students' Assessment</a>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h1 class="panel-title">
							<a href="#course" class="accordion-toggle"  data-parent="#commands" data-toggle="collapse">Course Assessment</a>
						</h1>
					</div>
					<div class="panel-collapse collapse" id="course">
						<div class="panel_body">
							<span>Post Assignment/Exercies</span><br />
							<form method="POST" action="#">
								<input type="text" name="txtTitle" id="txtTitleAssignment" placeholder="Title"><br /><br />
								<textarea name="txtSubject" id="txtDescriptionAssignment" cols="30" rows="10">Type Assignment Content here......</textarea><br /><br />
								<span>Submission Deadline</span><br /><br />
								<select name="postDay" id="txtDayAssignment">
									<option selected>Day</option>
									<?php 
										for ($i=1; $i <= 31; $i++) { 
											echo "<option>$i</option>";
										}
									?>
								</select>
								<select name ="postMonth" onchange="hide_text();" id="txtMonthAssignment">
									<option>Month</option>
									<option>January</option>
									<option>February</option>
									<option>March</option>
									<option>April</option>
									<option>May</option>
									<option>June</option>
									<option>July</option>
									<option>August</option>
									<option>September</option>
									<option>October</option>
									<option>November</option>
									<option>December</option>
								</select>
								<select name="postTime" id="txtTimeAssignment">
									<option selcted>Time</option>
									<?php 
										for ($i=0; $i <= 23; $i++) { 
											echo "<option>$i</option>";
										}
									?>
								</select><br /><br />
								Code <span>1</span><br /><br />
								<input type="submit" value="POST" name="postAssignment" id="postAssignment" style="width: auto;"><br /><br /><br /><br />
							</form>
							<span>Schedule Test</span>
							<form method="POST" action="#">
								<input type="text" name="txtTitle" id="txtTitle" placeholder="Test Caption......"><br /><br />
								<textarea name="txtDescription" id="txtDescription" cols="30" rows="5">Type Test Description or Recommended Readings.....</textarea><br /><br />
								<span>Day And Time</span><br />
								<select name="txtDay" id="txtDay">
									<option selected>Day</option>
									<option>Sun</option>
									<option>Mon</option>
									<option>Tues</option>
									<option>Wed</option>
									<option>Thurs</option>
									<option>Fri</option>
									<option>Sat</option>
								</select>
								<select name="txtDayMonth" id="txtDayMonth">
									<option>Day Of Month</option>
									<?php 
										for ($i=1; $i <= 31; $i++) { 
											echo "<option>$i</option>";
										}
									?>
								</select><br /><br />
								<select name ="postMonth" id="txtMonth" onchange="hide_text();">
									<option>Month</option>
									<option>January</option>
									<option>February</option>
									<option>March</option>
									<option>April</option>
									<option>May</option>
									<option>June</option>
									<option>July</option>
									<option>August</option>
									<option>September</option>
									<option>October</option>
									<option>November</option>
									<option>December</option>
								</select>
								<select name="postTime" id="txtTime">
									<option selcted>Time</option>
									<?php 
										for ($i=0; $i <= 23; $i++) { 
											echo "<option>$i</option>";
										}
									?>
								</select><br /><br />
								<input type="submit" value="Schedule" name="postSchedule" style="width: auto;" id="postSchedule">
							</form>
						</div>
					</div>
				</div>
				<div id="announcements">
					<span>Post Announcement</span><br /><br />
					<form method="POST" action="#">
						<textarea rows="4" id="txtAnnouncement">Type announcement Here.....</textarea><br />
						<input type="submit" value = "Post" id="postAnnouncement"><br /><br />
					</form>
					<span>Previous Annoucement</span><br />
					<div id="txtAnnouncements">

					</div> 
				</div>
			</div>
			<div id="chat" class="col-sm-6 panel-group">
				<!--<div class="panel panel-default" id="chat_message">
					<div class="panel-heading">
						<h1 class="panel-title">
							<a href="#message_body" class="accordion-toggle"  data-parent="#chat" data-toggle="collapse">Chat<i> (0 New Messages)</i></a>
						</h1>
					</div>
					<div class="panel-collapse collapse" id="message_body">
						<div class="panel_body_chat" >
							<span>..................</span>
						</div>
					</div>
				</div> -->
				<div class="panel panel-default" id="chat_questions">
					<div class="panel-heading">
						<h1 class="panel-title">
							<a href="#question_body" class="accordion-toggle"  data-parent="#chat" data-toggle="collapse">Questions <i>(No New Post)</i></a>
						</h1>
					</div>
					<div class="panel-collapse collapse" id="question_body">
						<div class="panel_body_chat">
							<div id="posts">
								.......
							</div>
							<div id="inputbox">
								<!--<form method="post" action="#"> -->
									<textarea name="txtQuestion" id="question">Type question here....</textarea>
									<input type="submit" value="Send" name="postQuestion">
								,<!--</form> -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="notifs" class="col-sm-3">
				<div id="online">
					<span>Who is Online</span>
				</div>
				<div id="events">
					<span>Upcoming Events</span>
					<!-- format of events -// title, description, date, time -->
					<div class="" id="upcomingExams">
						<div class="col-xs-2">Title</div>
						<div class="col-xs-6">Description</div>
						<div class="col-xs-2">Date</div>
						<div class="col-xs-2">Time</div>
						<span>status</span>
					</div>
				</div>
				<div id="assignments">
					<span>Notifs on Assignments</span>
					<div class="" id="upcomingAssignments">
						<div class="col-xs-2">Title</div>
						<div class="col-xs-6">Description</div>
						<div class="col-xs-2">Date</div>
						<div class="col-xs-2">Time</div>
						<span>status</span>
					</div>
				</div>
			</div>
		</section>
		<article class="row">
			<div class="row-custom" id="outline">
				<div id="outline_display" class="col-lg-9 col-md-8 col-lg-push-3 col-md-push-4">
					<span>Course Outline</span><br /><br />
					<i>You have not added any outline yet......</i>
				</div>
				<div id="outline_add" class="col-lg-3 col-md-4 col-lg-pull-9 col-md-pull-8 ">
					<span>Add Course Outline</span>
					<form method="post">
						<div id="displayRed">
							<input type="text" name="txtTopic" placeholder="Topic.....">
							<input type="text" name="subtopic1" placeholder="Sub Topic....(1)" id="displayRed0" title="1">
							<input type="text" name="subtopic2" placeholder="Next Sub Topic....(2)" id="displayRed1" title="2">
							<input type="text" name="subtopic3" placeholder="Next Sub Topic....(3)" id="displayRed2" title="3">
							<input type="text" name="subtopic4" placeholder="Next Sub Topic....(4)" id="displayRed3" title="4">
							<input type="text" name="subtopic5" placeholder="Next Sub Topic....(5)" id="displayRed4" title="5">
							<input type="text" name="subtopic6" placeholder="Next Sub Topic....(6)" id="displayRed5" title="6">
							<input type="text" name="subtopic7" placeholder="Next Sub Topic....(7)" id="displayRed6" title="7">
							<input type="text" name="subtopic8" placeholder="Next Sub Topic....(8)" id="displayRed7" title="8">
							<input type="text" name="subtopic9" placeholder="Next Sub Topic....(9)" id="displayRed8" title="9">
							<input type="text" name="subtopic10" placeholder="Next Sub Topic....(10)" id="displayRed9">
						</div>
						<br />
						<!--<textarea name="txtDescription">Type brief description....</textarea><br /><br />-->
						<input type="submit" value="ADD" name="postAddOutline">
					</form>
				</div>
			</div>
			<div class="row-custom" id="materials">
				<div id="materials_display" class="col-lg-9 col-md-8 col-lg-push-3 col-md-push-4">
					<span>Course Materials</span><br /><br />
					<i>You have not uploaded any course material yet......</i>
				</div>
				<div id="materials_add" class="col-lg-3 col-md-4 col-lg-pull-9 col-md-pull-8 ">
					<span>Upload Course Materials</span>
					<form>
						<input type="file" enctype="multipart/post-data"><br />
						<input type="text" name="txtDescription" placeholder="Brief Description"><br /><br />
						<input type="submit" value="Upload" name="postUpload">
					</form>
				</div>
			</div>
		</article>

		<footer>
			<div class="row" id="end1">
				<span>Complete or update your profile!</span><br /><br />
				<div class="col-sm-3">
					<form method="post">
						<select>
							<option selected>Suffix</option>
							<option>Miss</option>
							<option>Mrs</option>
							<option>Mr</option>
							<option>Dr</option>
							<option>Prof</option>
						</select>
						<input type="submit" value="Update" name="updateSuffix"><br /><br />
					</form>
				</div>
				<div class="col-sm-9">
					<span>Profile Picture(Head Picture)</span>
					<form method="post">
						<input type="file" enctype="multipart/form-data" name="filePicture" />
						<input type="submit" value="Upload" name="updatePicture">
					</form>
				</div>
			</div>
				<div id="end" class="row">
					<span class="col-sm-11">&copy eCourse <?php echo date("Y", time()); ?></span>
					<span class="col-sm-1">
						<form method="post" action="tutor.php">
							<input type="submit" name="postLogout" value="Logout" style="float: right; margin: px;">
						</form>
					</span>
				</div>
			<script type="text/javascript" src="../includes/js/jquery-2.2.4.min.js"></script>
			<script type="text/javascript" src="../includes/js/bootstrap.min.js"></script>
			<script type="text/javascript" src="tutor/js/tutor.js"></script>	
		</footer>
	</body>
</html>