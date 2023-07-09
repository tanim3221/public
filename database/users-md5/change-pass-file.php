<?php
session_start();

if(isset($_SESSION['id'])){
	$sql = "SELECT * FROM lifemembers WHERE id =" .$_SESSION['id'];
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
}


if(isset($_POST['btn-update'])){


date_default_timezone_set('Asia/Dhaka');


        $pass = md5($_POST['pass']);
	$newpass = md5($_POST['newpass']);
	$confirmpass = md5($_POST['confirmpass']);
	$curDate = date("d-m-Y H:i:sa");

	$check= mysqli_query($conn,"SELECT Password FROM lifemembers WHERE Password='$pass' AND id=".$_SESSION['id']);
	
	
	if ($pass == $row['Password']){ 
	
	    if($newpass == $confirmpass){
		
	$update = "UPDATE lifemembers SET Password='$newpass', PassResetTime='$curDate' WHERE id=". $_SESSION['id'];
	
	$up = mysqli_query($conn, $update);
	
	echo "<script>alert('Successfully updated your password.'); window.location='users-login.php'</script>";
	
	} else {
		echo "<script>alert('Confirm password not matched, please try again.'); window.location='change-pass.php'</script>";
	}
}  else {
echo "<script>alert('Current password not matched, please try again.'); window.location='change-pass.php'</script>";
}

}

?>

<h4 class="text-center text-bold mt-1x">Change Password</h4>
<div class="col-md-8 col-md-offset-2 mt-3x">
<form action="" class="login" id="login" autocomplete="on" method="post">

<label for="" class="text-uppercase text-sm">Current Password </label>
				<input type="password" placeholder="Current Password" name="pass" class="form-control mb">

				<label for="" class="text-uppercase text-sm">New Password</label>
				<input type="password" placeholder="New Password" name="newpass" class="form-control mb">

				<label for="" class="text-uppercase text-sm">Confirm New Password</label>
				<input type="password" placeholder="Confirm New Password" name="confirmpass" class="form-control mb">

			

				<button class="btn btn-primary btn-block " name="btn-update" type="submit"  value="Login" >Change Password</button>
					

			</form>
			</div>