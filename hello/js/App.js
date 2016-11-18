//Javascript document 

function getData(pageName){

	//send the name over to the php file.
	//This is the jquery post method
	var posting = $.post("php/script.php", {
	
		page_name: pageName
	
	});
	
	//what will happen when the posting is done.
	posting.done(function(data){
		
		//jQuery 
		$("#content").html(data);
	
	});

	//what happens if it fails.
	posting.fail(function(){
	
		alert("failed");
	
	});
}

$(document).ready(function(){

	getData("about");

});