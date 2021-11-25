<?php 
session_start(); 
include 'db_conn.php';

$task = $_POST['task'];
$user_name = $_SESSION['user_name'];
/*$check_box = $_POST["insert"];*/


$sql = "INSERT INTO tasks (title,user_name,public,friends) VALUES ('$task','$user_name','0','0')";
$result = mysqli_query($conn, $sql);

//bidejki e vnesen nov task, reset na objavenoto na 0 
$sql1 = "UPDATE tasks SET public = '0', friends = '0' where user_name = '$user_name';";
$result1 = mysqli_query($conn, $sql1);

if ($result) {
    echo 1;
} else {
    echo 0;
}

?>