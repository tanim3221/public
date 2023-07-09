<?php
if (!isset($_SESSION['loggedin']))
	{
		header('Location:users-login.php');
		exit();
	}
else{?>

    <?php
								$conn = new PDO('mysql:host=localhost; dbname=ruaaa_v2','root', ''); 
								$result = $conn->prepare("SELECT * FROM lifemembers WHERE id =" .$_SESSION['id']);
								$result->execute();
								for($i=0; $row = $result->fetch(); $i++){
								$id=$_SESSION['id'];
							?>

<p><h2 class="GrayBlue22b"> Change Photo <br> <?php echo $row['MemId']; ?> </h2></p>
        <div class="img-view">

            <?php if($row['Image'] != ""): ?>
                <img src="../img/lm/<?php echo $row['Image']; ?>" width="100px" id="profile-img-tag">
                <?php else: ?>
                    <img src="demo.png" width="100px" height="100px" id="profile-img-tag">
                    <?php endif; ?>
        </div>
        <br>
        <div class="img-input">
        <form class="form-group" onSubmit="return Validate();" action="users/edit-photo-sys.php<?php echo '?id='.$id; ?>" method="post" enctype="multipart/form-data">
            <p><span id="errorName5" style="color: red;"></span>
                <input class="form-control" type="file" name="image" onchange="loadFile(event)" id="image" required>
            </p>

            <button type="submit" onclick="return confirm('Do you really want to change your photo?')" name="submit" class="btn btn-danger">Save Change</button>
            <button type="button"  class="btn btn-outline-success" href="javascript:void(0)" onclick="location.href='edit-my-info.php'">Update Profile</button> 

        </form>
        </div>

        <?php }     } ?>