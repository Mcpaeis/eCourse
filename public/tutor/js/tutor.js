window.onload = initPage;
//find the thumbnails on the initPage
//set the handler for ech image
//create the onclick function
// set the display url

function initPage(){
	getJSONScheduledTest("../includes/process/test_schedule.php");
	getJSONAssignment("../includes/process/post_assignment.php");
	getJSONAnnouncement("../includes/process/announcement.php");
	var thumbs = document.getElementById("displayRed").getElementsByTagName("input");
	for (var i = 0; i < thumbs.length; i++) {
		//alert(thumbs.length);
		//lenth ="Number of inputs " + thumbs.length;
		//alert(length);
		input = thumbs[i];
		//alert(image);
		input.onfocus = function(){
			//alert(this.title);
			getID(this.title);
		}
	}
}

function getID(title){
	nextId = "displayRed" + title;
	nextDiv = document.getElementById(nextId);
	nextDiv.style.display = "block";
}
function getJSONScheduledTest(url){
	$.ajax({
		type: "POST",
		url: url,
		data: "",
		success: function(html){
			value = JSON.parse(html);
			//if (value!=null) {
				document.getElementById("upcomingExams").innerHTML = value;
			//}else{
				//error messages goes here
			//	alert("no result could be found");
			//}
		},
		beforeSend: function(){
			//error messages
		}
	});
}
function getJSONAssignment(url){
	$.ajax({
		type: "POST",
		url: url,
		data: "",
		success: function(html){
			value = JSON.parse(html);
			//if (value!=null) {
				document.getElementById("upcomingAssignments").innerHTML = value;
			//}else{
				//error messages goes here
			//	alert("no result could be found");
			//}
		},
		beforeSend: function(){
			//error messages
		}
	});
}
function getJSONAnnouncement(url){
	$.ajax({
		type: "POST",
		url: url,
		data: "",
		success: function(html){
			value = JSON.parse(html);
			//if (value!=null) {
				document.getElementById("txtAnnouncements").innerHTML = value;
			//}else{
				//error messages goes here
			//	alert("no result could be found");
			//}
		},
		beforeSend: function(){
			//error messages
		}
	});
}
jQuery(document).ready(function($){

	//schedule test ajax request
	$('#postSchedule').on('click', function(e){
		//required fields
		//caption, decription, date
		txtTitle = $('#txtTitle').val();
		txtDescription = $('#txtDescription').val();
		txtDay = $('#txtDay').val();
		txtDayMonth = $('#txtDayMonth').val();
		txtMonth = $('#txtMonth').val();
		txtTime = $('#txtTime').val();
		if (txtTitle=="") {
			alert("Test title is required");
		}else if(txtDescription==""){
			alert("Test description is required");
		}else if(txtDay =="Day" || txtDayMonth == "Day Of Month" || txtMonth == "Month" || txtTime == "Time"){
			alert("Please select all as applied");
		}else{
			$.ajax({
				type: "POST",
				url: "../includes/process/tutor.php",
				data: "txtTitle="+txtTitle+"&txtDescription="+txtDescription+"&txtDay="+txtDay+"&txtDayMonth="+txtDayMonth+"&txtMonth="+txtMonth+"&txtTime="+txtTime+"&postSchedule",
				success: function(html){
					value = JSON.parse(html);
					if (value.error==true) {
						alert("Test scheduled successfully!");
						//now call the function to update various pages
						getJSONScheduledTest("../includes/process/test_schedule.php");
					}else{
						//error messages goes here
						alert(value.error_msg);
					}
				},
				beforeSend: function(){
					//error messages
				}
			});
		}
		return false;
	});

	//assignment ajax request
	$('#postAssignment').on('click', function(e){
		//required fields
		//caption, decription, date
		txtTitle = $('#txtTitleAssignment').val();
		txtDescription = $('#txtDescriptionAssignment').val();
		txtDay = $('#txtDayAssignment').val();
		//txtDayMonth = $('#txtDayMonth').val();
		txtMonth = $('#txtMonthAssignment').val();
		txtTime = $('#txtTimeAssignment').val();
		if (txtTitle=="") {
			alert("Assignment/Exercise title is required");
		}else if(txtDescription==""){
			alert("Test description is required");
		}else if(txtDay =="Day" || txtMonth == "Month" || txtTime == "Time"){
			alert("Please select all as applied");
		}else{
			$.ajax({
				type: "POST",
				url: "../includes/process/tutor.php",
				data: "txtTitle="+txtTitle+"&txtDescription="+txtDescription+"&txtDay="+txtDay+"&txtMonth="+txtMonth+"&txtTime="+txtTime+"&postAssignment",
				success: function(html){
					value = JSON.parse(html);
					if (value.error==true) {
						alert("Assignment posted successfully!");
						//now call the function to update various pages
						getJSONAssignment("../includes/process/post_assignment.php");
					}else{
						//error messages goes here
						alert(value.error_msg);
					}
				},
				beforeSend: function(){
					//error messages
				}
			});
		}
		return false;
	});

//anouncement ajax request
	$('#postAnnouncement').on('click', function(e){
		//required fields
		//caption, decription, date
		txtContent = $('#txtAnnouncement').val();
		if (txtContent=="") {
			alert("Invalid Announcement");
		}else{
			$.ajax({
				type: "POST",
				url: "../includes/process/tutor.php",
				data: "txtContent="+txtContent+"&postAnnouncement",
				success: function(html){
					value = JSON.parse(html);
					if (value.error==true) {
						alert("Announcement posted successfully!");
						//now call the function to update various pages
						getJSONAnnouncement("../includes/process/announcement.php");
					}else{
						//error messages goes here
						alert(value.error_msg);
					}
				},
				beforeSend: function(){
					//error messages
				}
			});
		}
		return false;
	});
})