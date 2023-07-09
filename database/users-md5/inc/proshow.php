<?php

require 'connect.php';
// We don't have the phone or email info stored in sessions so instead we can get the results from the database.
$stmt = $conn->prepare('SELECT  Image, MemId,Name,Mailing,Permanent,Mobile,Email,Profession,Designation,Organization, Bachelor, Master , RuaaaPost FROM lifemembers WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('s', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($Image, $MemId, $Name,  $Mailing, $Permanent, $Mobile, $Email, $Profession, $Designation, $Organization, $Bachelor, $Master, $RuaaaPost);
$stmt->fetch();
$stmt->close();
?>