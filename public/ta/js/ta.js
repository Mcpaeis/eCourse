window.onload = initPage;
//find the thumbnails on the initPage
//set the handler for ech image
//create the onclick function
// set the display url

function initPage(){
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
