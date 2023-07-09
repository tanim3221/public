<?php
session_start();
error_reporting(0);

if(strlen($_SESSION['alogin'])==0)
	{	
header('location:login.php');
}
else{

$conn = new PDO('mysql:host=localhost; dbname=ruaaa_v2','root', ''); 

$get_id=$_REQUEST['id'];

$text = $_POST['text'];
$expire = $_POST['expire'];


$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "UPDATE activate SET text='$text', expire='$expire' WHERE id = '$get_id' ";

$conn->exec($sql);
echo "<script>alert('Successfully Changed.'); window.location='settings-status.php'</script>";
}?>