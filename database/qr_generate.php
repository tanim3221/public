<?php
include 'connect.php';
include 'phpqrcode/qrlib.php';  

if(isset($_GET['id']) && $_GET['member'] == 'lifeMembers'){
	
	$sql = "SELECT * FROM lifemembers WHERE id =".$_GET['id'];
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	
} elseif(isset($_GET['id']) && $_GET['member'] == 'generalMember'){
	
	$sql = "SELECT * FROM member WHERE id =".$_GET['id'];
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
}

	$text = "Name: ".$row ['Name']."\n";
	$text .= "Mobile: ".$row ['Mobile']."\n";
	$text .= "Email: ".$row ['Email']."\n";
	$text .= "Mailing Address: ".$row ['Mailing']."\n";
	$text .= "Profession: ".$row ['Profession']."\n";	
	$text .= "Bachelor Year: ".$row ['Bachelor']."\n";
	
	$path = 'qr_code/'; 
	$file = $path.uniqid().".png"; 
	$ecc = 'L'; 
	$pixel_Size = 3; 
	$frame_Size = 3; 
	QRcode::png($text, $file, $ecc, $pixel_Size, $frame_size); 
	echo "<center><img id='qr_code_img' src='".$file."' alt='Automatically Generated QR Code'></center>"; 
	//echo "<br><center><a class='btn btn-success btn-sm' href='".$file."' download>ডাউনলোড</a>"; 
	