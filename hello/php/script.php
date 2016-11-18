<?php

//get the data from javascript.
if(isset($_POST['page_name'])){

	getPageData($_POST['page_name']);
}

function connectToDB(){

	//connect to the database 
	$mysqliLink = new mysqli('localhost','root','root','Test_DB');
	
	//check the connection 
	if(mysqli_connect_errno()){

		exit();
	}
	
	return $mysqliLink;
}

//all the variables in php start with a dollar sign
function getPageData($pageName){

	$mysqliLink = connectToDB();
	
	//query to get the data back for us
	//data back stored in var query
	$query = $mysqliLink->query("SELECT * FROM page_data WHERE page_name = '$pageName'");
	
	//two variables to store the back data
	$title = "";
	$desc = "";	
	
	if($row = $query->fetch_object()){
	
		$title = $row -> page_title;
		$desc = $row -> page_desc;
	}
	
	//send back to javascript 
	$html = '<h1>' . $title . '</h1>';
	$html .= '<p>' . $desc . '</p>';
	
	echo $html;

}











?>