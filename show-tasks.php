<?php 
session_start();
include 'db_conn.php';

$user_name = $_SESSION['user_name'];

$sql = "SELECT * FROM tasks where user_name = '$user_name'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

?>

<li>
    <span class="text"><?php echo $row['title']; ?>
		<!--<button type="submit" class="btn1">Publish</button>-->   
    </span>
    <i id="removeBtn" class="icon fa fa-trash" data-id="<?php echo $row['id']; ?>"></i>    
    
</li>

<?php
    }
    echo '<div class="pending-text">You have ' . mysqli_num_rows($result) . ' pending tasks.</div>';
} else {
    echo "<li><span class='text'>No Record Found.</span></li>";
}

?>