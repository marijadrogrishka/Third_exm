<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css">

	<link rel="stylesheet" type="text/css" href="style1.css"> 
</head>
<body>
<div class="topnav">
		<a href="index1.php">Home</a>
		<a class="active" href="friends.php">Friends</a>
		<a href="published_lists.php">Published Lists</a>
		<a href="logout.php" >Logout</a>			
</div>
	<!-- My friends -->
	<div>
	<h1 style ="text-align: center;">My Friends</h1><br>
	<div class="card-body" style = "text-align: center; width: 40%; margin-left:auto; margin-right:auto;">
		<div class="table-responsive">
			<table class="table table-bordered" style = "background-color: white; border: black;">
				<thead>
				  <tr>
					<th scope="col">Id</th>
					<th scope="col">User Name</th>
					<!--<th scope="col">Name</th>-->
					<!--<th scope="col">Add</th>-->					
				  </tr>
				</thead>
				<tbody>
					<?php
					session_start();
						require('db_conn.php');

						$sl = 0;
						//$sql = "SELECT * FROM users WHERE id != '".$_SESSION['id']."'";
						$sql = "SELECT * FROM friendship as f inner join users as u on f.id_user1 = u.id WHERE u.id = '".$_SESSION['id']."'";
						$result = mysqli_query($conn, $sql);

						while($row=mysqli_fetch_array($result)){
							$sl++;

						
					?>
					<tr>
						<td><?php echo $sl; ?></td>
						<td><?php echo $row['user_name2']; ?></td>
						<!--<td><?php echo $row['name']; ?></td> -->
						<!--<td><button type="submit" id="addBtn" class="btn">ADD</button></td>	-->					
					</tr>
					<?php } ?>
				</tbody>
			  </table>
		</div>
	</div>
	</div>
</body>
</html>