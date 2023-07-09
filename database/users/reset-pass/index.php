<?php

if(isset($_POST["Email"]) && (!empty($_POST["Email"]))){
$Email = $_POST["Email"];
$Email = filter_var($Email, FILTER_SANITIZE_EMAIL);
$Email = filter_var($Email, FILTER_VALIDATE_EMAIL);
if (!$Email) {
  	$error .="<div id='msg-error' class='alert alert-danger'><strong>Invalid Email address!</strong> Please type a valid Email address! <br> Please re-check your email address or contact with RUAAA to reset your password</div>";
  	header("Refresh:2; url= ".$_SERVER['HTTP_REFERER']);
	}else{
	$sel_query = "SELECT * FROM `lifemembers` WHERE Email='".$Email."'";
	$results = mysqli_query($con,$sel_query);
	$row = mysqli_num_rows($results);
	if ($row==""){
		$error .= "<div id='msg-error' class='alert alert-danger'><strong>Sorry!</strong> Couldn't find any email address.<br> Please re-check your email address or contact with RUAAA to reset your password</div>";
	    header("Refresh:2; url= ".$_SERVER['HTTP_REFERER']);

		}
	}
	if($error!=""){
	echo "<div class='error'>".$error."</div>
	<br /><a href='javascript:history.go(-1)'>Go Back</a>";
		}else{
	$expFormat = mktime(date("H"), date("i"), date("s"), date("m")  , date("d")+1, date("Y"));
	$expDate = date("Y-m-d H:i:s",$expFormat);
	$key = md5($Email);
	$addKey = substr(md5(uniqid(rand(),1)),3,10);
	$key = $key . $addKey;
// Insert Temp Table
mysqli_query($con,
"INSERT INTO `password_reset_temp` (`Email`, `key`, `expDate`)
VALUES ('".$Email."', '".$key."', '".$expDate."');");

$output='<p>Dear Alumni,</p>';
$output.='<p>Please click on the following link to reset your password.</p>';
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p><a href="https://www.ruaaa.org/member/database/reset-pass.php?key='.$key.'&Email='.$Email.'&action=reset" target="_blank">https://www.ruaaa.org/member/database/reset-pass.php?key='.$key.'&Email='.$Email.'&action=reset</a></p>';		
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p>Be sure to copy the entire link into your browser. The link will expire after 1 day due to security reasons.</p>';
$output.='<p>No action is required unless you request this forgotten password email, your password will not be reset. But if you want to log in and if anyone can guess your password then change the password.</p>';   	
$output.='<p>Thanks,<br><br>Rajshahi University Accounting Alumni Association<br>University of Rajshahi.</p>';
$body = $output; 
$subject = "RUAAA Database Password Reset System";

$email_to = $Email;
$fromserver = "noreply-info@ruaaa.org"; 
require("PHPMailer/PHPMailerAutoload.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host = "mail.ruaaa.org"; // Enter your host here
$mail->SMTPAuth = true;
$mail->Username = "noreply-info@ruaaa.org"; // Enter your Email here
$mail->Password = "qVq7RWXnKzvn"; //Enter your passwrod here
$mail->Port = 26;
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->IsHTML(true);
$mail->From = "noreply-info@ruaaa.org";
$mail->FromName = "RUAAA";
$mail->Sender = $fromserver; // indicates ReturnPath header
$mail->Subject = $subject;
$mail->Body = $body;
$mail->AddAddress($email_to);
if(!$mail->Send()){
echo "Mailer Error: " . $mail->ErrorInfo;
}else{
echo "<div id='msg-success' class='alert alert-success'><strong>Congratulation!</strong> An email has been sent to you with instructions on how to reset your password.  <a href='index.php'>Go Home</a></div>";
header("Refresh:2; url=users-login.php");

	}

		}	

}else{
?>
<h4 class="text-center text-bold mt-1x">Provide your Email Address</h4>
               <div class="col-md-8 col-md-offset-2 mt-3x">
								<form method="post" action=""  class="login" id="login" name="reset">
									<div class="form-group">
									<label for="" class="text-uppercase text-sm">Enter your email address </label>								
									<input class="form-control mb" type="Email" name="Email" placeholder="abc@email.com" />
									</div>
									<input class="btn btn-primary btn-block " type="submit" value="Reset Password"/>
									</form>
							</div>
						

<?php } ?>
