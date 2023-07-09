<?php
error_reporting(0);
include('config.php');

if(isset($_POST['submit']))
  {
$name=$_POST['name'];
$mailing=$_POST['mailing_add'];
$permanent=$_POST['permanent_add'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$profesion=$_POST['profesion'];
$designation=$_POST['designation'];
$organization=$_POST['organization'];
$bachelor=$_POST['bachelor_year'];
$master=$_POST['master_year'];
$categorym=$_POST['m_category'];
$status=0;
if($categorym == "Member"){

  $image_file = $_FILES["image"]["name"];
   $image_file = preg_replace('/\\.[^.\\s]{3,4}$/', '', $image_file);
  $type  = $_FILES["image"]["type"]; //file name "image" 
  $size  = $_FILES["image"]["size"];
  $temp  = $_FILES["image"]["tmp_name"];
  
  $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
  $imagename = $name . "_" . $mobile . "_" .time() . "." . $ext;
 
  
  
	
$result="SELECT * FROM member WHERE (Mobile=:mobile)";
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
	
$sql="INSERT INTO  member (Name,Mailing,Permanent,Mobile,Email,Profession,Designation,Organization, Bachelor, Master, CategoryM, Image, status) VALUES(:name,:mailing,:permanent,:mobile,:email,:profesion,:designation,:organization,:bachelor,:master,:categorym,:image, :status)";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':mailing',$mailing,PDO::PARAM_STR);
$query->bindParam(':permanent',$permanent,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':profesion',$profesion,PDO::PARAM_STR);
$query->bindParam(':designation',$designation,PDO::PARAM_STR);
$query->bindParam(':organization',$organization,PDO::PARAM_STR);
$query->bindParam(':bachelor',$bachelor,PDO::PARAM_STR);
$query->bindParam(':master',$master,PDO::PARAM_STR);
$query->bindParam(':categorym',$categorym,PDO::PARAM_STR);
$query->bindParam(':image',$imagename,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();

$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Your info submitted successfully";
echo "<script> window.alert('Your info submitted successfully. Click ok to view payment form.'); window.location.href='payment-fees.php';</script>";
exit;
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

	$sql="INSERT INTO  lifemembers (Name,Mailing,Permanent,Mobile,Email,Profession,Designation,Organization, Bachelor, Master, CategoryM, Image, status) VALUES(:name,:mailing,:permanent,:mobile,:email,:profesion,:designation,:organization,:bachelor,:master,:categorym,:image, :status)";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':mailing',$mailing,PDO::PARAM_STR);
$query->bindParam(':permanent',$permanent,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':profesion',$profesion,PDO::PARAM_STR);
$query->bindParam(':designation',$designation,PDO::PARAM_STR);
$query->bindParam(':organization',$organization,PDO::PARAM_STR);
$query->bindParam(':bachelor',$bachelor,PDO::PARAM_STR);
$query->bindParam(':master',$master,PDO::PARAM_STR);
$query->bindParam(':categorym',$categorym,PDO::PARAM_STR);
$query->bindParam(':image',$imagename,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();

$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Your info submitted successfully";
echo "<script> window.alert('Your info submitted successfully. Click ok to view payment form.'); window.location.href='payment-fees.php';</script>";
exit;
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
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>: <?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>: <?php echo htmlentities($msg); ?> </div><?php }?>

<div class="row">
                    <div class="col-md-12">
                    
                    <h2 class="GrayBlue22b"> Membership Registration Form </h2>

<form  class="form-group" method="post" name="myform" id="myform" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                        
                        <img src="demo.png" id="profile-img-tag" width="100px" />
                        <p> <h6>Passport size photograph</h6>
                            <input class="form-control" type="file" id="file" name="image" onchange="show(this)" required></p>
                            
                        
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
													<span id="mobile-availability-status"></span><br>
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
                                                <input class="btn btn-success" type="submit" id="btnSubmit" name="submit" value="Submit & Next" />
                                            </div>
                                        </div>
                                        
                                    
                            </div>
                            </div>
                           
  
</form>
			  