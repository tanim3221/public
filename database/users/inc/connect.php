<?php

    /*$servername = "localhost";
	$username   = "root";
	$password   = "";
	$dbname     = "ruaaa_v2";
	// Create connection
	$conn       = new mysqli($servername, $username, $password, $dbname);
	
	mysqli_query($conn,'SET CHARACTER SET utf8'); 
	
	mysqli_query($conn,"SET SESSION collation_connection ='utf8_general_ci'");
	// Check connection
	if ($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	}*/
	
	
	 $servername = "localhost";
	$username   = "root";
	$password   = "";
	$dbname     = "ruaaa_v2";
	// Create connection
	$conn       = new mysqli($servername, $username, $password, $dbname);
	
	mysqli_query($conn,'SET CHARACTER SET utf8'); 
	
	mysqli_query($conn,"SET SESSION collation_connection ='utf8_general_ci'");
	// Check connection
	if ($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	}