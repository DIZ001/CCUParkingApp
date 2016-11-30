
CREATE DATABASE IF NOT EXISTS parkingAppDb;

USE parkingAppDb;

CREATE TABLE IF NOT EXISTS user (
		id INT(7) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		name varchar(40) NOT NULL,
		email varchar(100) NOT NULL,
		pwd varchar(30) NOT NULL,
		status varchar(100) NOT NULL);
		
ALTER TABLE user AUTO_INCREMENT = 0000001;


CREATE TABLE IF NOT EXISTS parkingLot (
		name varchar(50) NOT NULL PRIMARY KEY,
		vehiclesEntered INT(5) UNSIGNED NOT NULL,
		vehiclesExited INT(5) UNSIGNED NOT NULL,
		numGenSpots INT UNSIGNED NOT NULL,
		numFacStaffSpots INT UNSIGNED NOT NULL,
		numHandiSpots INT UNSIGNED NOT NULL);
