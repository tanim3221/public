<?php

session_start();
    require 'inc/proshow.php';
	
$conn = new PDO('mysql:host=localhost; dbname=ruaaa_v2','root', ''); 

$get_id=$_SESSION['id'];



$name = $Name;
$mobile = $Mobile ;

$image_file = $_FILES["image"]["name"];
   $image_file = preg_replace('/\\.[^.\\s]{3,4}$/', '', $image_file);
  $type  = $_FILES["image"]["type"]; //file name "image" 
  $size  = $_FILES["image"]["size"];
  $temp  = $_FILES["image"]["tmp_name"];
  
  $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
  $imagename = $name . "_" . $mobile . "_" .time() . "." . $ext;


$path="../../img/lm/".$imagename; //set upload folder path
  

   if(!file_exists($path)) //check file not exist in your upload folder path
   {

     move_uploaded_file($temp, "../../img/lm/" .$imagename);
   

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "UPDATE lifemembers SET image ='$imagename' WHERE id = '$get_id' ";

$conn->exec($sql);
echo "<script>alert('Successfully updated your photo.'); window.location='../change-photo.php'</script>";
} else {

echo "<script>alert('Something went wrong. Please try again.'); window.location='../change-photo.php'</script>";

}
?>