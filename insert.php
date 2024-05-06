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

	$id = $_POST["idd"];
	$name = $_POST["name"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];

	$sql = "CREATE TABLE IF NOT EXISTS mydb.records (
        `ID` int(4) PRIMARY KEY,
        `Name` varchar(50) NOT NULL,
        `Email` varchar(100) NOT NULL UNIQUE,
        `Phone` int(12) NOT NULL
        )";
	
	$conn->query($sql);

	$sql = "INSERT INTO records (ID, Name, Email, Phone) VALUES ('$id', '$name', '$email', '$phone')";

	if ($conn->query($sql) === TRUE) {
	    echo '<center><h1>New record created successfully.</h1></center>
	    		<script>window.location.href = "home.html";</script>';
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>