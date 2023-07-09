<?php
session_start();
session_destroy();
// Redirect to the login page:

echo "<script>alert('Successfully logged out.'); window.location='/index.php'</script>";

//header('Location: /index.php');
?>