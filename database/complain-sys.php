<?php
error_reporting(0);

if(isset($_POST['send'])) {
    date_default_timezone_set("Asia/Dhaka");
$memid=$_POST['memid'];
$name=$_POST['name'];
$subject=$_POST['subject'];
$message=$_POST['message'];
$postingdate = date('d-m-Y h:i:sa');


  $image_file = $_FILES["image"]["name"];
  $image_file = preg_replace('/\\.[^.\\s]{3,4}$/', '', $image_file);
  $type  = $_FILES["image"]["type"]; //file name "image" 
  $size  = $_FILES["image"]["size"];
  $temp  = $_FILES["image"]["tmp_name"];
  $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
  $imagename = $name . "_" .$memid . "_" .time() . "." . $ext;
  
  $path="../img/complain/".$imagename; //set upload folder path
  

   if(!file_exists($path)) //check file not exist in your upload folder path
   {

     move_uploaded_file($temp, "../img/complain/" .$imagename);
   }




$sql="INSERT INTO  complaints (MemId,Name,Subject,Message, Image, PostingDate) VALUES(:memid,:name,:subject,:message, :image, :postingdate)";
$query = $dbh->prepare($sql);
$query->bindParam(':memid',$memid,PDO::PARAM_STR);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':subject',$subject,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->bindParam(':image',$imagename,PDO::PARAM_STR);
$query->bindParam(':postingdate',$postingdate,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Your complain have successfully submitted. We will update your Informations within 24 hours.";
 header("Refresh:4");
}
else 
{
$error="Something went wrong. Please try again";
 header("Refresh:4");
}

}
?>

<p><h2 class="GrayBlue22b">Report for wrong informations</h2></p>

<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

<?php $sql = "SELECT * from  activate WHERE id = '3'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result) {	?>	
					
<?php 
$extime = date('d/m/Y - h:i a');
$servertime= $result->expire;
$text= $result->text;

if($extime >= $servertime ) {
    
         if(empty($text)) { ?>
            
		<div class="expired" > Access Denied</div>
	
	<?php } else {?>
	
	<div class="expired" > <?php echo htmlentities($result->text);?></div>
	
	
	<?php } } else {?>			

<form method="post" class="form-group" name="sentMessage"  enctype="multipart/form-data" onSubmit="return Validate();">
 <div class="row">

<div class="col-md-4">
<label>Member ID<span style="color:red">*</span></label>
</div>
<div class="col-md-8">
<p><input type="text" name="memid" class="form-control" required></p>
</div>
</div>

 <div class="row">
<div class="col-md-4">
<label>Name<span style="color:red">*</span></label>
</div>
<div class="col-md-8">
<p><input type="text" name="name"  class="form-control" required></p>
</div>
</div>


 <div class="row">
<div class="col-md-4">

<label>Change Image (If)</label>

</div>
<div class="col-md-8">
<p><span id="errorName5" style="color: red;"></span><input type="file" class="form-control" id="image"  name="image">
</p>
</div>
</div>


<div class="row">
<div class="col-md-4">
<label>Complain Subject</label>
</div>
<div class="col-md-8">
<p><textarea class="form-control" name="subject" ></textarea></p>
</div>
</div>


<div class="row">
<div class="col-md-4">
<label>Details Complain<span style="color:red">*</span></label>
</div>
<div class="col-md-8">
<p><textarea rows="10" class="form-control" name="message" required> </textarea></p>
</div>
</div>


<div class="row">
<div class="col-md-4">

</div>
<div style="text-align:left;" class="col-md-8">
<button class="btn btn-danger" id="btnSubmit" type="reset">Reset</button>
<button class="btn btn-primary" name="send" id="btnSubmit" type="submit">Submit</button>
</div>
</div>

</form>

<?php } ?>
				

					
					
				<?php }} ?>