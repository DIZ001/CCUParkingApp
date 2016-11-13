<?php
/*
* parkingAppDB.php - creates a database for use by the parkingApp.
* @author Jonathan Winters
* @date 13 November 2016
* @version 1.0
*/
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
		// sql to create table
		
		$sql = "CREATE TABLE IF NOT EXISTS user (
		id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		name varchar(50) NOT NULL,
		email varchar(100) NOT NULL,
		status varchar(100) NOT NULL)";
		$conn->exec($sql);
		$sql = "ALTER TABLE user AUTO_INCREMENT = 00001";
		$conn->exec($sql);
		echo "Table user created successfully<br>";
		
		$sql = "CREATE TABLE IF NOT EXISTS parkingLot (
		id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		name varchar(50) NOT NULL,
		vehiclesEntered INT(0) UNSIGNED NOT NULL,
		vehiclesExited INT(0) UNSIGNED NOT NULL)";
		$conn->exec($sql);
		$sql = "ALTER TABLE parkingLot AUTO_INCREMENT = 90000";
		$conn->exec($sql);
		echo "Table parkingLot created successfully<br>";
	} catch (PDOEception $e) {
		echo $sql . "<br>" . $e->getMessage();
	}
	
	$conn = null;
	
?>