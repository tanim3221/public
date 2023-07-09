<?php
session_start();
error_reporting(0);
include_once('connect.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:login.php');
}
else{
if(isset($_GET['Serial'])){
	$sql = "SELECT lifemembers.MemId, lifemembers.Image, lifemembers.Name,lifemembers.Email, lifemembers.Bachelor, participants.SlipAmount,participants.GuestCount,participants.SlipNo, participants.DipositDate, participants.SlipImage, participants.Serial, participants.status, participants.DateM, participants.Mobile  FROM participants  INNER JOIN
  lifemembers ON participants.id = lifemembers.id WHERE participants.CategoryM NOT IN ('Member') AND Serial =" .$_GET['Serial'];
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

}
$previous = "javascript:history.go(-1)";
if(isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}
?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

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
	<link rel="stylesheet" media="print" href="css/print.css">
<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
	<div class="content-wrapper">
			<div class="container-fluid">

<table id="pay-fees" width="100%">
    <tbody>
        <tr id="heading">
            <td  width="12%">
                <p><img style='width: 90px; float:left;' src='ruaaa.png'></p>
            </td>
            <td align= "center" colspan="3" width="75%">
                <p><strong>Rajshahi University Accounting Alumni Association (RUAAA)</strong>
                    <br /> Dept. of AIS, University of Rajshahi
                    <br /> Rajshahi-6205, Bangladesh
                     <br /> </p>
             </td>
            <td width="12%">
                <p><img style='width: 90px; float:right;' src='../img/lm/<?php echo $row["Image"]; ?>'></p>
            </td>
        </tr>

        <tr id="line" >
            <td style='text-align:center; color:red;' colspan="2" width="50%">
                <p><strong>Fee Payment Details</strong> <button type="button" class="btn btn-primary btn-sm" onclick="window.print()"><i class="fa fa-print"></i>  Print</button></p>
            </td>
            <td  width="15%">
                <p><strong>Submission Time</strong></p>
            </td>
            <td colspan="2" width="35%">
                <p><?php echo $row["DateM"]; ?></p>
            </td>
        </tr>
        <tr id="line">
            <td width="16%">
                <p><strong>Member ID &amp; Name</strong></p>
            </td>
            <td width="33%">
                <p><?php echo $row["Name"]; ?> (<?php echo $row["MemId"]; ?>)</p>
            </td>
            <td width="14%">
                <p><strong>Mobile</strong></p>
            </td>
            <td colspan="2" width="35%">
                <p><?php echo $row["Mobile"]; ?></p>
            </td>
        </tr>
        
        <tr id="line">
            <td width="16%">
                <p><strong>Slip No.</strong></p>
            </td>
            <td width="33%">
                <p><?php echo $row["SlipNo"]; ?></p>
            </td>
            <td  width="14%">
                <p><strong>Deposit Date</strong></p>
            </td>
            <td colspan="2" width="35%">
                <p><?php echo $row["DipositDate"]; ?></p>
            </td>
        </tr>
        <tr id="line">
            <td width="16%">
                <p><strong>Deposit Amount</strong></p>
            </td>
            <td width="33%">
                <p><?php echo $row["SlipAmount"]; ?></p>
            </td>
            <td width="14%">
                <p><strong>Guest Count</strong></p>
            </td>
            <td colspan="2" width="35%">
                <p><?php echo $row["GuestCount"]; ?></p>
            </td>
        </tr>
        <tr id="line">
            <td colspan="5" width="100%">
                <p><strong>Slip Image</strong></p>
            </td>
            
        </tr>
        <tr id="line">
            <p></p>
            
        </tr>
        <tr id="line">
             <td style='text-align:center;' colspan="5" >
                <p><img width="800px" src='../img/slips/<?php echo $row["SlipImage"]; ?>'></p>
            </td>
        </tr>
    </tbody>
</table>

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
		

<style>

.col-md-4 {
     margin-bottom: 15px;
}
.container-fluid, .content-wrapper {
    padding: 20px!important;
    background: #fff;
}

.profile-head {
    text-align: center;
}
.ruaaa-img {
    text-align: center;
}
p {
    font-size: 1em;
    margin-bottom: 0px;
}
.content-wrapper {
    background: #fff;
}    
      li.nav-item a {
    text-decoration: none;
}
     
  .ruaaa-img img {
    margin: auto;
    width: 100px;
    height: 100px;
    object-fit: cover;
}

.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    margin: auto;
    border-radius: 5px;
    margin: auto;
    width: 123.75px;
    height: 138.5px;
    object-fit: cover;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
       margin: 5% 0;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work {
    /* padding: 15px; */
    /* margin-top: -8%; */
    text-align: center;
}
.profile-work p{
    font-size: 16px;
    color: #818182;
    font-weight: 600;
    margin-top: 5%;
    margin-bottom:0px;
    
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
h3, .h3 {
    font-size: 24px;
    font-weight: bold;
    margin-top: 0px;
}
.ts-main-content .content-wrapper {
    margin-left: 250px;
    padding: 30px;
}
@media only screen and (max-width: 600px) {
        .ruaaa-img img {

    margin-top: -112px;
    opacity: .2;
}
    
.ts-main-content .content-wrapper {
    margin-left: unset!important;
}
.col-md-7, .col-md-8 {
    margin-bottom: 20px;
}

 .row {
    display: -ms-flexbox;
    display: unset; 
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
}

.profile-img img {
    margin: auto;
    width: 78.2px;
    height: 90.8px;
    object-fit: cover;
    border-radius: 5px;
}

.profile-img {
    text-align: center;
    margin-bottom: 25px;
}

.profile-head {
    text-align: center;
}
div#pro-work {
    margin-bottom: 30px;
    border-bottom: 2px solid #ddd;
    padding-bottom: 30px;
}
.profile-work {
    /* padding: 15px; */
    /* margin-top: -8%; */
    text-align: left;
}
.col, .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-auto, .col-lg, .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-auto, .col-md, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-auto, .col-sm, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-auto, .col-xl, .col-xl-1, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-auto {
    position: relative;
    width: 100%;
    min-height: 1px;
    padding-right: 0px;
    padding-left: 0px;
}

   .profile-head {
    margin-top: 21px;
}

}
</style>
<?php } ?>