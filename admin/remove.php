<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:login.php');
}
else{

if(isset($_REQUEST['dellm']))
	{
$did=intval($_GET['dellm']);
$sql = "delete from lifemembers WHERE  id=:did";
$query = $dbh->prepare($sql);
$query-> bindParam(':did',$did, PDO::PARAM_STR);
$query -> execute();

$msg="Life Member's Information Deleted Successfully ";
}


if(isset($_REQUEST['delm']))
	{
$did=intval($_GET['delm']);
$sql = "delete from member WHERE  id=:did";
$query = $dbh->prepare($sql);
$query-> bindParam(':did',$did, PDO::PARAM_STR);
$query -> execute();

$msg="General Member's Information Deleted Successfully ";
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
	
	<title>Remove Members </title>

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
					<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
				
                        <div class="col-md-6">
						<h2 class="page-title">Life Members</h2>

						<!-- Zero Configuration Table -->
					
							
										<table class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th><b>#</th><th><b>Photo</th>
									    <th><b>Mermber ID</th> <th><b>Name</th> <th><b>Mobile</th><th><b>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
									    <th><b>#</th><th><b>Photo</th>
									    <th><b>Mermber ID</th> <th><b>Name</th> <th><b>Mobile</th><th><b>Action</th>
										</tr>
									</tfoot>
									<tbody>

<?php $sql = "SELECT * FROM lifemembers ORDER BY Case LEFT (MemId, 2 )
                WHEN 'GD' Then 1
                WHEN 'DD' Then 2
                WHEN 'GM' Then 3
                WHEN 'LM' Then 4
                Else 5 End , MemId  ";
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
											
											<td><img style='width: 50px;' src='../img/lm/<?php echo htmlentities($result->Image);?>'></td>
											
				<td><?php echo htmlentities($result->MemId);?></td>
				<td><?php echo htmlentities($result->Name);?></td>
				<td><?php echo htmlentities($result->Mobile);?></td>
    			<td>
    			
    			<a type="button" class="btn btn-danger" onclick="return confirm('Do you really want to Delete <?php echo htmlentities($result->MemId);?>-<?php echo htmlentities($result->Name);?> ?')" href="remove.php?dellm=<?php echo htmlentities($result->id);?>"> Delete </a> 
    
    			</td>
										</tr>
										<?php $cnt=$cnt+1; }} ?>
										
									</tbody>
								</table>

				
					
                        </div>
                        
                            <div class="col-md-6">
                           
                           <h2 class="page-title">General Members</h2>

						<!-- Zero Configuration Table -->
				
										<table class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th><b>#</th><th><b>Photo</th>
									    <th><b>Mermber ID</th> <th><b>Name</th> <th><b>Mobile</th><th><b>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
									    <th><b>#</th><th><b>Photo</th>
									    <th><b>Mermber ID</th> <th><b>Name</th> <th><b>Mobile</th><th><b>Action</th>
										</tr>
									</tfoot>
									<tbody>

<?php $sql = "SELECT * from  member ORDER by MemId ";
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
											<td><img style='width: 50px;' src='../img/m/<?php echo htmlentities($result->Image);?>'></td>
				<td><?php echo htmlentities($result->MemId);?></td>
				<td><?php echo htmlentities($result->Name);?></td>
				<td><?php echo htmlentities($result->Mobile);?></td>
    			<td>
    			
    			<a type="button" class="btn btn-danger" onclick="return confirm('Do you really want to Delete <?php echo htmlentities($result->MemId);?>- <?php echo htmlentities($result->Name);?> ?')" href="remove.php?delm=<?php echo htmlentities($result->id);?>"> Delete </a> 
    
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