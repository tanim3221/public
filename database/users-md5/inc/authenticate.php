<?php
session_start();
// Change this to your connection info.
require 'connect.php';
// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if (!isset($_POST['Email'], $_POST['Password'])) {
    // Could not get the data that should have been sent.
    echo "<script>alert('Please fill both the Email and Password field'); window.location='../../users-login.php'</script>";  
    
	// echo '<div style="text-align: center;background: red;width: 70%;margin: 0px auto;padding: 10px;border-radius: 10px;color: #fff;font-weight: bold;" >Please fill both the Student ID and Phone field <br> Please try again with all informations <br><br> <a class="login-button"   href="../index.php"><button>Login  </button> </a> </div> ';
     die ();
}
// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $conn->prepare('SELECT id, Password FROM lifemembers WHERE Email = ?')) {
    // Bind parameters (s = string, i = int, b = blob, etc), in our case the Email is a string so we use "s"
    $stmt->bind_param('s', $_POST['Email']);
    $stmt->execute();
    // Store the result so we can check if the account exists in the database.
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $Password);
        $stmt->fetch();
        // Account exists, now we verify the Password.
        // Note: remember to use Password_hash in your registration file to store the hashed Passwords.
        if (md5($_POST['Password']) === $Password) {
            // Verification success! User has loggedin!
            // Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['Email']     = $_POST['Email'];
            $_SESSION['id']       = $id;
            
            
            //header('Location: ../../index.php');
            
            echo "<script>alert('Successfully Loggedin.'); window.location='../../index.php'</script>";
            
        } else {
                 
               echo "<script>alert('Incorrect Password, Please try again.'); window.location='../../users-login.php'</script>";  
                 
            //echo '<div id="error-text" >Incorrect Password<br>Please try again <br><br> <a class="login-button"   href="../../users-login.php"><button>Login  </button> </a> </div> ';
        }
    } else {
    
    echo "<script>alert('Incorrect Email Address, Please try again.'); window.location='../../users-login.php'</script>";
               
        //echo '<div id="error-text" >Incorrect Email Address<br>Please try again<br><br> <a class="login-button"   href="../../users-login.php"><button>Login  </button> </a> </div> ';
       
    }
    $stmt->close();
}
?>

<style>
 #error-text {
        text-align: center;
        background: red;
        width: 60%;
        margin: 0px auto;
        padding: 10px;
        border-radius: 10px;
        color: #fff;
        font-weight: bold;
	}
</style>

