<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:login.php');
}
else{

if(isset($_REQUEST['hidden']))
	{
$eid=intval($_GET['hidden']);
$active="0";
$sql = "UPDATE member SET Active=:active WHERE  id=:eid";
$query = $dbh->prepare($sql);
$query -> bindParam(':active',$active, PDO::PARAM_STR);
$query-> bindParam(':eid',$eid, PDO::PARAM_STR);
$query -> execute();

$msg="Member Informations Hidden";
}


if(isset($_REQUEST['public']))
	{
$aeid=intval($_GET['public']);
$active=1;

$sql = "UPDATE member SET Active=:active WHERE  id=:aeid";
$query = $dbh->prepare($sql);
$query -> bindParam(':active',$active, PDO::PARAM_STR);
$query-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
$query -> execute();

$msg="Member Informations Published .";
}
if(isset($_REQUEST['del']))
	{
$did=intval($_GET['del']);
$sql = "delete from member WHERE  id=:did";
$query = $dbh->prepare($sql);
$query-> bindParam(':did',$did, PDO::PARAM_STR);
$query -> execute();

$msg="Record deleted Successfully ";
}


 ?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>General-Member </title>

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

						<h2 class="page-title">Current General Member's</h2>

						<!-- Zero Configuration Table -->
					
							<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
				<div class="btn-data-download">
				<a class="btn btn-primary" type="button" href="download-records-M.php">Download Member List</a></div>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
																				<th><b>Photo</th><th><b>Mermber ID</th> <th><b>Name</th> <th><b>Mobile</th><th><b>Bachelor Year</th><th><b>Status</th><th><b>Details & Update</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
										<th>#</th>
																				<th><b>Photo</th><th><b>Mermber ID</th> <th><b>Name</th> <th><b>Mobile</th><th><b>Bachelor Year</th><th><b>Status</th><th><b>Details & Update</th>
										</tr>
									</tfoot>
									<tbody>

<?php 

$sql = "SELECT * FROM member WHERE YearM >= DATE_SUB(NOW(),INTERVAL 2 YEAR) ORDER by MemId LIMIT 5";


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
											<td><img style='width: 66px;' src='../img/m/<?php echo htmlentities($result->Image);?>'></td>
			    <td><?php echo htmlentities($result->MemId);?></td>
				<td><?php echo htmlentities($result->Name);?></td>
				<td><?php echo htmlentities($result->Mobile);?></td>
				<td><?php echo htmlentities($result->Bachelor);?></td>
											
								
											
								<td>  
				
				<?php if($result->active==0)
				{?>
				<a type="button" class="btn btn-danger" href="general-member-current.php?public=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to avtive this member?')">  Inactive </a> 
				<?php } else {?>
                <div class="btn-group-vertical">
                    <a type="button" class="btn btn-success" href="general-member-current.php?hidden=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to inavtive this member?')">  Active </a>
                    <a type="button" target="_blank" href="send-ind-mail/index.php?id=<?php echo htmlentities($result->id);?>&member=general" class="btn btn-info">Send Mail</a>
                </div>
				<?php } ?>
				
				</td>		
										
										
			<td>
	    <div class="btn-group-vertical">
			<a type="button" class="btn btn-primary" href="details-view-m.php?id=<?php echo htmlentities($result->id);?>" target="_blank">  Details View </a> 
			<a type="button" class="btn btn-danger" href="edit-general-member.php?id=<?php echo htmlentities($result->id);?>" target="_blank"> Update </a> 
        </div>
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
