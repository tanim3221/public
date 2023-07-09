<?php 
include '../connect.php';
include 'sendemail.php'; 

if(isset($_GET['id']) && $_GET['member']=='lifeMember' ){
	$sql = "SELECT * FROM lifemembers WHERE id =".$_GET['id'];
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	
} elseif(isset($_GET['id']) && $_GET['member']=='general' ){
    $sql = "SELECT * FROM member WHERE id =".$_GET['id'];
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
} else {
    echo '<script>window.history.go(-1)</script>';
} ?>
<!DOCTYPE html>
<html>
<title>Sending Email to <?php echo $row ['Name'];?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://cdn.tiny.cloud/1/xq4fv0m3iwdl8ad5pndoc2206h0h8ibjx9pdwko1dyuzv05i/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<body>

<header class="w3-container w3-center w3-teal">
  <h3>Sending Email to <?php echo $row ['Name'];?> (<?php echo $row ['MemId'];?>)</h3>
</header>
<br>

<br>
<div class='w3-content'>
<form class="w3-container w3-border w3-round" method='POST' action=''>
	<h1 class='w3-center'>Mail Send System </h1><hr>
	<label class="w3-text-teal"><b>Email</b>&nbsp;&nbsp;<input type="checkbox" id="email_ad_check"></label>
  <input class="w3-input w3-border w3-round" type="text" value="<?php echo $row ['Email'];?>" id="email_ad" name='email' placeholder='Enter email' readonly>
	<br>
  <label class="w3-text-teal"><b>Subject</b></label>
  <input class="w3-input w3-border w3-round" type="text" name='mail_sub' placeholder='Enter your subject' required>
	<br>
  <label class="w3-text-teal"><b>Details Message</b></label>
  <textarea rows="20" class="w3-input w3-border w3-round" type="text" id="mail-details" value="" name='mail_text' placeholder='Enter your details messgage' required>Hello <b><?php echo $row['Name'];?> (<?php echo $row['MemId'];?>)</b>,<br><br><br><br><br><br><br><br><br><br><br><br>Best Regards,<br>Rajshahi University Accounting Alumni Association (RUAAA)</textarea>
  
  <input class="w3-btn w3-blue w3-round w3-margin-top" type="submit" name='submit' value='Send Mail'>
  <br><br>
  
<?php
	if(isset($_POST['submit'])){
	    $name = $row ['Name'];
		$email = $_POST ['email'];
		$mail_sub = $_POST['mail_sub'];
		$mail_text = $_POST['mail_text'];
	
		$mail_body = $mail_text;
		$mail = send_mail($email, $mail_sub, $mail_body);
		if($mail == 1){
			echo '<div class="w3-panel w3-green w3-round">
				  <h3>Success!</h3>
				  <p>Your Email Has been sent to '. $row ['Name'].' ('.$row ['MemId'].')</p>
				</div>';
		}else{
			echo '<div class="w3-panel w3-round w3-red">
				  <h3>Failed!</h3>
				  <p>Try Again!<p>
				</div>';
		}
	}
?>
</form>
</div>
<br>
<footer class="w3-container w3-center w3-teal">
    <p class="copyright">RUAAA &copy;<?php echo date("Y"); ?></p>
</footer>
</body>
</html>
  <script>tinymce.init({
      selector:'textarea#mail-details',
        plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinymcespellchecker',
      setup: function (editor) {
        editor.on('change', function () {
            editor.save();
        });
    }
});
</script>

<script>
    $(document).ready(function(){
        $('#email_ad_check').click(function(){
            if ($(this).prop("checked")== true){
                $('#email_ad').attr('required', 'required');
                $('#email_ad').removeAttr('readonly');
            } else if ($(this).prop("checked")== false){
                $('#email_ad').attr('readonly', 'readonly');
                  $('#email_ad').removeAttr('required');
            } 
                
        });
    });
    
</script>