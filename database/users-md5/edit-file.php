<?php
	session_start();

if(isset($_SESSION['id'])){
	$sql = "SELECT * FROM lifemembers WHERE id =" .$_SESSION['id'];
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
}


if(isset($_POST['btn-update'])){
        $name = $_POST['name'];
	$mailing_add = $_POST['mailing_add'];
	$permanent_add = $_POST['permanent_add'];
	$profesion = $_POST['profesion'];
	$designation = $_POST['designation'];
	$organization = $_POST['organization'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$bachelor_year = $_POST['bachelor_year'];
	$master_year = $_POST['master_year'];
	
	$duplicate= mysqli_query($conn,"SELECT Mobile FROM member WHERE Mobile='$mobile' AND YearM >=CURDATE() - INTERVAL 1 Year UNION SELECT Mobile FROM lifemembers WHERE Mobile='$mobile' AND id <>".$_SESSION['id']);
	
	
if (mysqli_num_rows($duplicate) >0)
{
echo "<script>alert('Sorry! Your mobile number already exits in our server, please change your mobile number and try again.'); window.location='edit-my-info.php'</script>";
}
else{
	
	$update = "UPDATE lifemembers SET Name='$name' ,Mailing='$mailing_add',Permanent='$permanent_add',Profession='$profesion',Designation='$designation',Organization='$organization',Mobile='$mobile',Email='$email',Bachelor='$bachelor_year',Master='$master_year' WHERE id=". $_SESSION['id'];
	$up = mysqli_query($conn, $update);
	if(!isset($sql)){
		die ("Error $sql" .mysqli_connect_error());
	}
	else
	{
		echo "<script>alert('Successfully updated your profile.'); window.location='edit-my-info.php'</script>";
	}
} 
}
?>

 <form class="form-group" method="post" name="myform" id="myform" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                        
                        <img src="../img/lm/<?php echo $row['Image']; ?>" id="profile-img-tag" width="100px" />
              
                            
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="profile-head">
                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Member ID</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p class="mem_id" > <?php echo $row['MemId']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p><input class="form-control" type="text" name="name" value="<?php echo $row['Name']; ?>" ></p>
                                            </div>
                                        </div>
                                        
                                         
		
						
                                    
    
                        </div>
                    </div>
       
                </div>
                <div class="row">
            
                
                    <div class="col-md-12">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active in" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Mailing Address</label>
                                            </div>
                                            <div class="col-md-9">
                                                <p><textarea rows="6" class="form-control" type="text" name="mailing_add" value="<?php echo $row['Mailing']; ?>" ><?php echo $row['Mailing']; ?></textarea></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Permanent Address</label>
                                            </div>
                                            <div class="col-md-9">
                                                <p> <textarea rows="6" class="form-control" type="text" name="permanent_add" value="<?php echo $row['Permanent']; ?>" ><?php echo $row['Permanent']; ?></textarea></p>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Profession</label>
                                            </div>
                                            <div class="col-md-9">
                                                <p><input class="form-control" type="text" name="profesion" value="<?php echo $row['Profession']; ?>"  ></p>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Designation</label>
                                            </div>
                                            <div class="col-md-9">
                                                <p><input class="form-control" type="text" name="designation" value="<?php echo $row['Designation']; ?>" ></p>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Organization</label>
                                            </div>
                                            <div class="col-md-9">
                                                <p><input class="form-control" type="text" name="organization" value="<?php echo $row['Organization']; ?>" ></p>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Mobile</label>
                                            </div>
                                            <div class="col-md-9">
                                                <p><input class="form-control" type="text" name="mobile" value="<?php echo $row['Mobile']; ?>"></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-9">
                                               <p> <input class="form-control" type="text" name="email" value="<?php echo $row['Email']; ?>"  ></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Bachelor Year</label>
                                            </div>
                                            <div class="col-md-9">
                                                <p><input class="form-control" type="text" name="bachelor_year" value="<?php echo $row['Bachelor']; ?>" ></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Master Year</label>
                                            </div>
                                            <div class="col-md-9">
                                                <p><input class="form-control" type="text" name="master_year" value="<?php echo $row['Master']; ?>"  ></p>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-3">
                                                
                                            </div>
                                            <div class="col-md-9">
                                                <p>  <input class="btn btn-success" onclick="return confirm('Do you really want to update your informations?')" type="submit" id="btnSubmit" name="btn-update" value="Update" /></p>
                                            </div>
                                        </div>
                                    
                            </div>
                            </div>
                        </div>
                        
                    </div>

</form>
