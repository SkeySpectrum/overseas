<?php
	
	function addRole (String $name, String $slug, String $description, mysqli $conn, String $path) {
		$val = validateSlugRole($slug, $conn);

		if ($val == 0) {
			$sql = "INSERT INTO r_role (name, slug, description) VALUES(?, ?, ?)";

			$stmt = mysqli_stmt_init($conn);
			mysqli_stmt_prepare($stmt, $sql);
			mysqli_stmt_bind_param($stmt, "sss", $name, $slug, $description);
			mysqli_stmt_execute($stmt);

			mysqli_stmt_close($stmt);

			header($path."successadd");
			exit();
		} else {
			header($path."error=rolealreadyexist");
			exit();
		}

	} // addRole

	function updateRole (int $id, String $name, String $slug, String $description, mysqli $conn, String $path) {
		$val = validateSlugRole($slug, $conn);

		if ($val == 0) {
			$query = "UPDATE r_role SET name=?, slug=?, description=? WHERE roleId=?";
			$stmt = $conn->prepare($query);
			$stmt->bind_param("sssi", $name, $slug, $description, $id);
			$stmt->execute();

			header($path."successadd");
			exit();
		} else {
			header($path."error=failed");
			exit();
		}

	} // updateRole

	function deleteRole (int $id, mysqli $conn, String $path) {
		$query = "DELETE FROM r_role WHERE roleId=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();

		header($path."removedsuccess");
		exit();

	} // deleteRole


	function validateSlugRole(String $slug, mysqli $conn) {
		$query = "SELECT COUNT(*) FROM r_role WHERE slug=?";

		$stmt = $conn->prepare($query);
		$stmt->bind_param("s", $slug);
		$stmt->execute();

		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		
		return $row['COUNT(*)'];

	} // validateSlugRole

?>