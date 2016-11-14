<?php
/**
* parkingAppDB.php - Creates a database for use by the parkingApp that contains tables "user" and "parkingLot".
* @author Jonathan Winters
* @date 13 November 2016
* @version 1.0
**/

	$servername = "localhost";
	$username = "parkingApp";
	$password = "CCUpark1";
	$dbname = "parkingAppDB";

	try {
		$conn = new PDO("mysql:host=$servername", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//$sql = "CREATE DATABASE parkingAppDBPDO";
		$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
		// use exec() because no results are returned
		$conn->exec($sql);
		$sql = "USE $dbname";
		$conn->exec($sql);
		echo "Database created successfully<br>";
		
		/*
		* sql to create table user
		* id can be a width up to 7, unique, not null, and automatically increments
		* name can be a width up to 50 characters and can't be null
		* email and status can be a width up to 100 characters and can't be null
		*/
		$sql = "CREATE TABLE IF NOT EXISTS user (
		id INT(7) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		firstName varchar(20) NOT NULL,
		lastName varchar(20) NOT NULL,
		email varchar(100) NOT NULL,
		status varchar(100) NOT NULL)";
		$conn->exec($sql);
		// sql to automatically set what the first user ID will be (with a width of 7)
		$sql = "ALTER TABLE user AUTO_INCREMENT = 0000001";
		$conn->exec($sql);
		echo "Table user created successfully<br>";
		
		/*
		* sql to create table parkingLot
		* id can be a width up to 3, unique, not null, and automatically increments
		* name can be a width up to 50 characters and not null
		* vehiclesEntered and vehiclesExited can be a value up to 10^4, must be positive, and not null
		*/
		$sql = "CREATE TABLE IF NOT EXISTS parkingLot (
		id INT(3) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		name varchar(50) NOT NULL,
		vehiclesEntered INT(5) UNSIGNED NOT NULL,
		vehiclesExited INT(5) UNSIGNED NOT NULL)";
		$conn->exec($sql);
		// sql to automatically set what the first parking lot ID will be
		$sql = "ALTER TABLE parkingLot AUTO_INCREMENT = 100";
		$conn->exec($sql);
		echo "Table parkingLot created successfully<br>";
	} catch (PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}
	// ends the connection to the database
	$conn = null;
	
?>