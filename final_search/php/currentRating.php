<?php


if(isset($_POST['myID']) and isset($_POST['myField']) ){
    
	getCollegeData($_POST['myID'],$_POST['myField']);
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

function getCollegeData($id, $field){

	$mysqliLink = connectToDB();
	
	//query to get the data back for us
	//data back stored in var query
	$query = $mysqliLink->query("SELECT * FROM college_rating WHERE p_id=$id");
	
	$rating = -1;

	
	if ($row = $query->fetch_object()){
	
		if(strpos($field, 'Overall') !== false){
	
			$rating= $row -> OverallRating;
	
		}
		
		elseif(strpos($field, 'Inclusivity') !== false){
	
			$rating= $row -> InclusiveRating;
	
		}
		
		elseif(strpos($field, 'Aid') !== false){
	
			$rating= $row -> AidRating;
	
		}
		
		elseif(strpos($field, 'Professional') !== false){
	
			$rating= $row -> ProfRating;
	
		}
		
		elseif(strpos($field, 'Graduation') !== false){
	
			$rating= $row -> GradRating;
	
		}
	
	
		elseif(strpos($field, 'Engineering') !== false){
	
			$rating= $row -> EngRating;
	
		}
		
		elseif(strpos($field, 'Computer') !== false){
	
			$rating= $row -> CSRating;
	
		}
		
		elseif(strpos($field, 'Math') !== false){
	
			$rating= $row -> MFRating;
	
		}
		
		elseif(strpos($field, 'Food') !== false){
	
			$rating= $row -> FoodRating;
	
		}
		
	}
	
	echo $rating;
}


?>

