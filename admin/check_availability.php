<?php 
require_once("connect.php");

if(!empty($_POST["mobile"])) {
	$result = mysqli_query($conn,"SELECT count(*) FROM member WHERE Mobile='" . $_POST["mobile"] . "' AND YearM = CURDATE()");
	$row = mysqli_fetch_row($result);
	$user_count = $row[0];
	if($user_count>0) 
		echo "<span style='color:red'> Mobile Number already exist</span>";
	else 
		echo "<span style='color:green'></span>";
}

if(!empty($_POST["mobile"])) {
	$result1 = mysqli_query($conn,"SELECT count(*) FROM lifemembers WHERE Mobile='" . $_POST["mobile"] . "'");	
	$row1 = mysqli_fetch_row($result1);
	$user_count = $row1[0];
	if($user_count>0) 
		echo "<span style='color:red'> Mobile Number already exist</span>";
	else 
		echo "<span style='color:green'></span>";
}
// End code check username
?>
