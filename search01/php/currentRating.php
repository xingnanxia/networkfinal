<?php


if(isset($_POST['myID'])){
    
	getCollegeData($_POST['myID']);
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

function getCollegeData($id){

	$mysqliLink = connectToDB();
	
	//query to get the data back for us
	//data back stored in var query
	$query = $mysqliLink->query("SELECT * FROM college_rating WHERE p_id=$id");
	
	$rating = -1;


	if ($row = $query->fetch_object()){
	
		$rating= $row -> OverallRating;
	}

	
	echo $rating;
}


?>

