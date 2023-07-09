<?php
session_start();
error_reporting(0);
include('connect.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:login.php');
}
else{
if(isset($_GET['id'])){
	$sql = "SELECT * FROM member WHERE id =" .$_GET['id'];
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
}?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Update: <?php echo $row['MemId']; ?>-<?php echo $row['YearM']; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <script src="gen_validatorv4.js" type="text/javascript" xml:space="preserve"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    
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
    <link rel="stylesheet" href="css/style.edit.form.css">
	<link rel="stylesheet" href="css/style.css">
<!------ Include the above in your HEAD tag ---------->
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
<?php

    if(isset($_POST['update']))
    {
         $mem_id = $_POST['mem_id'];
        $name = $_POST['name'];
	$mailing_add = $_POST['mailing_add'];
	$permanent_add = $_POST['permanent_add'];
	$profesion = $_POST['profesion'];
	$designation = $_POST['designation'];
	$organization = $_POST['organization'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$bachelor_year = $_POST['bachelor_year'];
	$master_year = $_POST['master_year'];
	$date_m = $_POST['date_m'];


        $query = "UPDATE member SET MemId='$mem_id',Name='$name' ,Mailing='$mailing_add',Permanent='$permanent_add',
		Profession='$profesion',Designation='$designation',Organization='$organization',Mobile='$mobile',Email='$email',Bachelor='$bachelor_year',Master='$master_year', YearM='$date_m' WHERE id=". $_GET['id'];
	

        $result = mysqli_query($conn, $query);

        if($result==1)
        {       

         echo "Member's information updated successfully.";
        $msg="Your info submitted successfully";
        header("Refresh:2");
		
        
        }
        else {       

        echo "Sorry! Something wrong.";
        $error="Something went wrong. Please try again";
        header("Refresh:2");
    
		

             }
    }
?>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Update General Member * <span class="update-id"><?php echo $row['MemId']; ?></span></h2>  

						<div class="row">
							<div class="col-md-12">

<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

									<div class="panel-body">


            <form class="form-group" method="post" name="myform" id="myform" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                        
                        <img src="../img/m/<?php echo $row['Image']; ?>" id="profile-img-tag" width="100px" />
                      <br><br><a type="button" class="btn btn-warning" href="change-image-m.php"> Change image </a>
                            
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="profile-head">
                        
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p><input class="form-control" type="text" name="name" value="<?php echo $row['Name']; ?>" ></p>
                                            </div>
                                        </div>
                                        
                                         <div class="row">
                                            <div class="col-md-4">
                                                <label>Member ID</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p> <input class="form-control" type="text" name="mem_id" value="<?php echo $row['MemId']; ?>"  ></p>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Year</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p> <input class="form-control" type="text" name="date_m" value="<?php echo $row['YearM']; ?>"  ></p>
                                            </div>
                                        </div>

                        </div>
                    </div>
       
                </div>
                <div class="row">
            
                
                    <div class="col-md-12">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active in" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Mailing Address</label>
                                            </div>
                                            <div class="col-md-9">
                                                <p><textarea rows="6" class="form-control" type="text" name="mailing_add" value="<?php echo $row['Mailing']; ?>" ><?php echo $row['Mailing']; ?></textarea></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Permanent Address</label>
                                            </div>
                                            <div class="col-md-9">
                                                <p> <textarea rows="6" class="form-control" type="text" name="permanent_add" value="<?php echo $row['Prmanent']; ?>" ><?php echo $row['Permanent']; ?></textarea></p>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Profession</label>
                                            </div>
                                            <div class="col-md-9">
                                                <p><input class="form-control" type="text" name="profesion" value="<?php echo $row['Profession']; ?>"  ></p>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Designation</label>
                                            </div>
                                            <div class="col-md-9">
                                                <p><input class="form-control" type="text" name="designation" value="<?php echo $row['Designation']; ?>" ></p>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Organization</label>
                                            </div>
                                            <div class="col-md-9">
                                                <p><input class="form-control" type="text" name="organization" value="<?php echo $row['Organization']; ?>" ></p>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Mobile</label>
                                            </div>
                                            <div class="col-md-9">
                                                <p><input class="form-control" type="text" name="mobile" value="<?php echo $row['Mobile']; ?>"  ></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-9">
                                               <p> <input class="form-control" type="text" name="email" value="<?php echo $row['Email']; ?>"  ></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Bachelor Year</label>
                                            </div>
                                            <div class="col-md-9">
                                                <p><input class="form-control" type="text" name="bachelor_year" value="<?php echo $row['Bachelor']; ?>" ></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Master Year</label>
                                            </div>
                                            <div class="col-md-9">
                                                <p><input class="form-control" type="text" name="master_year" value="<?php echo $row['Master']; ?>"  ></p>
                                            </div>
                                        </div>
                                    
                            </div>
                            </div>
                        </div>
                        
                    </div>
              
            
  <input class="btn btn-success" type="submit" id="btnSubmit" name="update" value="Update" />
  <a class="btn btn-danger" href="member-move-to-lm.php?id=<?php echo $row['id'];?>">Copy to Life Members" </a>
</form>
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
<?php } ?>