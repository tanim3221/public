<?php 
    session_start();
    include('users/inc/proshow.php'); 
    ?>
<div class="navbar-top">
	<div class="row">
		<div class="col-md-1" id="img-title1"><img style="float:left;" src="ruaaa.png" /></div>
		<div class="col-md-2" id="img-title3"><img src="ruaaa-logo.png" /></div>
		<div class="col-md-10" id="text-title" style="text-align:center;" >

			<span class="GrayBlue14b">Rajshahi University Accounting Alumni Association (RUAAA)</span><br />
			<span class="GrayBlue20bold">Dept. of AIS, University of Rajshahi</span><br />
			<span class="GrayBlue20bold">Rajshahi– 6205, Bangladesh</span>
		</div>
		<div class="col-md-1" id="img-title2" ><img style="float:right;" src="ru-logo.png"  /></div>
  </div>
 </div>

<nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
    
    <?php 
	if (!isset($_SESSION['loggedin']))
	{ ?>
		 <a class="navbar-brand" href="index.php">RUAAA</a>
<?php 	} else { ?>

<li class="nav-item dropdown" id="login-user">
    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" id="hidden" data-toggle="dropdown"><img style="width: 25px; height: 25px;" class="rounded-circle" src="../img/lm/<?=$Image?>" alt="">   <?=$MemId?>  </a>
    <div class="dropdown-menu loggedin">
        <p style="font-weight:bold;" class="dropdown-item"><?=$Name?></p>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="javascript:void(0)" onclick="location.href='edit-my-info.php'"> <i class="fa fa-pencil"></i> Update Profile</a>
        <a class="dropdown-item" href="javascript:void(0)" onclick="location.href='change-photo.php'"> <i class="fa fa-camera"></i>Change Photo</a>
        <a class="dropdown-item" href="javascript:void(0)" onclick="location.href='change-pass.php'"> <i class="fa fa-lock"></i>Change Password</a>
        <div class="dropdown-divider"></div>
    <a class="dropdown-item" onclick="return confirm('Are you sure want to logout?')" href="users/logout.php">Logout</a>
    
    </div>
</li>

<?php } ?>
    
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    
	<span class="navbar-toggler-icon"></span>
    
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" id="hidden" data-toggle="dropdown"><i class="fa fa-plus-circle"></i> Members </a>
      <div class="dropdown-menu">
        <a href="javascript:void(0)" onclick="window.open('grand-donor-members.php', '_blank')" class="dropdown-item"><i class="fa fa-user"></i> Grand Donor Member</a>

        <a href="javascript:void(0)" onclick="window.open('distinguished-donor-members.php', '_blank')" class="dropdown-item"><i class="fa fa-user"></i> Distinguished Donor Member</a>
      
        <a href="javascript:void(0)" onclick="window.open('golden-members.php', '_blank')" class="dropdown-item"><i class="fa fa-user"></i> Golden Member</a>
      
        <a href="javascript:void(0)" onclick="window.open('life-members.php', '_blank')" class="dropdown-item"><i class="fa fa-user"></i> Life Member</a>
      
        <a href="javascript:void(0)" onclick="window.open('general-members.php', '_blank')" class="dropdown-item"><i class="fa fa-user"></i> General Members</a>
     </div>
     
      </li> 
	 
       <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" id="hidden" data-toggle="dropdown"><i class="fa fa-plus-circle"></i>  Registration </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="javascript:void(0)" onclick="location.href='registration-info.php'"><i class="fa fa-info-circle"></i>  Registration Information</a>
        <a class="dropdown-item" href="javascript:void(0)" onclick="location.href='new-members-registration.php'"><i class="fa fa-plus-circle"></i>  New Members registration </a>
        <a class="dropdown-item" href="javascript:void(0)" onclick="location.href='payment-fees.php'"><i class="fa fa-check-circle"></i>  Registration for program</a>
      </div>
    </li>
 
<li class="nav-item">
        <a href="javascript:void(0)" onclick="location.href='complain-form.php'" id="hidden"  class="nav-link"><i class="fa fa-exclamation-circle"></i>   Complain</a>
      </li> 
    <?php 
	if (!isset($_SESSION['loggedin']))
	{ ?>
		<li class="nav-item" id="login-btn">
        <a href="javascript:void(0)" onclick="location.href='users-login.php'"  class="nav-link"><i class="fa fa-lock"></i>  Login</a>
      </li>
<?php 	} else { ?>

<?php } ?>
      
    </ul>
  </div>  
</nav>
