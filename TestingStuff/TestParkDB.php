<?php
/**
* TestParkDB.php - This program populates the parkingLot table with multiple values to confirm that it works.
* @author Jonathan Winters
* @date 13 November 2016
* @version 1.0
**/
	require_once("Connect.php");
	/*$servername = "localhost";
	$username = "parkingApp";
	$password = "CCUpark1";
	$dbname = "parkingAppDB";*/

	try {
		/*$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		// use the database that the program is connected too
		$sql = "USE $dbname";
		$conn->exec($sql);
		echo "Connected to parkingAppDB successfully<br>";*/
		
		// testing updating the database with different values
		$sql = "UPDATE parkingLot SET vehiclesEntered=23 WHERE id=102";
		// Prepare statement
		$stmt = $conn->prepare($sql);
		// execute the query
		$stmt->execute();
		$sql = "UPDATE parkingLot SET vehiclesExited=12 WHERE id=102";
		// Prepare statement
		$stmt = $conn->prepare($sql);
		// execute the query
		$stmt->execute();
		
		// testing updating the database with different values
		$sql = "UPDATE parkingLot SET vehiclesEntered=47 WHERE id=104";
		// Prepare statement
		$stmt = $conn->prepare($sql);
		// execute the query
		$stmt->execute();
		$sql = "UPDATE parkingLot SET vehiclesExited=35 WHERE id=104";
		// Prepare statement
		$stmt = $conn->prepare($sql);
		// execute the query
		$stmt->execute();
		
		// testing updating the database with different values
		$sql = "UPDATE parkingLot SET vehiclesEntered=12 WHERE id=110";
		// Prepare statement
		$stmt = $conn->prepare($sql);
		// execute the query
		$stmt->execute();
		$sql = "UPDATE parkingLot SET vehiclesExited=6 WHERE id=110";
		// Prepare statement
		$stmt = $conn->prepare($sql);
		// execute the query
		$stmt->execute();

		// echo a message to say the UPDATE succeeded
		echo $stmt->rowCount() . " records UPDATED successfully";
		}
	catch(PDOException $e)
		{
		echo $sql . "<br>" . $e->getMessage();
		}
	// disconnects from the database
	$conn = null;
?>