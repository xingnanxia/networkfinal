<?php


//get the data from javascript.
if(isset($_POST['name'])){

	getPageData($_POST['name']);
}

//get the data from javascript.
if(isset($_POST['myID'])){

	getSchoolData($_POST['myID']);
}


function connectToDB(){

	//connect to the database 
	//DB_Host, DB_User, DB_Pass, UB_Name
	$mysqliLink = new mysqli('localhost','root','root','universities');
	
	//check the connection 
	if(mysqli_connect_errno()){
	
		echo "not connected";

		exit();
	}
	
	return $mysqliLink;
}

function getSchoolData($id){

	$mysqliLink = connectToDB();
	
	$query = $mysqliLink->query("SELECT * FROM college_rating WHERE p_id = $id");
	
	$title = "";
	$desc = "";
	
	if($row = $query->fetch_object()){
	
		$title = $row -> name;
		$desc = $row -> description;
	}
	
	//send back to javascript 
	$html = '<h2>' . $title . '</h2>';
	$html .= '<p>' . $desc . '</p>';
	
	//show html
	echo $html;

}


//all the variables in php start with a dollar sign
function getPageData($pageName){

	$mysqliLink = connectToDB();
	
	//query to get the data back for us
	//data back stored in var query
	$query = $mysqliLink->query("SELECT * FROM college_rating ");
	
	//two variables to store the back data
	$title = "";
	$html = "";


	while ($row = $query->fetch_object()){
	
		$title = $row -> name;
		$id = $row -> p_id;
		
		$html .= ' <li onclick="ClickSchool('.$id.')"><a>' . $title . '</a></li> ';

	}
	
	//send back to javascript 
	
	
	
	echo $html;
}


?>

