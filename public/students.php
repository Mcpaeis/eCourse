<?php include("../includes/includes.php"); ?>
<?php ?>
<!-- 
	//announcements
	//who is online
	//submit assignments
	//post questions and answer them
	//upload a profile picture
	//upload a supporting course material

-->
<html>
	<head>
		<link rel='shortcut icon' type='image/x-icon' href="favicon.png" /> 		
		<link rel="stylesheet" type="text/css" href="../includes/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="student/css/student.css">
		<meta charset="utf-8" lang="en">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<header class="jumbotron-custom">
			<div id="welcome" class="col-sm-9">
				<span>Welcome To eCourse</span>
			</div>
			<div id="picture" class="col-sm-2 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
				<img src="student/images/s1.png" class="img img-circle"><br />
				<span>Prof. S Dakurah</span>
			</div><br /><br />
		</header>
		<section class="">
			<div id="commands" class="col-sm-3">
				<div>
					<span>Upcoming Assignments.</span>
				</div>
				<div>
					<span>Upload Any Supporting Course Material.</span><br /><br />
					<form>
						<input type="file" enctype="multipart/post-data"><br />
						<input type="text" name="txtDescription" placeholder="Brief Description"><br /><br />
						<input type="submit" value="Upload" name="postUpload">
					</form>
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
				</div>
				<div id="assignments">
					<span>Assignments Submission Status</span>
				</div>
			</div>
		</section>
		<article class="row">
			<div class="row-custom" id="outline">
				<div id="outline_display">
					<span>Course Outline</span><br /><br />
					<i>Administrator have not added any outline yet......</i>
				</div>
			</div>
			<div class="row-custom" id="materials">
				<div id="materials_display">
					<span>Course Materials</span><br /><br />
					<i>Administrator have not uploaded any course material yet......</i>
				</div>
			</div>
		</article>

		<footer>
			<div class="row" id="end1">
				<span>Complete/Update Your Profile!</span><br /><br />
				<div class="col-sm-3">
					<form method="post">
						<select>
							<option selected>Suffix</option>
							<option>Miss</option>
							<option>Mr</option>
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
						<form>
							<input type="submit" name="postLogout" value="Logout" style="float: right; margin: px;">
						</form>
					</span>
				</div>
			<script type="text/javascript" src="../includes/js/jquery-2.2.4.min.js"></script>
			<script type="text/javascript" src="../includes/js/bootstrap.min.js"></script>
			<script type="text/javascript" src="student/js/student.js"></script>
		</footer>
	</body>
</html>