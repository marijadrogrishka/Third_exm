<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" type="text/css" href="style1.css">

	<title>Todo List App - Pure Coding</title>
</head>
<body>
	<div class="topnav">
		<a class="active" href="index1.php">Home</a>
		<a href="friends.php">Friends</a>
		<a href="published_lists.php">Published Lists</a>
		<a href="logout.php" >Logout</a>		
	</div>
<br>
	<?php 
		session_start();

		if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 	?>
	<h1 style="color: white; text-align: center;">Hello, <?php echo $_SESSION['name']; ?></h1>
    
	
	<?php 
	}else{
		header("Location: index.php");
		exit();
	}
?>
<br><br>
	<div class="wrapper" style = "margin-left:auto; margin-right:auto; margin-top: auto; margin-bottom: auto;">
		

		<h2 class="title">Create To Do List</h2>
		<div class="inputFields">
			<input type="text" id="taskValue" placeholder="Enter a task.">		
			
			
			<button type="submit" id="addBtn" class="btn"><i class="fa fa-plus"></i></button>			
			
		</div>
		<div class="content">
			 
			<ul id="tasks">
				
			</ul>
		</div>
		<?php
		//session_start(); 
		include 'db_conn.php';
		
		$user_name = $_SESSION['user_name'];
			// Publish to all
			if(isset($_POST['btnPublish'])){
				echo "Button is clicked";

				// da se objavi ili public ili friends, zatoa edno 1 ednoto 0, da ne mozi dvete da se 1
				$sql = "UPDATE tasks SET public = '1', friends = '0' where user_name = '$user_name';";
				$result = mysqli_query($conn, $sql);

			}
			// Publish to Friends
			if(isset($_POST['btnPublish1'])){
				echo "Button is clicked";
				
				// da se objavi ili public ili friends, zatoa edno 1 ednoto 0, da ne mozi dvete da se 1
				$sql = "UPDATE tasks SET friends = '1', public = '0' where user_name = '$user_name';";
				$result = mysqli_query($conn, $sql);

			}

		?>
		<form method="POST">
		<button type="submit" name="btnPublish" value="TO ALL" class="inputSbm"  style="width: 167px; height: 100%;">Publish To ALL</button>
		<button type="submit" name="btnPublish1" value="TO Friends" class="inputSbm" style="width: 167px; height: 100%;">Publish To Friends</button>	
		</form>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script>
		$(document).ready(function() {
			// Show Tasks
			function loadTasks() {
				$.ajax({
					url: "show-tasks.php",
					type: "POST",
					success: function(data) {
						$("#tasks").html(data);
					}
				});
			}

			loadTasks();

			// Add Task
			$("#addBtn").on("click", function(e) {
				e.preventDefault();

				var task = $("#taskValue").val();

				$.ajax({
					url: "add-task.php",
					type: "POST",
					data: {task: task},
					success: function(data) {
						loadTasks();
						$("#taskValue").val('');
						if (data == 0) {
							alert("Something wrong went. Please try again.");
						}
					}
				});				

			});		

			// Remove Task
			$(document).on("click", "#removeBtn", function(e) {
				e.preventDefault();
				var id = $(this).data('id');
				
				$.ajax({
					url: "remove-task.php",
					type: "POST",
					data: {id: id},
					success: function(data) {
						loadTasks();
						if (data == 0) {
							alert("Something wrong went. Please try again.");
						}
					}
				});
			});

			
		});
	</script>
</body>
</html>