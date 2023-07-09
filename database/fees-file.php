<?php
session_start();
error_reporting(0);
include('config.php');


if(isset($_POST['submit'])) {

    date_default_timezone_set("Asia/Dhaka");
    $memidname=$_POST['mem_id_name'];
    $categorym=$_POST['categorym'];
    $mobile=$_POST['mobile'];
    $slipamount=$_POST['slip_amount'];
    $guestcount=$_POST['guest_count'];
    $slip_no=$_POST['slip_no'];
    $depositdate=$_POST['deposit_date'];
    $datem= date('d-m-Y h:i:sa');
    $comments=$_POST['comments'];
  
    $status=0;
    $yearm= date('Y');

    $image_file = $_FILES["slip_image"]["name"];
    $image_file = preg_replace('/\\.[^.\\s]{3,4}$/', '', $image_file);
    $type  = $_FILES["slip_image"]["type"]; //file name "image" 
    $size  = $_FILES["slip_image"]["size"];
    $temp  = $_FILES["slip_image"]["tmp_name"];
    $ext = pathinfo($_FILES['slip_image']['name'], PATHINFO_EXTENSION);
    $imagename = $slip_no . "_" . $mobile . "_" .time() . "." . $ext;
 
	$result="SELECT * FROM participants WHERE (SlipNo=:slip_no)";
$queryt = $dbh -> prepare($result);
$queryt->bindParam(':slip_no',$slip_no,PDO::PARAM_STR);
$queryt -> execute();
$results = $queryt -> fetchAll(PDO::FETCH_OBJ);
if($queryt -> rowCount() == 0)
{
	
 $path="../img/slips/".$imagename; //set upload folder path
 
   if(!file_exists($path)) //check file not exist in your upload folder path
   {

     move_uploaded_file($temp, "../img/slips/" .$imagename);
   }

$sql="INSERT INTO  participants (id, CategoryM, Mobile, SlipAmount, GuestCount, SlipNo, DipositDate, SlipImage, DateM, Comments ,  status, YearM) VALUES(:memidname, :categorym, :mobile,:slipamount,:guestcount,:slip_no,:depositdate, :slip_image,:datem, :comments, :status, :yearm)";
$query = $dbh->prepare($sql);
$query->bindParam(':memidname',$memidname,PDO::PARAM_STR);
$query->bindParam(':categorym',$categorym,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':slipamount',$slipamount,PDO::PARAM_STR);
$query->bindParam(':guestcount',$guestcount,PDO::PARAM_STR);
$query->bindParam(':slip_no',$slip_no,PDO::PARAM_STR);
$query->bindParam(':depositdate',$depositdate,PDO::PARAM_STR);
$query->bindParam(':slip_image',$imagename,PDO::PARAM_STR);
$query->bindParam(':datem',$datem,PDO::PARAM_STR);
$query->bindParam(':comments',$comments,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':yearm',$yearm,PDO::PARAM_STR);
$query->execute();

$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Your info submitted successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

}
else
{
$error="Sorry! Your Slip Number already exist in our server";
}	
	
}


?>

<p><h2 class="GrayBlue22b"> Membership/Program Fee</h2></p>

<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>: <?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>: <?php echo htmlentities($msg); ?> </div><?php }?>
				
				
	<?php $sql = "SELECT * from  activate WHERE id = '2'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>	
					
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
<form class="form-group" method="post" name="myform" id="myform" enctype="multipart/form-data" onSubmit="return Validate1();">
		
			
							<div class="row">					
								<div class="col-md-12">
									
									<div class="row">
                                            <div class="col-md-4">
                                                <label>ID/Name/Mobile</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p> 
												
												<select  class="selectpicker form-control" data-container="body" data-live-search="true"  data-hide-disabled="true" name="mem_id_name" required >
								<option value="">Select Member ID and Name</option>
								<?php
								$sql="SELECT id,MemId,Name, Mobile FROM lifemembers ORDER BY MemId ";
								$query = $dbh -> prepare($sql);
								$query->execute();
								$results=$query->fetchAll(PDO::FETCH_OBJ);
																if($query->rowCount() > 0)
								{
								foreach($results as $result)
								{				?>	
										<option value='<?php echo htmlentities($result->id);?>'><?php echo htmlentities($result->MemId);?> <?php echo htmlentities($result->Name);?> <?php echo htmlentities($result->Mobile);?> 	</option>";
										
									<?php }} ?>
									<?php
								$sql1="SELECT id,MemId,Name, Mobile FROM member ORDER BY MemId ";
								$query1 = $dbh -> prepare($sql1);
								$query1->execute();
								$results1=$query1->fetchAll(PDO::FETCH_OBJ);
																if($query1->rowCount() > 0)
								{
								foreach($results1 as $result)
								{				?>	
										<option value='<?php echo htmlentities($result->id);?>'><?php echo htmlentities($result->MemId);?> <?php echo htmlentities($result->Name);?> <?php echo htmlentities($result->Mobile);?> 	</option>";
										
									<?php }} ?>
								
								</select>
												</p>
                                            </div>
                                        </div>
										
										
										<div class="row">
                                            <div class="col-md-4">
                                                <label>Payment For </label>
                                            </div>
                                            <div class="col-md-8">
                                                <p> <select class="form-control" name="categorym" required >
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
                                                <label>Mobile</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p> <input class="form-control" type="text" name="mobile" required ></p>
                                            </div>
                                        </div>
										
										<div class="row">
                                            <div class="col-md-4">
                                                <label>Enter Deposit Slip Amount</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p> <input class="form-control" type="text" name="slip_amount" required ></p>
                                            </div>
                                        </div>
										
										
										<div class="row">
                                            <div class="col-md-4">
                                                <label>Guest Count</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p> <select class="form-control" name="guest_count" required >
  
                                          <?php
                                                for($i = 0; $i <=+10; $i++){?>
                                                <option value="<?=$i?>"><?=$i?></option>
                                                <?php }
                                                ?>
                                        </select></p>
                                            </div>
                                        </div>
										
										
										<div class="row">
                                            <div class="col-md-4">
                                                <label>Enter Deposit No</label>
                                            </div>
                                            <div class="col-md-8">
											
                                                <p> <input class="form-control" type="text" name="slip_no"  id="slip_no"  required ></p>
                                            </div>
                                        </div>
										
										
										<div class="row">
                                            <div class="col-md-4">
                                                <label>Enter Deposit Date</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p> <input class="form-control" type="date" name="deposit_date" required ></p>
                                            </div>
                                        </div>
										
										
										
									<div class="row">
                                            <div class="col-md-4">
                                                <label>Attach Deposit Slip <br>(PNG, JPG, JPEG)</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p> <span id="errorName5" style="color: red;"></span><input class="form-control" type="file" id="image" name="slip_image" required ></p>
                                            </div>
                                        </div>
										
										<div class="row">
                                            <div class="col-md-4">
                                                <label>Comments</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p><textarea rows="8" class="form-control" type="text" name="comments" ></textarea></p>
                                            </div>
                                        </div>
                        
                                     <div class="row">
                                            <div class="col-md-4">
                                              
                                            </div>
                                            <div style="text-align:left;" class="col-md-8">
                                                <p> <input class="btn btn-success btn-md" type="submit" id="btnSubmit" name="submit" value="Submit & Finish"/></p>
                                            </div>
                                        </div>
										   
                                        
                                                                           
    
                       
                    </div>
					
		
       
                
                                        </div>
										
										
										
										
                                    
                            
              
            
  
</form>
<?php } ?>
				

					
					
				<?php }} ?>	