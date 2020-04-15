<?php
session_start();
class Database {

	// Function to the database and tables and fill them with the default data
	function database_create($data)
	{
		// Connect to the database
		$mysqli = new mysqli($data['hostname'],$data['username'],$data['password'],'');

		// Check for errors
		if(mysqli_connect_errno())
			return false;

		// Create the prepared statement
		$mysqli->query("CREATE DATABASE IF NOT EXISTS ".$data['database']);

		// Close the connection
		$mysqli->close();

		return true;
	}

	// Function to create the tables and fill them with the default data
	function tables_create($data)
	{
		// Connect to the database
		$mysqli = new mysqli($data['hostname'],$data['username'],$data['password'],$data['database']);

		// Check for errors
		if(mysqli_connect_errno())
			return false;

		// Open the default SQL file
		$query = file_get_contents('database/install.sql');

		// Execute a multi query
		$mysqli->multi_query($query);

		// Close the connection
		$mysqli->close();

		// store database config data into session
		
		$_SESSION["hostname"] = $data['hostname'];
		$_SESSION["username"] = $data['username'];
		$_SESSION["password"] = $data['password'];
		$_SESSION["database"] = $data['database'];

		return true;
	}
	// Test user input
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	// Insert Login information
	function insert_login_data($email, $password)
	{
		require_once('logintable.php');
		$Logintable = new Logintable();
		$data = $Logintable->get_login_table_info();



		// Mysql connection
		$mysqli = new mysqli($_SESSION['hostname'],$_SESSION['username'],$_SESSION['password'],$_SESSION['database']);

		// Check for errors
		if(mysqli_connect_errno())
			return false;



		// Password md5
		$password = md5($password);

		// print_r($password);die();

		// Mysql query
		$query = "INSERT INTO `$data->table` ($data->email_field, $data->password_field) VALUES ('".$email."', '".$password."')";

		$result = $mysqli->query($query);

		return $result;

	}

}