<?php

//==========================//==========================//

	require('../../system/dbConnection.php');

	require ('../../system/tables-scripts/table-city.php');

	require ('../../system/tables-scripts/table-country.php');

	require ('../../system/tables-scripts/table-continent.php');

	require ('../../system/tables-scripts/table-role.php');

//==========================//==========================//

	// path to the page
	$path = "Location: functionality-manager.php?";

//==========================//==========================//
//=====================    CITY    =====================//
//==========================//==========================//

	// city Variables
	$cityId = "";
	$cityName = "";
	$countryId = "";
	$city_update = false;

	if (isset($_POST['add-city'])) {

		$name = $_POST['name'];
		$countryId = $_POST['countryId'];

		if (empty($name) || empty($countryId)) {
			header($path."error=emptyfield");
			exit();
		}

		$slug = makeSlug ($name);

		addCity ($name, $slug, $countryId, $conn, $path);

	} // add-city

	if (isset($_GET['city-edit'])) {
		$id = $_GET['city-edit'];

		$query = "SELECT * FROM r_city WHERE cityId=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();

		$cityId = $row['cityId'];
		$cityName = $row['name'];
		$countryId = $row['countryId'];

		$city_update = true;

	} // city-edit

	if (isset($_POST['update-city'])) {

		$id = $_POST['id'];
		$name = $_POST['name'];
		$country = $_POST['countryId'];

		$slug = makeSlug($name);

		updateCity ($id, $name, $slug, $country, $conn, $path);
		
	} // update-city

	if (isset($_GET['city-delete'])) {
		$id = $_GET['city-delete'];
		$path = "Location: functionality-manager.php?";

		deleteCity($id, $conn, $path);

	} // city-delete

//==========================//==========================//
//===================    COUNTRY    ====================//
//==========================//==========================//

	// country Variables
	$countryId = "";
	$countryName = "";
	$continentId = "";
	$country_update = false;

	if (isset($_POST['add-country'])) {

		$name = $_POST['name'];
		$continentId = $_POST['continentId'];

		if (empty($name) || empty($continentId)) {
			header($path."error=emptyfield");
			exit();
		} 

		$slug = makeSlug ($name);

		addCountry ($name, $slug, $continentId, $conn, $path);

	} // add-country

	if (isset($_GET['country-edit'])) {
		$id = $_GET['country-edit'];

		$query = "SELECT * FROM r_country WHERE countryId=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();

		$countryId = $row['countryId'];
		$countryName = $row['name'];
		$continentId = $row['continentId'];

		$country_update = true;

	} // country-edit

	if (isset($_POST['update-country'])) {

		$id = $_POST['id'];
		$name = $_POST['name'];
		$continent = $_POST['continentId'];

		$slug = makeSlug($name);

		updateCountry ($id, $name, $slug, $continent, $conn, $path);
		
	} // update-country

	if (isset($_GET['country-delete'])) {
		$id = $_GET['country-delete'];

		deleteCountry($id, $conn, $path);

	} // country-delete

//==========================//==========================//
//==================    CONTINENT    ===================//
//==========================//==========================//

	// continent Variables
	$countryId = "";
	$continentName = "";
	$continentId = "";
	$continent_update = false;

	if (isset($_POST['add-continent'])) {

		$name = $_POST['name'];

		if (empty($name)) {
			header($path."error=emptyfield");
			exit();
		}

		$slug = makeSlug ($name);

		addContinent ($name, $slug, $conn, $path);

	} // add-continent

	if (isset($_GET['continent-edit'])) {
		$id = $_GET['continent-edit'];

		$query = "SELECT * FROM r_continent WHERE continentId=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();

		$continentId = $row['continentId'];
		$continentName = $row['name'];

		$continent_update = true;

	} // continent-edit

	if (isset($_POST['update-continent'])) {

		$id = $_POST['id'];
		$name = $_POST['name'];

		$slug = makeSlug($name);

		updateContinent ($id, $name, $slug, $conn, $path);
		
	} // update-country

	if (isset($_GET['continent-delete'])) {
		$id = $_GET['continent-delete'];

		deleteContinent($id, $conn, $path);

	} // city-delete

//==========================//==========================//
//=====================    ROLE    =====================//
//==========================//==========================//

	// role Variables
	$roleId = "";
	$roleName = "";
	$roleDesc = "";
	$role_update = false;

	if(isset($_POST['add-role'])) {
		$name = $_POST['name'];
		$description = $_POST['description'];

		if (empty($name) || empty($description)) {
			header($path."error=emptyfield");
			exit();
		}

		$slug = makeSlug ($name);

		addRole ($name, $slug, $description, $conn, $path);

	} // add-role

	if (isset($_GET['role-edit'])) {
		$id = $_GET['role-edit'];

		$query = "SELECT * FROM r_role WHERE roleId=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();

		$roleId = $row['roleId'];
		$roleName = $row['name'];
		$roleDesc = $row['description'];

		$role_update = true;

	} // role-edit

	if (isset($_POST['update-role'])) {

		$id = $_POST['id'];
		$name = $_POST['name'];
		$description = $_POST['description'];

		$slug = makeSlug($name);

		updateRole ($id, $name, $slug, $description, $conn, $path);
		
	} // update-role

	if (isset($_GET['role-delete'])) {
		$id = $_GET['role-delete'];

		deleteRole($id, $conn, $path);

	} // role-delete

//==========================//==========================//

	function makeSlug(String $string){
		$string = strtolower($string);
		$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
		return $slug;
	} // makeSlug

?>