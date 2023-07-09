<?php
session_start();

if(isset($_SESSION['id'])){
	$sql = "SELECT * FROM lifemembers WHERE id =" .$_SESSION['id'];
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
}


if(isset($_POST['btn-update'])){


date_default_timezone_set('Asia/Dhaka');


        $pass = base64_encode($_POST['pass']);
	$newpass = base64_encode($_POST['newpass']);
	$confirmpass = base64_encode($_POST['confirmpass']);
	$curDate = date("d-m-Y H:i:sa");

	$check= mysqli_query($conn,"SELECT Password FROM lifemembers WHERE Password='$pass' AND id=".$_SESSION['id']);
	
	
	if ($pass == $row['Password']){ 
	
	    if($newpass == $confirmpass){
		
	$update = "UPDATE lifemembers SET Password='$newpass', PassResetTime='$curDate' WHERE id=". $_SESSION['id'];
	
	$up = mysqli_query($conn, $update);
	
	echo "<script>alert('Successfully updated your password.'); window.location='index.php'</script>";
	
	} else {
		echo "<script>alert('Confirm password not matched, please try again.'); window.location='change-pass.php'</script>";
	}
}  else {
echo "<script>alert('Current password not matched, please try again.'); window.location='change-pass.php'</script>";
}

}

?>
<p><h2 class="GrayBlue22b"> Change Password <br> <?php echo $row['MemId']; ?> </h2></p>
        
<div class="col-md-8 col-md-offset-2 mt-3x">
<form action="" class="login" id="login" autocomplete="on" method="post">

<label for="" class="text-uppercase text-sm">Current Password </label>
				<input type="password" placeholder="Current password" name="pass" class="form-control mb" required>

				<label for="" class="text-uppercase text-sm">New Password</label>
				<input type="password" placeholder="New password" name="newpass" class="form-control mb" required>

				<label for="" class="text-uppercase text-sm">Confirm New Password</label>
				<input type="password" placeholder="Confirm new password" name="confirmpass" class="form-control mb" required>

			

				<button class="btn btn-primary btn-block " name="btn-update" type="submit"  value="Login" >Change Password</button>
					

			</form>
			</div>