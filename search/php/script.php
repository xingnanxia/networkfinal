<?php


//get the data from javascript.
if(isset($_POST['name'])){

	getPageData($_POST['name']);
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
	
	echo "connected";
	
	return $mysqliLink;
}


//all the variables in php start with a dollar sign
function getPageData($pageName){

	$mysqliLink = connectToDB();
	
	//query to get the data back for us
	//data back stored in var query
	$query = $mysqliLink->query("SELECT * FROM college_rating WHERE name = '$pageName'");
	
	//two variables to store the back data
	$title = "";
	$desc = "";	
	
	if($row = $query->fetch_object()){
	
		$desc = $row -> description;
	}
	
	//send back to javascript 
	$html = '<h1>' . $pageName . '</h1>';
	$html .= '<p>' . $desc . '</p>';
	
	echo $html;
}

?>

