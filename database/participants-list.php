<?php
include('config.php');

$sql = "SELECT * from  activate WHERE id = '5'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0){
foreach($results as $result) {	?>	
					
<?php 
$extime = date('d/m/Y - h:i a');
$servertime= $result->expire;
$text= $result->text;

if($extime >= $servertime ) { ?>
            
<meta http-equiv='refresh' content='0;url=https://member.ruaaa.org/'>
	
<?php } else {?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('head.php'); ?>
</head>

	<body>

		<div class="container-fluid">

			
				<?php include('header.php'); ?>
			

			<div class="container-body">
				<?php include("participants-file.php");?>
			</div>

			<div class="container-footer">
				<?php include('footer.php'); ?>
			</div>

		</div>

	</body>
</html>
<?php } ?>
<?php }} ?>