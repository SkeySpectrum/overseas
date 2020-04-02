<?php

//==========================//==========================//

	// variables to connect db
	$servername = "localhost";
	$dBUsername = "root";
	$dBPassword = "";
	$dBName = "dbportugueseoverseas";
	
	// connect to database
	$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

	// check connection
	if (!$conn) {
		die("Connection failed: ".mysqli_connect_error());
	}

//==========================//==========================//

?>