<?php


//gets all the school names from the database
if(isset($_POST['name'])){

	getPageData($_POST['name']);
}

//gets the college information from the database
if(isset($_POST['myID'])){

	getCollegeData($_POST['myID']);
}

//gets the reviews of a certain school from the database 
if(isset($_POST['field']) and isset($_POST['school'])){
	getReviews($_POST['field'],$_POST['school']);
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
	
	//echo "connected";
	
	return $mysqliLink;
}
function getCollegeData($id){

	$mysqliLink = connectToDB();
	
	//query to get the data back for us
	//data back stored in var query
	$query = $mysqliLink->query("SELECT * FROM college_rating WHERE p_id=$id");
	
	//two variables to store the back data
	$title = "";
	$desc = "";


	if ($row = $query->fetch_object()){
	
		$title = $row -> name;
		$desc= $row -> description;

	}

	$html='<h2>'.$title.'</h2>';
	$html.='<p>'.$desc.'</p>';
	
	//send back to javascript 
	
	
	
	echo $title."*".$desc;
}

//all the variables in php start with a dollar sign
function getPageData($pageName){

	$mysqliLink = connectToDB();
	
	//query to get the data back for us
	//data back stored in var query
	$query = $mysqliLink->query("SELECT * FROM college_rating");
	
	//two variables to store the back data
	$title = "";
	$html = "";


	//how can you 
	while ($row = $query->fetch_object()){
	
		$title = $row -> name;
		$id= $row -> p_id;
		$html .= ' <li onclick="ClickSchool('.$id.')"><a>' . $title . '</a></li> ';

	}
	
	//send back to javascript 
	
	
	
	echo $html;
}


function getReviews($fieldName, $schoolName){

	$mysqliLink = connectToDB();
	
	//query to get the data back for us
	//data back stored in var query
	$query = $mysqliLink->query("SELECT * FROM reviews WHERE school='$schoolName' and field='$fieldName'");
	
	//two variables to store the back data
	$myCountry = "";
	$myYear = "";
	$myReview = "";
	$html = "";

	while ($row = $query->fetch_object()){
	
		$myCountry= $row -> country;

		$myYear= $row -> year;
		$myReview=$row -> review;
		$html .= '<p id="aReview"> <strong> Country: </strong>'.$myCountry.'<strong>        Year: </strong>'.$myYear.'<br><strong> Review: </strong>'.$myReview.'</p>';

	}
	
	//send back to javascript 
	
	
	echo $html;
}

?>

