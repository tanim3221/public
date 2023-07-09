<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:login.php');
}
else{

if(isset($_REQUEST['nonapproved'])){
$eid=intval($_GET['nonapproved']);
$status="1";
$sql = "UPDATE participants SET Status=:status WHERE Serial=:eid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':eid',$eid, PDO::PARAM_STR);
$query -> execute();

$msg="Deposit Slip Approved";
}


if(isset($_REQUEST['approved'])){
$aeid=intval($_GET['approved']);
$status=0;
$sql = "UPDATE participants SET Status=:status WHERE  Serial=:aeid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
$query -> execute();

$msg="Deposit Slip Disapproved";
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
	
	<title>Payment Paid List (GDM, DDM, GM, LM) </title>

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

						<h2 class="page-title">Payment Paid List (GDM, DDM, GM, LM)</h2>

						<!-- Zero Configuration Table -->
			
							<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
					<div class="btn-data-download">
				<a class="btn btn-primary" type="button" href="download-payment-LM.php">Download Lifemembers Participants</a></div>
				
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
											<th>Photo</th> 
										<th>Member ID</th>
                                    <th>Name</th>
                                   
                                    <th>Mobile</th>
                                    <th>Slip Amount</th>
                                    <th>Guest Count</th>
                                    <th>Slip No</th>
                                   <th>Submission Date</th>
                                    <th>Deposit Date</th>
                                    <th>Slip Image</th>
                                    <th>Graduation</th>
                                    <th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
										<th>#</th>
											<th>Photo</th> 
										<th>Member ID</th>
                                    <th>Name</th>
                                   
                                    <th>Mobile</th>
                                    <th>Slip Amount</th>
                                    <th>Guest Count</th>
                                    <th>Slip No</th>
                                   <th>Submission Date</th>
                                    <th>Deposit Date</th>
                                    <th>Slip Image</th>
                                    <th>Graduation</th>
                                    <th>Action</th>
										</tr>
										</tr>
									</tfoot>
									<tbody>

<?php $sql = "SELECT lifemembers.MemId, lifemembers.Image, lifemembers.Name,lifemembers.Email, lifemembers.Bachelor, participants.SlipAmount,participants.GuestCount,participants.SlipNo, participants.DipositDate, participants.SlipImage, participants.Serial, participants.status, participants.DateM, participants.Mobile  FROM participants  INNER JOIN
  lifemembers ON participants.id = lifemembers.id WHERE participants.CategoryM NOT IN ('Member') ORDER BY status ASC";
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
			<td><?php echo htmlentities($result->Mobile);?></td>
			<td><?php echo htmlentities($result->SlipAmount);?></td>
			<td><?php echo htmlentities($result->GuestCount);?></td>
			<td><?php echo htmlentities($result->SlipNo);?></td>
		    <td><?php echo htmlentities($result->DateM);?></td>
			<td><?php echo htmlentities($result->DipositDate);?></td>
			<td><img style='width: 66px;' src='../img/slips/<?php echo htmlentities($result->SlipImage);?>'></td>
			<td><?php echo htmlentities($result->Bachelor);?></td>

			<td>
			<div class="btn-group-vertical">
			<a  type="button" class="btn btn-primary" href="payment-details-lm.php?Serial=<?php echo htmlentities($result->Serial);?>" target="_blank">  Details View </a> 


				<?php if($result->status==1)
				{?>
				<a type="button" class="btn btn-success" href="new-payment-lm.php?approved=<?php echo htmlentities($result->Serial);?>" onclick="return confirm('Do you really want to disapprove deposit slip?')">  Approved </a> 
				<?php } else {?>

				<a type="button" class="btn btn-danger" href="new-payment-lm.php?nonapproved=<?php echo htmlentities($result->Serial);?>" onclick="return confirm('Do you really want to approve deposit slip ?')"> Not Approved </a>

				<?php } ?>
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