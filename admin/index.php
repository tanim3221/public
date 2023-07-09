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
    <meta content='width=device-width, initial-scale=1.0' name='viewport' />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta content='Members Database | RUAAA' property='og:title' />
    <meta property="og:type" content="RUAAA Database | RU" />
    <meta content='An initiative by RUAAA' property='og:description' />
    <meta property="og:image" content="img.jpg">
    <meta property="og:url" content="http://www.ruaaa.org" />

    <link rel="icon" href="favicon.ico" type="image/x-generic" />
	
	<title>RUAAA | Admin Dashboard</title>

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
</head>

<body>
<?php include('includes/header.php');?>

	<div class="ts-main-content">
<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">


                <div class="row">
					<div class="col-md-12">

						<!--<h2 class="page-title">Form Enable/Disable</h2>-->
						
						
						
						<div class="row">
							<div class="col-md-12">
								<div class="row">
								    
								    
								    <a href="settings-status.php" >
									<div class="col-md-3">
										<div class="panel panel-info">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
												
													<div class="stat-panel-number h2 ">Settings</div>
													<div class="stat-panel-title text-uppercase">You can change your settings</div>
												</div>
											</div>
									
										</div>
									</div> </a>
									
									</div>
									</div>
									</div>
									</div>
									</div>

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">New Registration  List</h2>
						
						
						
						<div class="row">
							<div class="col-md-12">
								<div class="row">
								    
					
									<a href="new-registration-lm.php" >
									<div class="col-md-3">
										<div class="panel panel-danger">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
												<?php 
$sql99 = "SELECT * FROM lifemembers WHERE active='0' ";
$query99 = $dbh -> prepare($sql99);;
$query99->execute();
$results99=$query99->fetchAll(PDO::FETCH_OBJ);
$regbd=$query99->rowCount();
?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($regbd);?></div>
													<div class="stat-panel-title text-uppercase">New Registration <br> (GDM, DDM, GM, LM)</div>
												</div>
											</div>
									
										</div>
									</div> </a>
									
									<a href="new-registration-m.php" >
									<div class="col-md-3">
										<div class="panel panel-danger">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
												<?php 
$sql99 = "SELECT * FROM member WHERE active='0' ";
$query99 = $dbh -> prepare($sql99);;
$query99->execute();
$results99=$query99->fetchAll(PDO::FETCH_OBJ);
$regbd=$query99->rowCount();
?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($regbd);?></div>
													<div class="stat-panel-title text-uppercase">New Registration <br> (General Members)</div>
												</div>
											</div>
									
										</div>
									</div> </a>
									
									</div>
									</div>
									</div>
									</div>
									</div>
				
				
					<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">New Payment Paid List</h2>
						
						
						
						<div class="row">
							<div class="col-md-12">
								<div class="row">					
									
									<a href="new-payment-lm.php" >
									<div class="col-md-3">
										<div class="panel panel-danger">
											<div class="panel-body bk-danger text-light">
												<div class="stat-panel text-center">
												<?php 
$sql99 = "SELECT * FROM participants WHERE CategoryM NOT IN ('Member') AND status='0'  " ;
$query99 = $dbh -> prepare($sql99);;
$query99->execute();
$results99=$query99->fetchAll(PDO::FETCH_OBJ);
$regbd=$query99->rowCount();
?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($regbd);?></div>
													<div class="stat-panel-title text-uppercase">New Payment Paid List<br> (GDM, DDM, GM, LM)</div>
												</div>
											</div>
									
										</div>
									</div> </a>
									
									
									
									<a href="new-payment-m.php" >
									<div class="col-md-3">
										<div class="panel panel-danger">
											<div class="panel-body bk-danger text-light">
												<div class="stat-panel text-center">
												<?php 
$sql99 = "SELECT * FROM participants WHERE CategoryM IN ('Member') AND status='0' ";
$query99 = $dbh -> prepare($sql99);;
$query99->execute();
$results99=$query99->fetchAll(PDO::FETCH_OBJ);
$regbd=$query99->rowCount();
?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($regbd);?></div>
													<div class="stat-panel-title text-uppercase">New Payment Paid List <br> (General Members)</div>
												</div>
											</div>
									
										</div>
									</div> </a>
									
									
										<a href="current-year-participants.php">
									<div class="col-md-3">
										<div class="panel panel-primary">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
<?php 
$sql001 = "SELECT * FROM lifemembers WHERE participants IN ('1')";
$query001 = $dbh -> prepare($sql001);;
$query001->execute();
$results001=$query001->fetchAll(PDO::FETCH_OBJ);
$query=$query001->rowCount();

$sql0001 = "SELECT * From member WHERE YearM >=CURDATE() - INTERVAL 2 Year";
$query0001 = $dbh -> prepare($sql0001);;
$query0001->execute();
$results001=$query0001->fetchAll(PDO::FETCH_OBJ);
$query1=$query0001->rowCount();
?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($query) + htmlentities($query1) ;?></div>
													<div class="stat-panel-title text-uppercase">Participants <br> <?php echo date("Y"); ?></div>
												</div>
											</div>
											
										</div>
									</div></a>
									
									
									</div>
									</div>
									</div>
									</div>
									</div>

					<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Summary of RUAAA</h2>	
						
						<div class="row">
							<div class="col-md-12">
								<div class="row">
								    
								    

									<a href="grand-donor-member.php" >
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
												<?php 
