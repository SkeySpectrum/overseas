<?php

	function addCountry (String $name, String $slug, int $continentId, mysqli $conn, String $path) {
		$val = validateSlugCountry($slug, $conn);

		if ($val == 0) {
			$sql = "INSERT INTO r_country (name, slug, continentId) VALUES(?, ?, ?)";

			$stmt = mysqli_stmt_init($conn);
			mysqli_stmt_prepare($stmt, $sql);
			mysqli_stmt_bind_param($stmt, "ssi", $name, $slug, $continentId);
			mysqli_stmt_execute($stmt);

			mysqli_stmt_close($stmt);

			header($path."error=successadd");
			exit();

		} else {
			header($path."error=countryalreadyexist");
			exit();
		}

	} // addCountry

	function updateCountry (int $id, String $name, String $slug, int $continent, mysqli $conn, String $path) {
		$val = validateSlugCity($slug, $conn);

		if ($val == 0) {
			$query = "UPDATE r_country SET name=?, slug=?, continentId=? WHERE countryId=?";
			$stmt = $conn->prepare($query);
			$stmt->bind_param("sssi", $name, $slug, $continent, $id);
			$stmt->execute();

			header($path."successadd");
			exit();
		} else {
			header($path."error=failed");
			exit();
		}

	} // updateCountry

	function deleteCountry (int $id, mysqli $conn, String $path) {
		$query = "DELETE FROM r_country WHERE countryId=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();

		header($path."removedsuccess");
		exit();

	} // deleteCountry


	function validateSlugCountry(String $slug, mysqli $conn) {
		$query = "SELECT COUNT(*) FROM r_country WHERE slug=?";

		$stmt = $conn->prepare($query);
		$stmt->bind_param("s", $slug);
		$stmt->execute();

		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		
		return $row['COUNT(*)'];

	} // validateSlugCountry

?>