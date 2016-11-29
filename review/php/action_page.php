

<?php

//store country 
if(isset($_POST['country']) and isset($_POST['year']) and isset($_POST['ReviewText'])){

	storeForm($_POST['country'], $_POST['year'],$_POST['ReviewText']);
	echo "form complete";
}


//connect to the database 
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

function storeForm($country, $year, $review){

	$conn = connectToDB();
	
	$sql = "INSERT INTO `Vanderbilt University`(`country`, `year`, `review`) VALUES ('$country','$year','$review')";
			
	if ($conn->query($sql) === TRUE) {
    	echo "New record created successfully";
	} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	//close the connection when done. 
	$conn->close();
}

?>