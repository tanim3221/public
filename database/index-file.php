						<h2 class="GrayBlue22b">Summary of RUAAA</h2>
								<div class="card-columns">			
									<a href="grand-donor-members.php" >
										<div class="card card-default">
											<div class="card-body bg-primary text-white">
												<div class="stat-card text-center">
												<?php 
$sql1 = "SELECT * FROM lifemembers WHERE CategoryM='GDM' AND active='1'";
$query1 = $dbh -> prepare($sql1);;
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$regbd=$query1->rowCount();
?>
													<div class="stat-card-number h1 "><?php echo htmlentities($regbd);?></div>
													<div class="stat-card-title text-uppercase">Grand Donor Member</div>
												</div>
											</div>
											<span class="block-anchor card-footer text-center">Full Details</span>
											</div>
									 </a>
									
									<a href="distinguished-donor-members.php">
									
										<div class="card card-default">
											<div class="card-body bg-danger text-white">
												<div class="stat-card text-center">
												<?php 
$sql6 = "SELECT * FROM lifemembers WHERE CategoryM='DDM' AND active='1'";
$query6 = $dbh -> prepare($sql6);;
$query6->execute();
$results6=$query6->fetchAll(PDO::FETCH_OBJ);
$query=$query6->rowCount();
?>
													<div class="stat-card-number h1 "><?php echo htmlentities($query);?></div>
													<div class="stat-card-title text-uppercase">Distinguished Member</div>
												</div>
											</div>
											<span class="block-anchor card-footer text-center">Full Details</span>
										</div>
								 </a>
									
									<a href="golden-members.php">
									
										
										<div class="card card-default">
											<div class="card-body bg-info text-white">
												<div class="stat-card text-center">
												<?php 
$sql5 = "SELECT * FROM lifemembers WHERE CategoryM='GM' AND active='1'";
$query5 = $dbh -> prepare($sql5);;
$query5->execute();
$results5=$query5->fetchAll(PDO::FETCH_OBJ);
$query=$query5->rowCount();
?>
													<div class="stat-card-number h1 "><?php echo htmlentities($query);?></div>
													<div class="stat-card-title text-uppercase">Golden Member</div>
												</div>
											</div>
											<span class="block-anchor card-footer text-center">Full Details</span>
										</div>
									</a>
									
									
																	    <a href="life-members.php">
								
										<div class="card card-default">
											<div class="card-body bg-success text-white">
												<div class="stat-card text-center">
<?php 
$sql = "SELECT * FROM lifemembers WHERE CategoryM='LM' AND active='1'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$bg=$query->rowCount();
?>
													<div class="stat-card-number h1 "><?php echo htmlentities($bg);?></div>
													<div class="stat-card-title text-uppercase">Life Member</div>
												</div>
											</div>
											<span class="block-anchor card-footer text-center">Full Details</span>
										</div>
									</a>
									
									<a href="general-members.php">
										
										<div class="card card-default">
											<div class="card-body bg-dark text-white">
												<div class="stat-card text-center">
												<?php 
$sql8 = "SELECT * From member WHERE YearM >=CURDATE() - INTERVAL 2 Year AND active='1'";
$query8 = $dbh -> prepare($sql8);;
$query8->execute();
$results8=$query8->fetchAll(PDO::FETCH_OBJ);
$query=$query8->rowCount();
?>
													<div class="stat-card-number h1 "><?php echo htmlentities($query);?></div>
													<div class="stat-card-title text-uppercase">General Member</div>
												</div>
											</div>
												<span class="block-anchor card-footer text-center">Full Details</span>
										</div>
									
									</a>
	
<?php $sql = "SELECT * from  activate WHERE id = '6'";
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

if($extime >= $servertime ) { ?>

	<?php  } else {?>								
									
									<a href="ruaaa-committee.php" target="_blank">
									
										<div class="card card-default">
											<div class="card-body bg-secondary text-white">
												<div class="stat-card text-center">
												<?php 
$sql0 = "SELECT * FROM lifemembers WHERE status IN ('1')";
$query0 = $dbh -> prepare($sql0);;
$query0->execute();
$results0=$query0->fetchAll(PDO::FETCH_OBJ);
$query=$query0->rowCount();
?>
													<div class="stat-card-number h1 "><?php echo htmlentities($query);?></div>
													<div class="stat-card-title text-uppercase"><?php echo htmlentities($result->text);?></div>
												</div>
											</div>
											<span class="block-anchor card-footer text-center">Full Details</span>
										</div>
									</a>

	<?php } ?>
<?php }} ?>										

<?php $sql = "SELECT * from  activate WHERE id = '5'";
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

if($extime >= $servertime ) { ?>

	<?php  } else {?>
									
									<a href="participants-list.php" target="_blank">
									
										<div class="card card-default">
											<div class="card-body bg-secondary text-white">
												<div class="stat-card text-center">
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
													<div class="stat-card-number h1 "><?php echo htmlentities($query) + htmlentities($query1) ;?></div>
													<div class="stat-card-title text-uppercase"><?php echo htmlentities($result->text);?></div>
												</div>
											</div>
											<span class="block-anchor card-footer text-center">Full Details</span>
										</div>
									</a>
									
					<?php } ?>
				<?php }} ?>	
									
								</div>
</body>
</html>
