<?php

	function addCity (String $name, String $slug, int $countryId, mysqli $conn, String $path) {
		$val = validateSlugCity ($slug, $conn);

		if ($val == 0) {
			$sql = "INSERT INTO r_city (name, slug, countryId) VALUES(?, ?, ?)";

			$stmt = mysqli_stmt_init($conn);
			mysqli_stmt_prepare($stmt, $sql);
			mysqli_stmt_bind_param($stmt, "ssi", $name, $slug, $countryId);
			mysqli_stmt_execute($stmt);

			mysqli_stmt_close($stmt);

			header($path."error=successadd");
			exit();

		} else {
			header($path."error=cityalreadyexist");
			exit();
		}

	} // addCity

	function updateCity (int $id, String $name, String $slug, int $country, mysqli $conn, String $path) {
		$val = validateSlugCity($slug, $conn);

		if ($val == 0) {
			$query = "UPDATE r_city SET name=?, slug=?, countryId=? WHERE cityId=?";
			$stmt = $conn->prepare($query);
			$stmt->bind_param("sssi", $name, $slug, $country, $id);
			$stmt->execute();

			header($path."successadd");
			exit();
		} else {
			header($path."error=failed");
			exit();
		}

	} // updateCity

	function deleteCity (int $id, mysqli $conn, String $path) {
		$query = "DELETE FROM r_city WHERE cityId=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();

		header($path."removedsuccess");
		exit();

	} // deleteCity


	function validateSlugCity(String $slug, mysqli $conn) {
		$query = "SELECT COUNT(*) FROM r_city WHERE slug=?";

		$stmt = $conn->prepare($query);
		$stmt->bind_param("s", $slug);
		$stmt->execute();

		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		
		return $row['COUNT(*)'];

	} // validateSlugCity

?>