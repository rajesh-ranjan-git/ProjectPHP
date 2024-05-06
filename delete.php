<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "mydb";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $database);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$id = $_GET["id"];

	if($id != 'deleteAll'){
		$sql = "DELETE FROM records WHERE id = '$id'";
	} else {
		$sql = "DELETE FROM records";
	}

	if ($conn->query($sql) === TRUE) {
    	echo '<center><h1>Records Deleted Succesfully....!!!</h1></center>
    			<script>window.location.href = "records.php";</script>';
	} else {
    	echo "Error deleting record: " . $conn->error;
	}


?>