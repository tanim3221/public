<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:login.php');
}
else{ 

if(isset($_POST['submit']))
  {
      $i= date('Y');
      date_default_timezone_set("Asia/Dhaka");
$name=$_POST['name'];
$memid=$_POST['mem_id'];
$mailing=$_POST['mailing_add'];
$permanent=$_POST['permanent_add'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$profesion=$_POST['profesion'];
$designation=$_POST['designation'];
$organization=$_POST['organization'];
$bachelor=$_POST['bachelor_year'];
$master=$_POST['master_year'];
$ruaaapost=$_POST['ruaaa_post'];
$yearm=$i;
$datem= date('d-m-Y h:i:sa');
$categorym=$_POST['m_category'];
$active=0;

if($categorym == "Member"){

  $image_file = $_FILES["image"]["name"];
   $image_file = preg_replace('/\\.[^.\\s]{3,4}$/', '', $image_file);
  $type  = $_FILES["image"]["type"]; //file name "image" 
  $size  = $_FILES["image"]["size"];
  $temp  = $_FILES["image"]["tmp_name"];
  
  $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
  $imagename = $name . "_" . $mobile . "_" .time() . "." . $ext;
 
  
  
	
$result="SELECT * FROM member WHERE (Mobile=:mobile) AND YearM = CURDATE() ";
$queryt = $dbh -> prepare($result);
$queryt->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$queryt -> execute();
$results = $queryt -> fetchAll(PDO::FETCH_OBJ);
if($queryt -> rowCount() == 0)
{
    
$path="../img/m/".$imagename; //set upload folder path
  

   if(!file_exists($path)) //check file not exist in your upload folder path
   {

     move_uploaded_file($temp, "../img/m/" .$imagename);
   }
	
$sql="INSERT INTO  member (Name,MemId, Mailing,Permanent,Mobile,Email,Profession,Designation,Organization, Bachelor, Master, YearM, CategoryM, Image, active, DateM) VALUES(:name,:memid,:mailing,:permanent,:mobile,:email,:profesion,:designation,:organization,:bachelor,:master, :yearm, :categorym, :image, :active, :datem)";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':memid',$memid,PDO::PARAM_STR);
$query->bindParam(':mailing',$mailing,PDO::PARAM_STR);
$query->bindParam(':permanent',$permanent,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':profesion',$profesion,PDO::PARAM_STR);
$query->bindParam(':designation',$designation,PDO::PARAM_STR);
$query->bindParam(':organization',$organization,PDO::PARAM_STR);
$query->bindParam(':bachelor',$bachelor,PDO::PARAM_STR);
$query->bindParam(':master',$master,PDO::PARAM_STR);
$query->bindParam(':yearm',$yearm,PDO::PARAM_STR);
$query->bindParam(':categorym',$categorym,PDO::PARAM_STR);
$query->bindParam(':image',$imagename,PDO::PARAM_STR);
$query->bindParam(':active',$active,PDO::PARAM_STR);
$query->bindParam(':datem',$datem,PDO::PARAM_STR);
$query->execute();
$result = $query->rowCount();

if ($result > 0) {

    $mail_body = "   <p>Dear ".$name.",</p>
   <p>Thanks for Registration. </p>
   <p>Your Membership Category is ".$categorym.",</p>
   <p>Best Regards,<br />Rajshahi University Accounting Alumni Association (RUAAA)</p>   ";
   require_once "../database/phpmailer/class.phpmailer.php";
   $mail = new PHPMailer;
   $mail->IsSMTP();        //Sets Mailer to send message using SMTP
   $mail->Host = 'mail.ruaaa.org';  //Sets the SMTP hosts of your Email hosting, this for Godaddy
   $mail->Port = '26';        //Sets the default SMTP server port
   $mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
   $mail->Username = 'noreply-info@ruaaa.org';     //Sets SMTP username
   $mail->Password = 'qVq7RWXnKzvn';     //Sets SMTP password
   $mail->SMTPSecure = '';       //Sets connection prefix. Options are "", "ssl" or "tls"
   $mail->From = 'noreply-info@ruaaa.org';   //Sets the From email address for the message
   $mail->FromName = 'Rajshahi University Accounting Alumni Association (RUAAA)';     //Sets the From name of the message
   $mail->AddAddress($email, $name);  //Adds a "To" address   
   $mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
   $mail->IsHTML(true);       //Sets message type to HTML    
   $mail->Subject = 'Registration Confirmation';   //Sets the Subject of the message
   $mail->Body = $mail_body;       //An HTML or plain text message body
   if($mail->Send())        //Send an Email. Return true on success or false on error
   {

$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Your info submitted successfully";
}
  } 
  }
else 
{
$error="Something went wrong. Please try again";
}
}
else
{
$error="Mobile Number already exist. Please try again";
}	


	
} else {
	
	 $image_file = $_FILES["image"]["name"];
      $image_file = preg_replace('/\\.[^.\\s]{3,4}$/', '', $image_file);
  $type  = $_FILES["image"]["type"]; //file name "image" 
  $size  = $_FILES["image"]["size"];
  $temp  = $_FILES["image"]["tmp_name"];
  
  $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
  $imagename = $name . "_" . $mobile . "_" .time() . "." . $ext;
 
   
	
	$result="SELECT * FROM lifemembers WHERE (Mobile=:mobile)";
$queryt = $dbh -> prepare($result);
$queryt->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$queryt -> execute();
$results = $queryt -> fetchAll(PDO::FETCH_OBJ);
if($queryt -> rowCount() == 0)
{
	$path="../img/lm/".$imagename; //set upload folder path
  

   if(!file_exists($path)) //check file not exist in your upload folder path
   {

     move_uploaded_file($temp, "../img/lm/" .$imagename);
   }

	$sql="INSERT INTO  lifemembers (Name, MemId,Mailing,Permanent,Mobile,Email,Profession,Designation,Organization, Bachelor, Master,RuaaaPost, CategoryM, Image, active, DateM) VALUES(:name, :memid,:mailing,:permanent,:mobile,:email,:profesion,:designation,:organization,:bachelor,:master, :ruaaapost, :categorym,:image, :active, :datem)";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':memid',$memid,PDO::PARAM_STR);
$query->bindParam(':mailing',$mailing,PDO::PARAM_STR);
$query->bindParam(':permanent',$permanent,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':profesion',$profesion,PDO::PARAM_STR);
$query->bindParam(':designation',$designation,PDO::PARAM_STR);
$query->bindParam(':organization',$organization,PDO::PARAM_STR);
$query->bindParam(':bachelor',$bachelor,PDO::PARAM_STR);
$query->bindParam(':master',$master,PDO::PARAM_STR);
$query->bindParam(':ruaaapost',$ruaaapost,PDO::PARAM_STR);
$query->bindParam(':categorym',$categorym,PDO::PARAM_STR);
$query->bindParam(':image',$imagename,PDO::PARAM_STR);
$query->bindParam(':active',$active,PDO::PARAM_STR);
$query->bindParam(':datem',$datem,PDO::PARAM_STR);
$query->execute();
$result = $query->rowCount();

if ($result > 0) {

    $mail_body = "   <p>Dear ".$name.",</p>
   <p>Thanks for Registration. </p>
      <p>Your Membership Category is ".$categorym.",</p>
   <p>Best Regards,<br />Rajshahi University Accounting Alumni Association (RUAAA)</p>   ";
   require_once "../database/phpmailer/class.phpmailer.php";
   $mail = new PHPMailer;
   $mail->IsSMTP();        //Sets Mailer to send message using SMTP
   $mail->Host = 'mail.ruaaa.org';  //Sets the SMTP hosts of your Email hosting, this for Godaddy
   $mail->Port = '26';        //Sets the default SMTP server port
   $mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
   $mail->Username = 'noreply-info@ruaaa.org';     //Sets SMTP username
   $mail->Password = 'qVq7RWXnKzvn';     //Sets SMTP password
   $mail->SMTPSecure = '';       //Sets connection prefix. Options are "", "ssl" or "tls"
   $mail->From = 'noreply-info@ruaaa.org';   //Sets the From email address for the message
   $mail->FromName = 'Rajshahi University Accounting Alumni Association (RUAAA)';     //Sets the From name of the message
   $mail->AddAddress($email, $name);  //Adds a "To" address   
   $mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
   $mail->IsHTML(true);       //Sets message type to HTML    
   $mail->Subject = 'Registration Confirmation';   //Sets the Subject of the message
   $mail->Body = $mail_body;       //An HTML or plain text message body
   if($mail->Send())        //Send an Email. Return true on success or false on error
   {


$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Your info submitted successfully";
}
  } 
  }
else 
{
$error="Something went wrong. Please try again";
}
}
else
{
$error="Mobile Number already exist. Please try again";
}	
	
}
}
	?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>RUAAA || Member Database</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
    <link rel="stylesheet" href="css/style.edit.form.css">
	<link rel="stylesheet" href="css/style.css">
