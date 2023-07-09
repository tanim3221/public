<?php
session_start();
error_reporting(0);
include('users/inc/connect.php');
if (!isset($_SESSION['loggedin']))
	{ 
header('location:users-login.php');
exit();
}
else{ ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('head.php'); ?>
</head>

	<body>

		<div class="container-fluid">

			
				<?php include('header.php'); ?>
			

			<div class="container-body">
				<?php include("users/change-pass-file.php");?>
			</div>

			<div class="container-footer">
				<?php include('footer.php'); ?>
			</div>

		</div>

	</body>
</html>

<?php } ?>