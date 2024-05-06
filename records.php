
<!DOCTYPE html>

<html>
	<head>

		<title>Records</title>

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

		<script>

			$(document).ready(function(){
			    sorting = {
				    sortedData: function(str){
				        if (str == ""){
					        $("#data").html("");
					        return;
				        } else { 
				            $.ajax({
				                url: 'sort.php?q='+str,
				            }).done(function(html){
				                 $("#data").html(html);
				            });
				        }
					}
				}

				$('.delete').click(function(){
					var Id = $(this).data('id');
					$.ajax({
						url: "delete.php",
						data: 'id='+Id
					}).done(function(data){
						$('#updateData').html(data);
					});

				});
			});

			$(document).ready(function(){
			    updating = {
				    updatedData: function(str){
				        if (str == ""){
					        $("#updateData").html("");
					        return;
				        } else { 
				            $.ajax({
				                url: 'edit.php?q='+str,
				            }).done(function(html){
				                 $("#updateData").html(html);
				            });
				        }
					}
				}
			});

		</script>

	</head>
	<body>
		<div class="container" id="updateData">
			<div class="col-sm-10 col-xs-12">
		  		<h2>Table Records</h2>
		  	</div>
		  	<div class="col-sm-2 col-xs-12" style="float:right; padding-top:20px">
				<form>
					<select name="dropdown" onchange="sorting.sortedData(this.value)" style="padding:10px; border-radius:5px;">
						<option hidden> Sort List</option>
						<option value="id">ID Ascending</option>
						<option value="id DESC">ID Descending</option>
						<option value="name">Name Ascending</option>
						<option value="name DESC">Name Descending</option>
						<option value="email">Email Ascending</option>
						<option value="email DESC">Email Descending</option>
						<option value="phone">Phone Ascending</option>
						<option value="phone DESC">Phone Descending</option>
					</select>
				</form>
			</div>

			<div class="col-sm-12" id="data">
				<table class="table table-hover">
					<thead>
					    <tr>
					        <th>ID</th>
					        <th>Name</th>
						    <th>Email</th>
						    <th>Phone</th>
						    <th style="text-align:center">
						    	<div class="btn btn-primary delete" data-id="deleteAll">DELETE ALL</div>
					  		</th>
						    <th style="text-align:center">UPDATE</th>
					    </tr>
				    </thead>
				    <tbody>

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
							$sql = "SELECT * FROM records";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {

								// output data of each row

							    while($row = $result->fetch_assoc()) {
										
									echo 	'<tr><td id="record">' . $row["ID"]. 
											'</td><td id="record">' . $row["Name"]. 
											'</td><td id="record">' . $row["Email"].
											'</td><td id="record">' . $row["Phone"]. 
											'</td><td style="text-align:center">
												
												<div class="btn btn-primary delete" data-id="' . $row["ID"]. '">DELETE</div>
												
											</td>
											<td style="text-align:center; padding-top:15px">
												<a href="#" class="btn btn-default" onclick="updating.updatedData(' . $row["ID"]. ')" style="font-weight:bold">EDIT</a>
											</td></tr>';
									
							    }

							} else {
								echo '<div class="row"><center><h1>No Records Found.</h1></center></div>
										<script>window.location.href = "home.html";</script>';
							}
						?>

					</tbody>
				</table>
				  <div class="row"  style="padding-top:20px">
					<div class="col-sm-2 col-xs-12">
						<div class="dropdown">
						  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" 
						  	style="width:100%">Search Records
						  <span class="caret"></span></button>
						  <ul class="dropdown-menu">
						    <li onclick="searchIdd()"><a href="#">By ID</a></li>
						    <li onclick="searchName()"><a href="#">By Name</a></li>
						    <li onclick="searchEmail()"><a href="#">By Email</a></li>
						    <li onclick="searchPhone()"><a href="#">By Phone</a></li>
						  </ul>								  	
						</div>
					</div>
					<div class="col-sm-12 col-xs-12">
						<form action="search.php" method="post">
					  	  <div class="form-group" id="search-idd" style="display:none">
						    <label for="id">ID :</label>
						    <input type="text" class="form-control" id="idd" name="idd" placeholder="Enter your ID">
						  </div>
					  	  <div class="form-group" id="search-name" style="display:none">
						    <label for="name">Name :</label>
						    <input type="name" class="form-control" id="name" name="name" placeholder="Enter your Name">
						  </div>
						  <div class="form-group" id="search-email" style="display:none">
						    <label for="email">Email:</label>
						    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
						  </div>
						  <div class="form-group" id="search-phone" style="display:none">
						    <label for="phone">Phone:</label>
						    <input type="phone" class="form-control" id="phone" name="phone" placeholder="Enter your phone">
						  </div>
						  
						  <button type="submit" class="btn btn-default" id="search-button" style="display:none">Search</button>
						</form>
					</div>
				</div>

				<div class="col-sm-2" style="padding:0;margin-top:20px">
					<a href="home.html" class="btn btn-default"><< Home</a>
				</div>
				<div class="col-sm-2" style="margin-right:-100px; margin-top:20px; float:right;">
					<a href="index.html" class="btn btn-default">Log Out</a>
				</div>

			</div>
		</div>
	</body>
</html>