$sql1 = "SELECT * FROM lifemembers WHERE CategoryM IN ('GDM') ";
$query1 = $dbh -> prepare($sql1);;
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$regbd=$query1->rowCount();
?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($regbd);?></div>
													<div class="stat-panel-title text-uppercase">Grand Donor Member</div>
												</div>
											</div>
									
										</div>
									</div> </a>
									<a href="distinguished-donor-member.php" >
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-warning text-light">
												<div class="stat-panel text-center">
												<?php 
$sql6 = "SELECT * FROM lifemembers WHERE CategoryM IN ('DDM') ";
$query6 = $dbh -> prepare($sql6);;
$query6->execute();
$results6=$query6->fetchAll(PDO::FETCH_OBJ);
$query=$query6->rowCount();
?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($query);?></div>
													<div class="stat-panel-title text-uppercase">Distinguished Member</div>
												</div>
											</div>
										
										</div>
									</div></a>
									<a href="golden-member.php">
										<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
												<?php 
$sql5 = "SELECT * FROM lifemembers WHERE CategoryM IN ('GM') ";
$query5 = $dbh -> prepare($sql5);;
$query5->execute();
$results5=$query5->fetchAll(PDO::FETCH_OBJ);
$query=$query5->rowCount();
?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($query);?></div>
													<div class="stat-panel-title text-uppercase">Golden Member</div>
												</div>
											</div>
							
										</div>
									</div>
									</a>
									
									<a href="life-member.php">								    
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
<?php 
$sql = "SELECT * from  lifemembers WHERE CategoryM='LM' AND active='1' ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$bg=$query->rowCount();
?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($bg);?></div>
													<div class="stat-panel-title text-uppercase">Life Member's</div>
												</div>
											</div>
										
										</div>
									</div></a>
										<a href="general-member-current.php">
										<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-warning text-light">
												<div class="stat-panel text-center">
												<?php 
$sql8 = "SELECT * From member WHERE YearM >=CURDATE() - INTERVAL 2 Year";
$query8 = $dbh -> prepare($sql8);;
$query8->execute();
$results8=$query8->fetchAll(PDO::FETCH_OBJ);
$query=$query8->rowCount();
?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($query);?></div>
													<div class="stat-panel-title text-uppercase">Current Member</div>
												</div>
											</div>
										 
										</div>
									</div></a>
									<a href="ruaaa-committee.php">
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-danger text-light">
												<div class="stat-panel text-center">
												<?php 
$sql0 = "SELECT * FROM lifemembers WHERE status IN ('1')";
$query0 = $dbh -> prepare($sql0);;
$query0->execute();
$results0=$query0->fetchAll(PDO::FETCH_OBJ);
$query=$query0->rowCount();
?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($query);?></div>
													<div class="stat-panel-title text-uppercase">RUAAA Committee</div>
												</div>
											</div>

										</div>
									</div></a>
									<a href="manage-complaints.php">
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
												<?php 
$sql00 = "SELECT * FROM complaints WHERE status IS NULL";
$query00 = $dbh -> prepare($sql00);;
$query00->execute();
$results00=$query00->fetchAll(PDO::FETCH_OBJ);
$query=$query00->rowCount();
?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($query);?></div>
													<div class="stat-panel-title text-uppercase">New Complaints</div>
												</div>
											</div>
											
										</div>
									</div></a>
									<a href="moved-from-member.php">
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
												<?php 
$sql01 = "SELECT * FROM lifemembers WHERE MemId LIKE 'M%'";
$query01 = $dbh -> prepare($sql01);;
$query01->execute();
$results01=$query01->fetchAll(PDO::FETCH_OBJ);
$query=$query01->rowCount();
?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($query);?></div>
													<div class="stat-panel-title text-uppercase">Moved Members</div>
												</div>
											</div>
											
										</div>
									</div></a>
									
									
								
							
								</div>
							</div>
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
	
	<script>
		
	window.onload = function(){
    
		// Line chart from swirlData for dashReport
		var ctx = document.getElementById("dashReport").getContext("2d");
		window.myLine = new Chart(ctx).Line(swirlData, {
			responsive: true,
			scaleShowVerticalLines: false,
			scaleBeginAtZero : true,
			multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
		}); 
		
		// Pie Chart from doughutData
		var doctx = document.getElementById("chart-area3").getContext("2d");
		window.myDoughnut = new Chart(doctx).Pie(doughnutData, {responsive : true});

		// Dougnut Chart from doughnutData
		var doctx = document.getElementById("chart-area4").getContext("2d");
		window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive : true});

	}
	</script>
</body>
</html>
<?php } ?>