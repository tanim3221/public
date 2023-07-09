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

move_uploaded_file($_FILES["image"]["tmp_name"],"../img/m/" . $_FILES["image"]["name"]);			
$image=$_FILES["image"]["name"];


$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "UPDATE member SET image ='$image' WHERE id = '$get_id' ";

$conn->exec($sql);
echo "<script>alert('Successfully Updated!'); window.location='change-image-m.php'</script>";
}
?>