<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:login.php');
}
else{
    
if(isset($_REQUEST['deactivate']))	{
$eid=intval($_GET['deactivate']);
$expire= "";
$sql = "UPDATE activate SET Expire=:expire WHERE  id=:eid";
$query = $dbh->prepare($sql);
$query -> bindParam(':expire',$expire, PDO::PARAM_STR);
$query-> bindParam(':eid',$eid, PDO::PARAM_STR);
$query -> execute();

$msg="Item Deactivated Successfully";
}

?>
<title>RUAAA || Settings Status</title>
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
	<link rel="stylesheet" href="css/bootstrap-datetimepicker.css">

	
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
		
		
	
<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

          <div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Settings Status</h2>
						
						
						<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?></div><?php }?>

			
                        <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Item Name</th>
                                    <th>Status</th>
                                    <th>Text</th>
                                  
                                    <th>Action</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php
								$conn = new PDO('mysql:host=localhost; dbname=ruaaa_v2','root', ''); 
								$result = $conn->prepare("SELECT * FROM activate ORDER BY id");
								date_default_timezone_set("Asia/Dhaka");
								$result->execute();
								for($i=0; $row = $result->fetch(); $i++){
								$id=$row['id'];
								$extime = date('d/m/Y - h:i a');
                                $servertime= $row['expire'];
							?>
		
							
								<tr>
								
									
								<td> <?php echo $row ['name']; ?>  </td>
								<td><?php if($extime >= $servertime)	{ ?>

<span class="expire-date">Deactivated</span>

<?php } else {?>


<a style="" tabindex="0"
   class="btn btn-success" 
   role="button" 
   data-html="true" 
   data-toggle="popover" 
   data-placement="right" 
   data-trigger="focus" 
   title="<span class='expire-date-title' style='font-size: 16px;' > <?php echo $row ['name']; ?> Deactivation Date & Time</span>" 
   data-content=" <span class='expire-date' style='font-size: 16px;' > <?php echo $row ["expire"]; ?></span> <br><br> <a type='button'  class='btn btn-danger' href='settings-status.php<?php echo "?deactivate=".$id; ?>'>Deactivate Now</a>">Activated</a>

<?php } ?>  </td>
								<td> <?php echo $row ['text']; ?></td>
								
								<td>
									 <a href="#delete<?php echo $id;?>"  data-toggle="modal"  class="btn btn-warning" >Change Settings</a>
								</td>
								</tr>
										<!-- Modal -->
							
							<div id="delete<?php  echo $id;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
   
     						 <div class="modal-content">
							<div class="modal-header">
							<h3 id="myModalLabel">Change Settings <?php echo $row ['name']; ?></h3>
							</div>
							
							<div class="modal-body">
							
						
							<form action="settings-sys.php<?php echo '?id='.$id; ?>" method="post" enctype="multipart/form-data">
							
								<div class="form-group">
		                                <label>Status:</label>	 					
                                        <?php if( $extime >= $servertime ) { ?>
                                        <span class="expire-date">Deactivated</span>
                                       <?php } else { ?>
                                       <span class="expire-date-ena">Activated</span>
                                        <?php } ?> </span>
  							</div>
							
							<div class="form-group">
							<label>Set Text</label>
							
								<input class="form-control" type="text" value="<?php echo $row ['text']; ?>" name="text" id="file">
								</div>

                    <div class="form-group">
                    <label>Deactivation Date & Time </label>
                    
                    <div class="input-group date form_datetime" data-date-format="dd/mm/yyyy - HH:ii p" data-link-field="dtp_input1">
                    <input class="form-control" size="16" name="expire" type="text" value="<?php echo $row ['expire']; ?>" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
				<input type="hidden" id="dtp_input1" value="" /><br/>
                    
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
	<script src="js/bootstrap-datetimepicker.uk.js"></script>
	<script src="js/bootstrap-datetimepicker.js"></script>
	<script>
	    $(function(){
 
        $("[data-toggle=popover]").popover();
        });
	    
	</script>
	
	<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        language:  'uk',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
	$('.form_date').datetimepicker({
        language:  'uk',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.form_time').datetimepicker({
        language:  'uk',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });
</script>

</body>
</html>

<?php } ?>
