<?php

	function getAllIndex (String $table) {
		require('dbConnection.php');

		$query = "SELECT * FROM ".$table;
		$stmt = $conn->prepare($query);
	    $stmt->execute();
		return $stmt->get_result();

	} // getAllIndex

	function getIndexById (String $table, String $column, int $id) {
		require('dbConnection.php');

		$query = "SELECT * FROM ".$table." WHERE ".$column."=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i", $id);
		$stmt->execute();
		return $stmt->get_result();

	} // getIndexById

?>