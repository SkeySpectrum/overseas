<?php
	
	function addContinent (String $name, String $slug, mysqli $conn, String $path) {
		$val = validateSlugContinent($slug, $conn);

		if ($val == 0) {
			$sql = "INSERT INTO r_continent (name, slug) VALUES(?, ?)";

			$stmt = mysqli_stmt_init($conn);
			mysqli_stmt_prepare($stmt, $sql);
			mysqli_stmt_bind_param($stmt, "ss", $name, $slug);
			mysqli_stmt_execute($stmt);

			mysqli_stmt_close($stmt);

			header($path."error=successadd");
			exit();

		} else {
			header($path."error=countryalreadyexist");
			exit();
		}

	} // addContinent

	function updateContinent (int $id, String $name, String $slug, mysqli $conn, String $path) {
		$val = validateSlugContinent($slug, $conn);

		if ($val == 0) {
			$query = "UPDATE r_continent SET name=?, slug=? WHERE continentId=?";
			$stmt = $conn->prepare($query);
			$stmt->bind_param("ssi", $name, $slug, $id);
			$stmt->execute();

			header($path."successadd");
			exit();
		} else {
			header($path."error=failed");
			exit();
		}

	} // updateContinent

	function deleteContinent (int $id, mysqli $conn, String $path) {
		$query = "DELETE FROM r_continent WHERE continentId=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();

		header($path."removedsuccess");
		exit();

	} // deleteContinent


	function validateSlugContinent(String $slug, mysqli $conn) {
		$query = "SELECT COUNT(*) FROM r_continent WHERE slug=?";

		$stmt = $conn->prepare($query);
		$stmt->bind_param("s", $slug);
		$stmt->execute();

		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		
		return $row['COUNT(*)'];

	} // validateSlugContinent

?>