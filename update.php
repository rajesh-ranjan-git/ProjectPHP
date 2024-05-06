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

	$id = $_POST['idd'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];

	if($name != ''){
		$sql = "UPDATE records SET name = '$name' WHERE id = '$id'";
		$conn->query($sql);
	} 

	if($email != ''){
		$sql = "UPDATE records SET email = '$email' WHERE id = '$id'";
		$conn->query($sql);
	} 

	if($phone != ''){
		$sql = "UPDATE records SET phone = '$phone' WHERE id = '$id'";
		$conn->query($sql);
	} 

	if ($conn->query($sql) === TRUE) {
    	echo '<center><h1>Records Updated Succesfully....!!!</h1></center>
	    	<script>window.location.href = "records.php";</script>';
				
	} else {
    	echo "Error updating record: " . $conn->error;
	}

	$conn->close();
?>