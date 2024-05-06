		
<!DOCTYPE html>
<html>
	<head>

	<title>Edit Records</title>

		<meta charset="utf-8">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" src="css/bootstrap.css">
		<script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-theme.css">
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="style.css">
		<script src="script.js"></script>

	</head>
	<body>

		<div class="container" id="editData">

		  <h2>Update DataBase Entry</h2><br>
		  <h2>Updating Records for ID : 

		  	<?php
		  		$q = $_GET['q'];
		  		echo $q;
		  	?>

		  </h2><br>
		  
		  <form action="update.php" method="post">
		  	  <div class="form-group">
			    <label for="name">Name :</label>
			    <input type="name" class="form-control" id="name" name="name" placeholder="Enter your Name">
			  </div>
			  <div class="form-group">
			    <label for="email">Email:</label>
			    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
			  </div>
			  <div class="form-group">
			    <label for="phone">Phone:</label>
			    <input type="phone" class="form-control" id="phone" name="phone" placeholder="Enter your phone">
			  </div>
			  
			   	<?php
		  			$q = $_GET['q'];
		  			echo '<input type="hidden" name="idd" value=" ' . $q . ' ">';
		  		?>

		  		<button type="submit" class="btn btn-default">Update</button>
		  		
		  </form>

				<div class="col-sm-2" style="padding:0;margin-top:20px">
					<a href="home.html" class="btn btn-default"><< Home</a>
				</div>
				<div class="col-sm-2" style="margin-right:-100px; margin-top:20px; float:right;">
					<a href="index.html" class="btn btn-default">Log Out</a>
				</div>
		</div>
	</body>
</html>