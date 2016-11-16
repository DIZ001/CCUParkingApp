<?php
/**
* CCU_parkingLots.php - This program populates parkingAppDB with CCU's parking lots 
* with default entries for the number of vehicles that have entered and exited each parking lot. 
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
		// prepare sql and bind parameters
		$stmt = $conn->prepare("INSERT INTO parkingLot (name, vehiclesEntered, vehiclesExited, numGenSpots, numFacStaffSpots, numHandiSpots) 
		VALUES (:name, :vehiclesEntered, :vehiclesExited, :numGenSpots, :numFacStaffSpots, :numHandiSpots)");
		$stmt->bindParam(':name', $lot_name);
		$stmt->bindParam(':vehiclesEntered', $vehiclesEntered);
		$stmt->bindParam(':vehiclesExited', $vehiclesExited);
		$stmt->bindParam(':numGenSpots', $numGenSpots);
		$stmt->bindParam(':numFacStaffSpots', $numFacStaffSpots);
		$stmt->bindParam(':numHandiSpots', $numHandiSpots);
		
		// populates the parkingLot table with all of CCU's parking lots and default values for vehiclesEntered and vehiclesExited
		$lot_name = "Lot AA";
		$vehiclesEntered = 0;
		$vehiclesExited = 0;
		$numGenSpots = 50;
		$numFacStaffSpots = 50;
		$numHandiSpots = 5;
		$stmt->execute();
		
		$lot_name = "Lot BB";
		$vehiclesEntered = 0;
		$vehiclesExited = 0;
		$numGenSpots = 150;
		$numFacStaffSpots = 60;
		$numHandiSpots = 10;
		$stmt->execute();
		
		$lot_name = "Lot DD";
		$vehiclesEntered = 0;
		$vehiclesExited = 0;
		$numGenSpots = 40;
		$numFacStaffSpots = 30;
		$numHandiSpots = 5;
		$stmt->execute();
		
		$lot_name = "Lot DDD";
		$vehiclesEntered = 0;
		$vehiclesExited = 0;
		$numGenSpots = 0;
		$numFacStaffSpots = 50;
		$numHandiSpots = 5;
		$stmt->execute();
		
		$lot_name = "Lot EE";
		$vehiclesEntered = 0;
		$vehiclesExited = 0;
		$numGenSpots = 50;
		$numFacStaffSpots = 50;
		$numHandiSpots = 5;
		$stmt->execute();
		
		$lot_name = "Lot G";
		$vehiclesEntered = 0;
		$vehiclesExited = 0;
		$numGenSpots = 100;
		$numFacStaffSpots = 50;
		$numHandiSpots = 10;
		$stmt->execute();
		
		$lot_name = "Lot GG";
		$vehiclesEntered = 0;
		$vehiclesExited = 0;
		$numGenSpots = 1000;
		$numFacStaffSpots = 0;
		$numHandiSpots = 20;
		$stmt->execute();
		
		$lot_name = "Lot HH";
		$vehiclesEntered = 0;
		$vehiclesExited = 0;
		$numGenSpots = 0;
		$numFacStaffSpots = 20;
		$numHandiSpots = 5;
		$stmt->execute();
		
		$lot_name = "Lot KK";
		$vehiclesEntered = 0;
		$vehiclesExited = 0;
		$numGenSpots = 0;
		$numFacStaffSpots = 40;
		$numHandiSpots = 10;
		$stmt->execute();
		
		$lot_name = "Lot M";
		$vehiclesEntered = 0;
		$vehiclesExited = 0;
		$numGenSpots = 0;
		$numFacStaffSpots = 10;
		$numHandiSpots = 10;
		$stmt->execute();
		
		$lot_name = "Lot NN";
		$vehiclesEntered = 0;
		$vehiclesExited = 0;
		$numGenSpots = 100;
		$numFacStaffSpots = 5;
		$numHandiSpots = 5;
		$stmt->execute();
		
		$lot_name = "Lot QQ";
		$vehiclesEntered = 0;
		$vehiclesExited = 0;
		$numGenSpots = 200;
		$numFacStaffSpots = 50;
		$numHandiSpots = 10;
		$stmt->execute();
		
		$lot_name = "Lot YY";
		$vehiclesEntered = 0;
		$vehiclesExited = 0;
		$numGenSpots = 1000;
		$numFacStaffSpots = 0;
		$numHandiSpots = 10;
		$stmt->execute();
		
		echo "Parking lots created successfully";
	} catch (PDOException $e) {
		echo "ERROR: " . $e->getMessage();
	}
	// disconnects from the database
	$conn = null;
?>