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
		<a href="friends.php">Friends</a>
		<a class="active" href="published_lists.php">Published Lists</a>	
		<a href="logout.php" >Logout</a>	
	</div>

	<div>
	<h1 style ="text-align: center;">All published lists for you</h1><br>
	<div class="card-body" style = "text-align: center; width: 40%; margin-left:auto; margin-right:auto;">
		<div class="table-responsive" >
			<table class="table table-bordered" style = "background-color: white; border: black;">
			<thead>
			<?php
		session_start();
		include 'db_conn.php';	
		// za PUBLIC lista
		$sql = "SELECT * FROM users WHERE id != '".$_SESSION['id']."'";
		$result = mysqli_query($conn, $sql);			

		while($row=mysqli_fetch_array($result)){
			//ova e za public
			$q = "SELECT title FROM tasks WHERE user_name = '".$row['user_name']."' and public = '1' ";
			$r = mysqli_query($conn, $q);
			$num = mysqli_num_rows($r);		
			

			if($num > 0 ){		
	?>		
				  <tr>
					<th scope="col" style = "background-color: #1690A7;"><?php echo $row['user_name']; ?></th>											
				  </tr>
				</thead>	
				<tbody>


				<?php				
				while($row1 = mysqli_fetch_array($r)){
					echo "<p>";
				?>
					<tr> <!-- redica -->
						<td><?php echo $row1['title']; ?></td>
					</tr>
				<?php								
				}				
			}	
		}//while-ot	
		
		// za FRIENDS lista
		$sql11 = " SELECT * FROM friendship WHERE id_user2 = '".$_SESSION['id']."'";
		$result11 = mysqli_query($conn, $sql11);			

		while($row11=mysqli_fetch_array($result11)){
			//ova e za public
			$q12 = "SELECT title FROM tasks WHERE user_name = '".$row11['user_name1']."' and friends = '1' ";
			$r12 = mysqli_query($conn, $q12);
			$num12 = mysqli_num_rows($r12);		
			

			if($num12 > 0 ){		
	?>		
				  <tr>
					<th scope="col" style = "background-color: #1690A7;"><?php echo $row11['user_name1']; ?></th>											
				  </tr>
				</thead>	
				<tbody>


				<?php				
				while($row12 = mysqli_fetch_array($r12)){
					echo "<p>";
				?>
					<tr> <!-- redica -->
						<td><?php echo $row12['title']; ?></td>
					</tr>
				<?php								
				}				
			}	
		}//while-ot	
		
	?>
				<tbody>
				</table>
		</div>
	<div>
	<div>
</body>
</html>