<style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>
</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Add RUAAA Members</h2>

						<div class="row">
							<div class="col-md-12">

<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

									<div class="panel-body">
									

<form  class="form-group" method="post" name="myform" id="myform" enctype="multipart/form-data" onSubmit="return Validate();">
                <div class="row">
                    <div class="col-md-4">

                        <div class="profile-img">
                        
                        <img src="../database/demo.png" id="profile-img-tag" width="100px" />
                        
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="profile-head">
                        
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p><input class="form-control" type="text" name="name" required ></p>
                                            </div>
                                        </div>
                                        
                                         <div class="row">
                                            <div class="col-md-4">
                                                <label>Member ID</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p> <input class="form-control" type="text" name="mem_id" required ></p>
                                            </div>
                                        </div>
 
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Member Category</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p> <select class="form-control" name="m_category" required >
												<option value="" name="" > Select Member Category </option>
  
                                          <option value="GDM" name="GDM" > Grand Donor Member </option>
                                          <option value="DDM" name="DDM"  > Distinguished Donor Member </option>
                                          <option value="GM" name="GM" > Golden Member </option>
										  <option value="LM" name="LM" > Life Member </option>
										  <option value="Member" name="M" > General Member </option>
                                        </select></p>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>RUAAA Committee Designation</label>
                                            </div>
                                            <div class="col-md-8">
                                            <p> <select class="form-control" name="ruaaa_post">
                                            <option value="" >    Select RUAAA Designation  </option>
                                    <option value="President" >    President  </option>
                                  <option value="Vice President (1) ">  Vice President (1) </option>
                                  <option value="Vice President (2)">  Vice President (2) </option>
                                  <option value=" Vice President (3)">  Vice President (3) </option>
                                <option value="General Seretary">	General Seretary </option>
                                  <option value="Tresurer">  Tresurer </option>
                                  <option value="Joint Seretary (1)">  Joint Seretary (1) </option>
                                <option value="Joint Seretary (2)">	Joint Seretary (2) </option>
                                <option value="Organizing Secretary (1)">	Organizing Secretory (1) </option>
                                <option value="Organizing Secretary (2)">	Organizing Secretary (2) </option>
                                  <option value="Office and Press Secretary">  Office and Press Secretary </option>
                                  <option value="Member">  Member </option>
 
                                            
                                            </select></p>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Passport Size Photo</label>
                                            </div>
                                            <div class="col-md-8">
        
                                                <p><span id="errorName5" style="color: red;"></span>  <input class="form-control" onchange="loadFile(event)" type="file" id="image" name="image" required>
                                               </p>
                                            </div>
                                        </div>
                                        
                                                                        
    
                        </div>
                    </div>
       
                </div>
                <div class="row">
            
                
                    <div class="col-md-12">

                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Mailing Address</label>
                                            </div>
                                            <div class="col-md-9">
                                                <p><textarea rows="6" class="form-control" type="text" name="mailing_add" required ></textarea></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Permanent Address</label>
                                            </div>
                                            <div class="col-md-9">
                                                <p> <textarea rows="6" class="form-control" type="text" name="permanent_add" required ></textarea></p>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Profession</label>
                                            </div>
                                            <div class="col-md-9">
                                                <p><input class="form-control" type="text" name="profesion" required ></p>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Designation</label>
                                            </div>
                                            <div class="col-md-9">
                                                <p><input class="form-control" type="text" name="designation" required></p>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Organization</label>
                                            </div>
                                            <div class="col-md-9">
                                                <p><input class="form-control" type="text" name="organization"  required></p>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        
                                        
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Mobile</label>
											
                                            </div>
                                            <div class="col-md-9">
                                                <p>
													<span id="mobile-availability-status"></span>
													<input class="form-control" type="text" name="mobile" id="mobile" onBlur="checkMobileAvailability()" required ></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-9">
                                               <p> <input class="form-control" type="text" name="email" required ></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Bachelor Year</label>
                                            </div>
                                            <div class="col-md-9">
                                                <p><input class="form-control" type="text" name="bachelor_year"  required></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Master Year</label>
                                            </div>
                                            <div class="col-md-9">
                                                <p><input class="form-control" type="text" name="master_year"  required></p>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-3">
                                                
                                            </div>
                                            <div style="text-align:left;" class="col-md-9">
                                                <input class="btn btn-success" type="submit" id="btnSubmit" name="submit" value="Submit" />
                                            </div>
                                        </div>
                                        
                                    
                            </div>
                            </div>
                           
  
</form>
									
									
</div>
								</div>
							</div>
						</div>
						
					

					</div>
				</div>
				
			

			</div>
		</div>
	</div>

<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
		<script src="js/imgValidationSize.js"></script>
			<script src="js/imgView.js"></script>
				<script src="js/imgValidation.js"></script>
					<script src="js/cross.checking.js"></script>
	<script src="js/main.js"></script>
</body>        

</body>
</html>
<?php } ?>