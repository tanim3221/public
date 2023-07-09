<?php


if (isset($_GET["key"]) && isset($_GET["Email"])
&& isset($_GET["action"]) && ($_GET["action"]=="reset")
&& !isset($_POST["action"])){
$key = $_GET["key"];
$Email = $_GET["Email"];
$curDate = date("Y-m-d H:i:s");
$query = mysqli_query($con,"
SELECT * FROM `password_reset_temp` WHERE `key`='".$key."' and `Email`='".$Email."';");
$row = mysqli_num_rows($query);
if ($row==""){
$error .= '<div id="msg-error" class="alert alert-danger"><strong>Invalid Link!</strong> Maybe you have already used the key in which case it is deactivated.<br><br><a href="check-email-reset-pass.php">Click here</a> to reset password. </div>';
header("Refresh:2; url=index.php");
	}else{
	$row = mysqli_fetch_assoc($query);
	$expDate = $row['expDate'];
	if ($expDate >= $curDate){
	?>
    <br />
    



               <h4 class="text-center text-bold mt-1x">Provide your new password</h4>
               <div class="col-md-8 col-md-offset-2 mt-3x">
                  <form method="post" action="" name="update">
                     <input type="hidden" name="action" value="update" />
                     <div class="form-group">
                        <label for="" class="text-uppercase text-sm">Enter New Password:</label>
                        <input class="form-control mb"  type="password" name="pass1" id="pass1" maxlength="15" required />
                     </div>
                     <div class="form-group">
                        <label for="" class="text-uppercase text-sm">Confirm Password:</label>
                        <input type="password" class="form-control mb" name="pass2" id="pass2" maxlength="15" required/>
                     </div>
                     <input type="hidden" class="form-control mb" name="Email" value="<?php echo $Email;?>"/>
                     <input  class="btn btn-primary btn-block " type="submit" id="reset" value="Reset Password" />
                  </form>
               </div>




<?php
}else{
$error .= "<div id='msg-error' class='alert alert-danger'><strong>Link Expired!</strong> You are trying to use the expired link which as valid only 24 hours (1 days after request).</div>";

				}
		}
if($error!=""){
	echo "<div class='error'>".$error."</div><br /><a href='index.php' >Go Home</a>";
	header("Refresh:2; url=index.php");
	}			
} // isset Email key validate end

date_default_timezone_set("Asia/Dhaka");
if(isset($_POST["Email"]) && isset($_POST["action"]) && ($_POST["action"]=="update")){
$error="";
$pass1 = mysqli_real_escape_string($con,$_POST["pass1"]);
$pass2 = mysqli_real_escape_string($con,$_POST["pass2"]);
$Email = $_POST["Email"];
$curDate = date("d-m-Y H:i:sa");
if ($pass1!=$pass2){
		$error .= "<div id='msg-error' class='alert alert-danger'>Password do not match, both password should be same.</div>";
		header("Refresh:2; url= ".$_SERVER['HTTP_REFERER']);
		}
	if($error!=""){
		echo "<div class='error'>".$error."</div><br /><a href='javascript:history.go(-1)'>Go Back</a>";
		}else{

$pass1 = base64_encode($pass1);
mysqli_query($con,
"UPDATE `lifemembers` SET `Password`='".$pass1."', `PassResetTime`='".$curDate."' WHERE `Email`='".$Email."';");	

mysqli_query($con,"DELETE FROM `password_reset_temp` WHERE `Email`='".$Email."';");		
	
echo "<div id='msg-success' class='alert alert-success'><strong>Congratulations!</strong> Your Password has been updated successfully.<br> <a href='users-login.php'>Click here to login </a></div>";

header("Refresh:2; url=users-login.php");
		}		
}
?>
