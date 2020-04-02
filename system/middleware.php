<?php
	// start sesion
	session_start();
	
	// if user is NOT logged in, redirect them to login page
	if (!isset($_SESSION['user'])) {
		header("location:http://localhost/overseas/index.php");
	}

	// if user is logged in and this user is NOT an admin user, redirect them to landing page
	/*if (isset($_SESSION['user']) && ($_SESSION['user']['roleId'] != 1)) {
		header("location: " . BASE_URL . "index.php");
	}*/
?>