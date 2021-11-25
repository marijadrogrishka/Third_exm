<?php 
session_start();
include 'db_conn.php';

$id = $_POST['id'];
$user_name = $_SESSION['user_name'];

$sql = "DELETE FROM tasks WHERE id='$id' and user_name = '$user_name'";
$result = mysqli_query($conn, $sql);

// izbrishan e task, reset na objavenoto, dali povtorno updaterinata lista sakame da bide objavena
$sql1 = "UPDATE tasks SET public = '0', friends = '0' where user_name = '$user_name';";
$result1 = mysqli_query($conn, $sql1);

if ($result) {
    echo 1;
} else {
    echo 0;
}

?>