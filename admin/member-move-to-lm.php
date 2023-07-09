<head>
<title>Moving to Alumni...</title>
<meta http-equiv="refresh" content="2; url=moved-from-member.php">
</head>
<?php
session_start();
error_reporting(0);
include('connect.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:login.php');
}
else{
if(isset($_GET['id']))
{
$id=$_GET['id'];
$msg=mysqli_query($conn,"INSERT INTO lifemembers ( MemId,Name,Mailing,Permanent,Mobile,Email,Profession,Designation,Organization, Bachelor, Master, RuaaaPost, status) SELECT MemId,Name,Mailing,Permanent,Mobile,Email,Profession,Designation,Organization, Bachelor, Master, RuaaaPost, status FROM member WHERE id='$id' ");
//$msg=mysqli_query($con,"delete from member where id='$adminid'");
$_SESSION['msg']="<div class='alert alert-success alert-dismissible'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Member moved to alumni successfully.</div>";
}
?>
<div class="redirect"  style="text-align:center; margin-top:20px;"> Member moved Life Members successfully.<br>You are redirecting to homepage...</div>
<?php } ?>