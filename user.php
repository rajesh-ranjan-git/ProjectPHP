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

	$uname = $_POST["uname"];
	$pass = $_POST["pass"];
	
	$sql = "SELECT * FROM user";

	$result = $conn->query($sql);
	if ($result->num_rows > 0) {

	// output data of each row

		while($row = $result->fetch_assoc()) {
										
			if ($uname == $row["user_id"] && $pass == $row["pass"]) {
				echo '<script>window.location.href = "home.html";</script>';
			}
		}
	}

	echo "<script>alert('Oops ! Possibly Incorrect Ceredentials...!!');
			window.location.href = 'index.html';</script>";

	$conn->close();
?>