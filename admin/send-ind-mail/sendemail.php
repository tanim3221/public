<?php
function send_mail($to,$subject,$body){
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

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
    $mail->AddAddress($to);// Body of the Email

/*
    $fromserver = "myicche@gmail.com"; 
    require ("PHPMailer/PHPMailerAutoload.php");
    
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug = 0;
    $mail->SMTPSecure = 'tls'; 
    $mail->Host = 'tls://smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = "myicche@gmail.com"; 
    $mail->Password = "tanim1996";
    $mail->Priority    = 1;
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->IsHTML(true);
    $mail->From = "myicche@gmail.com";
    $mail->FromName = "AIS Diary19 ";
    $mail->Sender = $fromserver; 
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AddAddress($email_to);
*/

   if($mail->send()){
    $response = '1';
    }else{
    $response = '0';
    }
    return $response;
}


?>
