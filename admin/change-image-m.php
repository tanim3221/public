<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:login.php');
}
else{?>

<title>RUAAA || Change Members Image Database</title>
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
	<link rel="stylesheet" href="css/style.css">
<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

          <div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Image Changes - General Member</h2>
			
                        <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Member ID</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php
								$conn = new PDO('mysql:host=localhost; dbname=ruaaa_v2','root', ''); 
								$result = $conn->prepare("SELECT * FROM member WHERE YearM >= DATE_SUB(NOW(),INTERVAL 2 YEAR) ORDER by MemId");
								$result->execute();
								for($i=0; $row = $result->fetch(); $i++){
								$id=$row['id'];
							?>
								<tr>
								<td>
									<?php if($row['Image'] != ""): ?>
									<img src="../img/m/<?php echo $row['Image']; ?>" width="100px" >
									<?php else: ?>
									<img src="" width="100px" >
									<?php endif; ?>
								</td>
								<td> <?php echo $row ['Name']; ?></td>
								<td> <?php echo $row ['MemId']; ?></td>
								<td>
									 <a href="#delete<?php echo $id;?>"  data-toggle="modal"  class="btn btn-warning" >Update Image</a>
								</td>
								</tr>
										<!-- Modal -->
							
							<div id="delete<?php  echo $id;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
   
     						 <div class="modal-content">
							<div class="modal-header">
							<h3 id="myModalLabel">Update photo of <span class="update-id"><?php echo $row['MemId']; ?></span></h3>
							</div>
							
							<div class="modal-body">
							
							<?php if($row['Image'] != ""): ?>
							<img src="../img/m/<?php echo $row['Image']; ?>" width="100px" id="profile-img-tag" >
							<?php else: ?>
							<img src="images/default.png" width="100px" height="100px" id="profile-img-tag" >
							<?php endif; ?>
							<form action="edit-image-m.php<?php echo '?id='.$id; ?>" method="post" enctype="multipart/form-data">
							<div class="editimage">
							
								<input class="form-control" type="file" name="image" id="file" onchange="show(this)">
					
							</div>
							</div>
							<div class="modal-footer">
							<button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">No</button>
							<button type="submit" name="submit" class="btn btn-danger">Yes</button>
							
							</div>
							</form>
							
							</div>
								<?php } ?>
                            </tbody>
                        </table>


          
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
 
  
  <style>
.editimage{
	width: 400px;
	margin: 50px auto;
	font-family: sans-serif;
}

#file{
  	margin: 0 auto;
}


.modal-body img{
	display: block;
	margin: 0 auto 15px;
}
  </style>


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
	<script src="js/main.js"></script>
</body>
</html>

<?php } ?>
