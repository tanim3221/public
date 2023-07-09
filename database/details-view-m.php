<?php
error_reporting(0);
include_once('connect.php');


if(isset($_GET['id'])){
	$sql = "SELECT * FROM member WHERE id =" .$_GET['id'];
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

}
$previous = "javascript:history.go(-1)";
if(isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}
?>
<!--
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 add the above in your HEAD tag -->


        <div id="view-top" class="row">
        <div  class="col-md-4"> 
                <div class="profile-head">
                    <h3>
                        <?php echo $row["Name"]; ?>
                    </h3>
                    <h4>
                        <?php echo $row["MemId"]; ?>
                    </h4>
                    <h5> 
                        <?php echo $row["RuaaaPost"]; ?>
                    </h5>
                                    
                </div>
            </div>
            <div class="col-md-4"> 
   
                        <div class="ruaaa-img">
                            <img src="ruaaa.png" alt=""/>
                        </div>
                                            
                    
                    </div>
            <div class="col-md-4">  
                        <div class="profile-img">
                            <img src="../img/m/<?php echo $row["Image"]; ?>" alt=""/>
                            <br>
                            <button  id="hidden" type="button" class="btn btn-primary" onClick="window.print()"> <i class="fa fa-print"></i> Print Profile</button>
                        </div>
                        
                        
            </div>

            
        </div>

        <div id="details" class="row">
        
         <div class="col-md-8">
         
                    <div class="row">
                        <div class="col-md-4">
                            <label>Mailing Address</label>
                        </div>
                        <div class="col-md-7">
                            <p><?php echo $row["Mailing"]; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Permanent Address</label>
                        </div>
                        <div class="col-md-7">
                            <p><?php echo $row["Permanent"]; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Profession</label>
                        </div>
                        <div class="col-md-7">
                            <p><?php echo $row["Profession"]; ?></p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <label>Designation</label>
                        </div>
                        <div class="col-md-7">
                            <p><?php echo $row["Designation"]; ?></p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <label>Organization</label>
                        </div>
                        <div class="col-md-7">
                            <p><?php echo $row["Organization"]; ?></p>
                        </div>
                    </div>
                 
                                    
                        </div>
        
        <div class="col-md-4">
        <div class="row">
                        <div class="col-md-4">
                            <label>Mobile</label>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $row["Mobile"]; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Email</label>
                        </div>
                        <div class="col-md-8">
                           <p><?php echo $row["Email"]; ?> </p>
                        </div>
                    </div>
           <div class="row">
                        <div class="col-md-4">
                            <label>Bachelor Year</label>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $row["Bachelor"]; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Master Year</label>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $row["Master"]; ?></p>
                        </div>
                    </div>
                   
                        
        </div>
        
               <!-- <a class="btn btn-danger" href="complain-form.php">Report Complaints</a>   -->         
                </div>
