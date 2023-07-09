<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:login.php');
}
else{?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<title>Change Password</title>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	</head>
<body>
<div class="my-title">
  <p class="left">Admin Profile</p>
    <p class="right"><a style=" text-decoration:none" href="add-admin.php">
        <button type="button" class="btn btn-warning btn-sm">
            Add Admin</button></a></p>
</div>

<div style="clear:both;"></div>

<?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?>

		<table class="table table-bordered">
			<thead class="alert-info">
				<tr>
					<th>Username</th>
					<th>Password</th>
					<th>Name</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody style="background-color:#fff;">
				<?php
					require 'head.php';
					$query = $con->query("SELECT * FROM `admin`") or die($con->error());
					while($fetch = $query->fetch_array()){
				?>
					<tr>
						<td data-label='Username' ><?php echo $fetch['username']?></td>
						<td data-label='Password' ><?php echo str_replace($fetch['password'], "********", $fetch['password'])?></td>
						<td data-label='Name' ><?php echo $fetch['name']?></td>
						
						
						<td>
						
						<div class="btn-group">
						
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update_modal<?php echo $fetch['id']?>">Update</button>
<button type="button" class="btn btn-danger" > <a style="color:#ffffff; text-decoration:none" href="home.php?id=<?php echo $fetch['id'];?>">
Delete</a></button>
</div>
</td>
					</tr>
					
					<div class="modal fade" id="update_modal<?php echo $fetch['id']?>" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<form action="update_password.php" method="POST" enctype="multipart/form-data">
								<div class="modal-content">
									<div class="modal-body">
										<div class="form-group">
												<label>Firstname</label>
												<input class="form-control" type="text" name="name" value="<?php echo $fetch['name']?>" required="required"/>
											</div>
										
											<div class="form-group">
												<label>Username</label>
												<input type="hidden" name="id" value="<?php echo $fetch['id']?>"/>
												<input class="form-control" type="text" name="username" value="<?php echo $fetch['username']?>" required="required" />
											</div>
										
											<div class="form-group">
												<label>Old Password</label>
												<input class="form-control" type="password" maxlength="12" name="oldpassword" required="required"/>
											</div>
											<div class="form-group">
												<label>New Password</label>
												<input class="form-control" type="password" maxlength="12" name="newpassword" required="required"/>
											</div>
											<div class="form-group">
												<label>Confirm Password</label>
												<input class="form-control" type="password" maxlength="12" name="confirmpassword" required="required"/>
											</div>
										
										<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal"> Close</button>
										<button name="update" class="btn btn-primary"> Update</button>
                                                                                
									</div>
										</div>
									</div>
					
									
								</div>
							</form>
						</div>
				
				<?php
					}
				?>
			</tbody>
		</table>
</body>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</html>
<?php } ?>