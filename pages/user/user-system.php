<?php 
//==========================//==========================//

	require('../../system/dbConnection.php');

	require('../../system/tables-scripts/table-user.php');

//==========================//==========================//

	$path = "Location: register.php?";

//==========================//==========================//


	if (isset($_POST['register-user'])) {

		$fName = $_POST['fName'];
		$lName = $_POST['lName'];
		$email = $_POST['email'];
		$pwd = $_POST['pwd'];
		$pwd_repeat = $_POST['pwd-repeat'];
		$city = $_POST['city'];
		$country = $_POST['country'];
		$role = $_POST['role'];

		if (empty($fName) || empty($lName) || empty($email) || empty($pwd) || empty($pwd_repeat) || empty($city) || empty($country) || empty($role)) {
			header($path."error=emptyfields&fname=".$fName."&lname=".$lName."&email=".$email."&pwd=".$pwd."&repeta=".$pwd_repeat."&city=".$city."&country=".$country."&role=".$role);
			exit();
		} 

		if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match("/^[a-zA-Z0-9]*$/", $fName) || !preg_match("/^[a-zA-Z0-9]*$/", $lName)) {
			header($path."error=invalidfields");
			exit();
		}

		if ($pwd !== $pwd_repeat) {
			header($path."error=passwordcheck&uid=".$username."&mail=".$email);
			exit();
		}

		addUser ($fName, $lName, $email, $pwd, $country, $city, $role, $conn, $path);

	} // register-user


	/*if (isset($_GET[''])) {

	}*/


	if (isset($_POST['logout-user'])) {
		logoutUser ();

	} // logout-user

	if (isset($_POST['login-user'])) {

		$email = $_POST['email'];
		$password = $_POST['password'];

		if(empty($email) || empty($password)) {
			header($path."error=emptyfields");
			exit();
		}

		loginUser($email, $password, $conn);

	} // login-user

//==========================//==========================//

?>