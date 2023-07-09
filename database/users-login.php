<?php
session_start();
error_reporting(0);
include('users/inc/connect.php');
if (isset($_SESSION['loggedin'])){ 
echo "<script>alert('You are already loggedin. Please check menu to update photo and Informations.'); window.location='index.php'</script>";
}
else{ ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('config.php'); ?>
	<?php include('head.php'); ?>
</head>

	<body>

		<div class="container-fluid">

			
				<?php include('header.php'); ?>
			

			<div class="container-body">
				<?php include("users/login.php");?>
			</div>

			<div class="container-footer">
				<?php include('footer.php'); ?>
			</div>

		</div>

	</body>
</html>
<?php } ?>