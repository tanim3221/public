<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:login.php');
}
else{
	
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
	
	<title>Login Info </title>

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

.modal-header {
    border-bottom: none;
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

						<h2 class="page-title">Login Info (GDM, DDM, GM, LM)</h2>


								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
																				<th><b>Photo</th><th><b>Mermber ID</th> <th><b>Name</th> <th><b>Email</th><th><b>Password</th><th><b>Password Reset Time</th><th><b>Update</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
										<th>#</th>
																				<th><b>Photo</th><th><b>Mermber ID</th> <th><b>Name</th> <th><b>Email</th><th><b>Password</th><th><b>Password Reset Time</th><th><b>Update</th>
										</tr>
									</tfoot>
									<tbody>

                    <?php $sql = "SELECT * FROM  lifemembers WHERE Password <> '' ORDER by MemId  ";
                    $query = $dbh -> prepare($sql);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    $cnt=1;
                    if($query->rowCount() > 0)
                    {
                    foreach($results as $result)
                    {				?>	
				<tr>
				<td><?php echo htmlentities($cnt);?></td>
				<td><img style='width: 66px;' src='../img/lm/<?php echo htmlentities($result->Image);?>'></td>
				<td><?php echo htmlentities($result->MemId);?></td>
				<td><?php echo htmlentities($result->Name);?></td>
				<td><?php echo htmlentities($result->Email);?></td>
				<td><?php echo htmlentities($result->Password);?>
				<button style="float:right;"  data-toggle="modal" data-target="#<?php echo htmlentities($result->id);?>"><i class="fa fa-eye"></i></button>
				<div id="<?php echo htmlentities($result->id);?>" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title">Login Credentials</h3>
                          </div>
                          <div class="modal-body" id="showPass">
                               <table class="table table-bordered">
                                        <tbody>
                                          <tr>
                                            <td><b>Member ID</b></td>
                                            <td><?php echo htmlentities($result->MemId);?></td>
                                            <td><b>Name</b></td>
                                            <td><?php echo htmlentities($result->Name);?></td>
                                          </tr>
                                          <tr>
                                            <td><b>Email</b></td>
                                            <td style="color:red; font-weight:bold;"><?php echo htmlentities($result->Email);?></td>
                                            <td><b>Password</b></td>
                                            <td style="color:red; font-weight:bold;"><?php echo base64_decode(htmlentities($result->Password));?></td>
                                          </tr>
                                    
                                        </tbody>
                                      </table>
                              
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                    
                      </div>
                    </div></td>
				<td><?php echo htmlentities($result->PassResetTime);?></td>
										
			<td>
			
			<a type="button" class="btn btn-danger" href="edit-life-members.php?id=<?php echo htmlentities($result->id);?>">  Update </a> 

			</td>

										</tr>
										<?php $cnt=$cnt+1; }} ?>
										
									</tbody>
								</table>

				
					

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
	<script src="js/main.js"></script>
	
	
</body>
</html>

<?php } ?>