

<?php

//store country 
if(isset($_POST['country']) and isset($_POST['year']) and isset($_POST['ReviewText'])and isset($_POST['field'])){

	storeForm($_POST['country'], $_POST['year'],$_POST['ReviewText'],$_POST['field']);
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

function storeForm($country, $year, $review, $field){

	$conn = connectToDB();
	
	$sql = "INSERT INTO `Vanderbilt University`(`country`, `year`, `review`,`field`) VALUES ('$country','$year','$review','$field')";
			
	if ($conn->query($sql) === TRUE) {
    	echo "New record created successfully";
	} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	//close the connection when done. 
	$conn->close();
}

?>