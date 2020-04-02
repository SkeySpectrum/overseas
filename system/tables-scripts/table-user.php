<?php
	
	function addUser (String $fName, String $lName, String $email, String $password, int $country, int $city, int $role, mysqli $conn, String $path) {
		$val = validateEmailUser($email, $conn);

		$hashedPwd = password_hash($password, PASSWORD_DEFAULT);

		if ($val == 0) {
			$sql = "INSERT INTO user (firstName, lastName, email, password, countryId, cityId, roleId) VALUES(?,?,?,?,?,?,?)";

			$stmt = mysqli_stmt_init($conn);
			mysqli_stmt_prepare($stmt, $sql);
			mysqli_stmt_bind_param($stmt, "ssssiii", $fName, $lName, $email, $hashedPwd, $country, $city, $role);
			mysqli_stmt_execute($stmt);

			mysqli_stmt_close($stmt);

			header($path."successadd");
			exit();
		} else {
			header($path."error=emailalreadyexist");
			exit();
		}

	} // addUser

	function loginUser (String $email, String $password, mysqli $conn) {
		$sql = "SELECT * FROM user WHERE email=?;";
		$stmt = mysqli_stmt_init($conn);

		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../../index.php?error=sqlerrors");
			exit();
		}

		mysqli_stmt_bind_param($stmt, "s", $email);
		mysqli_stmt_execute($stmt);
		$resul = mysqli_stmt_get_result($stmt);

		if ($row = mysqli_fetch_assoc($resul)) {
			$pwdCheck = password_verify($password, $row['password']);

			if ($pwdCheck == false) {
				header("Location: ../../index.php?error=wrongpwd");
				exit();

			} else if ($pwdCheck == true) {
				// Add later other variables like user image
				session_start();
				$_SESSION['user'] = getUserById($row['userId'], $conn);

				header("Location: ../../index.php?login=success");
				exit();
			} 
			else {
				header("Location: ../../index.php?error=nousers");
				exit();
			}
		} else {
			header("Location: ../../index.php?error=nousers");
			exit();
		}

	} // loginUser

	function logoutUser () {
		session_start();
		session_unset();
		session_destroy();

		header("Location: ../../index.php");

	} // logoutUser


	function validateEmailUser (String $email, mysqli $conn) {
		$query = "SELECT COUNT(*) FROM user WHERE email=?";

		$stmt = $conn->prepare($query);
		$stmt->bind_param("s", $email);
		$stmt->execute();

		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		
		return $row['COUNT(*)'];

	} // validateSlugUser

	function getUserById($id, $conn) {
		$sql = "SELECT * FROM user WHERE userId=? LIMIT 1";

		$stmt = $conn->prepare($sql);
		$stmt->bind_param("i",$id);
		$stmt->execute();

		$result = $stmt->get_result();
		$user = $result->fetch_assoc();

		return $user; 

	} // getUserById

?>