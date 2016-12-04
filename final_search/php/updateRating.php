<?php


if(isset($_POST['myID']) and isset($_POST['myField']) and isset($_POST['myRating']) ){
	updateRating($_POST['myID'],$_POST['myField'],$_POST['myRating']);
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

function updateRating($id, $field, $newRating){

	$mysqliLink = connectToDB();
	
	//query to get the data back for us
	//data back stored in var query
	$query = $mysqliLink->query("SELECT * FROM college_rating WHERE p_id=$id");
	
	$OldRating;
	$OldCount;
	
	if ($row = $query->fetch_object()){
	
		if(strpos($field, 'Overall') !== false){
	
			$OldRating = $row -> OverallRating;
			$OldCount = $row -> OverallCount;
			
			$newCount = $OldCount + 1; 
	
			$newScore = ($OldRating * $OldCount + $newRating) / $newCount;
	
			//四舍五入
			$newScore = round($newScore);
			
			//store back to database
			$sql = "UPDATE college_rating SET OverallRating = $newScore WHERE p_id = $id";
			
			if (mysqli_query($mysqliLink, $sql)) {
    			
    			
    			
			} else {
    			echo "Error updating record: " . mysqli_error($mysqliLink);
			}
			
			$sql1 = "UPDATE college_rating SET OverallCount = $newCount WHERE p_id = $id";
			
			if (mysqli_query($mysqliLink, $sql1)) {
			
				echo "Your rating has been recorded.";
    			
			} else {
    			echo "Error updating record: " . mysqli_error($mysqliLink);
			}
		}
		
		elseif(strpos($field, 'Inclusivity') !== false){
	
			$OldRating = $row -> InclusiveRating;
			$OldCount = $row -> InclusiveCount;
			
			$newCount = $OldCount + 1; 
	
			$newScore = ($OldRating * $OldCount + $newRating) / $newCount;
			
			//四舍五入
			$newScore = round($newScore);
			
			//store back to database
			$sql = "UPDATE college_rating SET InclusiveRating = $newScore WHERE p_id = $id";
			
			if (mysqli_query($mysqliLink, $sql)) {
    			
			} else {
    			echo "Error updating record: " . mysqli_error($mysqliLink);
			}
			
			$sql1 = "UPDATE college_rating SET InclusiveCount = $newCount WHERE p_id = $id";
			
			if (mysqli_query($mysqliLink, $sql1)) {
    			echo "Your rating has been recorded.";
			} else {
    			echo "Error updating record: " . mysqli_error($mysqliLink);
			}
	
		}
		
		elseif(strpos($field, 'Aid') !== false){
	
			$OldRating = $row -> AidRating;
			$OldCount = $row -> AidCount;
			
			$newCount = $OldCount + 1; 
	
			$newScore = ($OldRating * $OldCount + $newRating) / $newCount;
			
			//四舍五入
			$newScore = round($newScore);
			
			//store back to database
			$sql = "UPDATE college_rating SET AidRating = $newScore WHERE p_id = $id";
			
			if (mysqli_query($mysqliLink, $sql)) {
    			
			} else {
    			echo "Error updating record: " . mysqli_error($mysqliLink);
			}
			
			$sql1 = "UPDATE college_rating SET AidCount = $newCount WHERE p_id = $id";
			
			if (mysqli_query($mysqliLink, $sql1)) {
    			echo "Your rating has been recorded.";
			} else {
    			echo "Error updating record: " . mysqli_error($mysqliLink);
			}
		}
		
		elseif(strpos($field, 'Professional') !== false){
	
			$OldRating = $row -> ProfRating;
			$OldCount = $row -> ProfCount;
			
			$newCount = $OldCount + 1; 
	
			$newScore = ($OldRating * $OldCount + $newRating) / $newCount;
			
			//四舍五入
			$newScore = round($newScore);
			
			//store back to database
			$sql = "UPDATE college_rating SET ProfRating = $newScore WHERE p_id = $id";
			
			if (mysqli_query($mysqliLink, $sql)) {
    			
			} else {
    			echo "Error updating record: " . mysqli_error($mysqliLink);
			}
			
			$sql1 = "UPDATE college_rating SET ProfCount = $newCount WHERE p_id = $id";
			
			if (mysqli_query($mysqliLink, $sql1)) {
    			echo "Your rating has been recorded.";
			} else {
    			echo "Error updating record: " . mysqli_error($mysqliLink);
			}
		}
		
		elseif(strpos($field, 'Graduation') !== false){
	
			$OldRating = $row -> GradRating;
			$OldCount = $row -> GradCount;
			
			$newCount = $OldCount + 1; 
	
			$newScore = ($OldRating * $OldCount + $newRating) / $newCount;
			
			//四舍五入
			$newScore = round($newScore);
			
			//store back to database
			$sql = "UPDATE college_rating SET GradRating = $newScore WHERE p_id = $id";
			
			if (mysqli_query($mysqliLink, $sql)) {
    			
			} else {
    			echo "Error updating record: " . mysqli_error($mysqliLink);
			}
			
			$sql1 = "UPDATE college_rating SET GradCount = $newCount WHERE p_id = $id";
			
			if (mysqli_query($mysqliLink, $sql1)) {
    			echo "Your rating has been recorded.";
			} else {
    			echo "Error updating record: " . mysqli_error($mysqliLink);
			}
		}
	
	
		elseif(strpos($field, 'Engineering') !== false){
	
			$OldRating = $row -> EngRating;
			$OldCount = $row -> EngCount;
			
			$newCount = $OldCount + 1; 
	
			$newScore = ($OldRating * $OldCount + $newRating) / $newCount;
			
			//四舍五入
			$newScore = round($newScore);
			
			//store back to database
			$sql = "UPDATE college_rating SET EngRating = $newScore WHERE p_id = $id";
			
			if (mysqli_query($mysqliLink, $sql)) {
    			
			} else {
    			echo "Error updating record: " . mysqli_error($mysqliLink);
			}
			
			$sql1 = "UPDATE college_rating SET EngCount = $newCount WHERE p_id = $id";
			
			if (mysqli_query($mysqliLink, $sql1)) {
    			echo "Your rating has been recorded.";
			} else {
    			echo "Error updating record: " . mysqli_error($mysqliLink);
			}
		}
		
		elseif(strpos($field, 'Computer') !== false){
	
			$OldRating = $row -> CSRating;
			$OldCount = $row -> CSCount;
			
			$newCount = $OldCount + 1; 
	
			$newScore = ($OldRating * $OldCount + $newRating) / $newCount;
			
			//四舍五入
			$newScore = round($newScore);
			
			//store back to database
			$sql = "UPDATE college_rating SET CSRating = $newScore WHERE p_id = $id";
			
			if (mysqli_query($mysqliLink, $sql)) {
    			
			} else {
    			echo "Error updating record: " . mysqli_error($mysqliLink);
			}
			
			$sql1 = "UPDATE college_rating SET CSCount = $newCount WHERE p_id = $id";
			
			if (mysqli_query($mysqliLink, $sql1)) {
    			echo "Your rating has been recorded.";
			} else {
    			echo "Error updating record: " . mysqli_error($mysqliLink);
			}
		}
		
		elseif(strpos($field, 'Math') !== false){
	
			$OldRating = $row -> MFRating;
			$OldCount = $row -> MFCount;
			
			$newCount = $OldCount + 1; 
	
			$newScore = ($OldRating * $OldCount + $newRating) / $newCount;
			
			//四舍五入
			$newScore = round($newScore);
			
			//store back to database
			$sql = "UPDATE college_rating SET MFRating = $newScore WHERE p_id = $id";
			
			if (mysqli_query($mysqliLink, $sql)) {
    			
			} else {
    			echo "Error updating record: " . mysqli_error($mysqliLink);
			}
			
			$sql1 = "UPDATE college_rating SET MFCount = $newCount WHERE p_id = $id";
			
			if (mysqli_query($mysqliLink, $sql1)) {
    			echo "Your rating has been recorded.";
			} else {
    			echo "Error updating record: " . mysqli_error($mysqliLink);
			}
		}
		
		elseif(strpos($field, 'Food') !== false){
	
			$OldRating = $row -> FoodRating;
			$OldCount = $row -> FoodCount;
			
			$newCount = $OldCount + 1; 
	
			$newScore = ($OldRating * $OldCount + $newRating) / $newCount;
			
			//四舍五入
			$newScore = round($newScore);
			
			//store back to database
			$sql = "UPDATE college_rating SET FoodRating = $newScore WHERE p_id = $id";
			
			if (mysqli_query($mysqliLink, $sql)) {
    			
			} else {
    			echo "Error updating record: " . mysqli_error($mysqliLink);
			}
			
			$sql1 = "UPDATE college_rating SET FoodCount = $newCount WHERE p_id = $id";
			
			if (mysqli_query($mysqliLink, $sql1)) {
    			echo "Your rating has been recorded.";
			} else {
    			echo "Error updating record: " . mysqli_error($mysqliLink);
			}
		}
	}
	
	
}


?>

