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
$status="0";
$sql = "UPDATE lifemembers  SET Status=:status WHERE  id=:eid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':eid',$eid, PDO::PARAM_STR);
$query -> execute();

$msg="Removed from committee member of RUAAA";
}


if(isset($_REQUEST['public']))
	{
$aeid=intval($_GET['public']);
$status=1;

$sql = "UPDATE lifemembers SET Status=:status WHERE  id=:aeid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
$query -> execute();

$msg="Included as a committee member of RUAAA.";
}
if(isset($_REQUEST['del']))
	{
$did=intval($_GET['del']);
$sql = "delete from lifemembers WHERE  id=:did";
$query = $dbh->prepare($sql);
$query-> bindParam(':did',$did, PDO::PARAM_STR);
$query -> execute();

$msg="Info deleted Successfully ";
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
	
	<title>RUAAA Committee </title>

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

						<h2 class="page-title">RUAAA Committee</h2>

						<!-- Zero Configuration Table -->
					
							<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
				<div class="btn-data-download">
				<a class="btn btn-primary" type="button" href="download-records-COMMITTEE.php">Download Committee List</a></div>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
											<th><b>Photo</th><th><b>Mermber ID</th> <th><b>Name</th><th><b>Committee Designation</th> <th><b>Bachelor Year</th><th><b>Master Year</th><th><b>Action</th><th><b>Details</th><th><b>Update</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
										<th>#</th>
										<th><b>Photo</th><th><b>Mermber ID</th> <th><b>Name</th><th><b>Committee Designation</th> <th><b>Bachelor Year</th><th><b>Master Year</th><th><b>Action</th><th><b>Details</th><th><b>Update</th>
										</tr>
									</tfoot>
									<tbody>

<?php 
$sql = "SELECT * from  lifemembers  WHERE status IN ('1') ORDER BY Case RuaaaPost
    WHEN 'President' Then 1
    WHEN 'Vice President (1)' Then 2
    WHEN 'Vice President (2)' Then 3
    WHEN 'Vice President (3)' Then 4
	WHEN 'General Seretary' Then 5
    WHEN 'Tresurer' Then 6
    WHEN 'Joint Seretary (1)' Then 7
	WHEN 'Joint Seretary (2)' Then 8
	WHEN 'Organizing Secretory (1)' Then 9
	WHEN 'Organizing Secretary (2)' Then 10
    WHEN 'Office and Press Secretary' Then 11
    Else 12 End ";

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
			<td><?php echo htmlentities($result->RuaaaPost);?></td>
			<td><?php echo htmlentities($result->Bachelor);?></td>
			<td><?php echo htmlentities($result->Master);?></td>
			<td>
			<?php if($result->status==1)
			{?>
			<a type="button" class="btn btn-warning" href="ruaaa-committee.php?hidden=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to remove from committee member?')">  Remove </a> 
			<?php } else {?>

			<a type="button" class="btn btn-success" href="ruaaa-committee.php?public=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to include to committee member?')"> Committee</a>
			<?php } ?>

			</td>
			
			<td>
			
			<a type="button" class="btn btn-primary" href="details-view.php?id=<?php echo htmlentities($result->id);?>">  Details View </a> 

			</td>
			<td>
			
			<a type="button" class="btn btn-primary" href="edit-life-members.php?id=<?php echo htmlentities($result->id);?>"> Update </a> 

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
