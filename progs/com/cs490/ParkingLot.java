package com.cs490;
import java.sql.*;
/**
* CSCI 490 Parking App Project
* Purpose: This program creates a ParkingLot object.
* 
* @author Jonathan Winters, Hailey Crouse, Frankie Murray, CJ Garling
* @date Created 7 November 2016
* @version 1.0, 7 November 2016
*/
public class ParkingLot {
	
	//private ParkingDataAccess dao;
	
	//declaring and initializing variables
	//int lotId = 0;
	String lotName = "no name yet";
	int genSpots = 0;
	int handiSpots = 0;
	int facStaffSpots = 0;
	int totalExited = 0;
	int totalEntered = 0;
	int vehiclesInLot = 0;
	
	/**
	* Constructs a Parking Lot object that has a name, 
	* an ID that uniquely identifies it, and sets the amount of 
	* general spots, handicap spots, and faculty/staff spots available
	* in the lot.
	* @param aName
	* 	name of the parking lot
	* @param aGenSpot
	* 	number of general spots in the parking lot
	* @param aFacStaffSpot
	* 	number of faculty/staff spots in the parking lot	
	* @param aHandiSpot
	* 	number of handicap spots in the parking lot
	* 
	**/
	public ParkingLot(String aName, int aVehEnt, int aVehExit, int aGenSpot, int aFacStaffSpot, int aHandiSpot) {
		setName(aName);
		getTotalVehicles(aVehEnt, aVehExit);
		setVehiclesEntered(aVehEnt);
		setVehiclesExited(aVehExit);
		setGenSpots(aGenSpot);
		setFacStaffSpots(aFacStaffSpot);
		setHandiSpots(aHandiSpot);
	}
	
	// GETTERS //
	
	/**
	* Retrieves the parking lot's ID
	* 
	* @return returns the parking lot's ID
	* 
	*
	public int getId(String lotName) throws SQLException {
		Connection con = dao.getConnection();
		PreparedStatement pStmt = con.prepareStatement("SELECT id FROM parkingLot WHERE name LIKE '" + lotName + "'");
		ResultSet rs = pStmt.executeQuery();
		int lotId = rs.getInt("id");
		return lotId;
	}
	*/
	
	/**
	* Retrieves the parking lot's name
	* 
	* @return returns the parking lot's name
	* 
	**/
	public String getName() {
		return lotName;
	}
	
	/**
	* Retrieves the number of general spots in the parking lot
	* 
	* @return returns the number of general spots in the parking lot
	* 
	**/
	public int getGenSpots() {
		return genSpots;
	}
	
	/**
	* Retrieves the number of handicap spots in the parking lot
	* 
	* @return returns the number of handicap spots in the parking lot
	* 
	**/
	public int getHandiSpots() {
		return handiSpots;
	}
	
	/**
	* Retrieves the number of faculty/staff spots in the parking lot
	* 
	* @return returns the number of faculty/staff spots in the parking lot
	* 
	**/
	public int getFacStaffSpots() {
		return facStaffSpots;
	}
	
	/**
	* Retrieves the number of vehicles that have entered the parking lot
	* 
	* @return returns the number of vehicles that have entered 
	* the parking lot
	* 
	**/
	public int getTotalEnt() {
		return totalEntered;
	}
	
	/**
	* Retrieves the number of vehicles that have exited the parking lot
	* 
	* @return returns the number of vehicles that have exited the
	* parking lot
	* 
	**/
	public int getTotalExit() {
		return totalExited;
	}
	
	/**
	* 
	* 
	* @return returns the number of general spots in the parking lot
	* 
	**/
	public int getTotalVehicles(aTotalEnt, aTotalExit) {
		int totalEnt = aTotalEnt;
		int totalExit = aTotalExit;
		if (totalEnt > totalExit) {
			int vehiclesInLot = totalEnt - totalExit;
			return vehiclesInLot;
		} else {
			System.out.println("Error: Negative total vehicles. Please try again.");
			return -1;
		}
	}
	
	
	// SETTERS //
	
	private void setGenSpots(int aGenSpot) {
		genSpots = aGenSpot;
	}
	
	private void setHandiSpots(int aHandiSpot) {
		handiSpots = aHandiSpot;
	}
	
	private void setFacStaffSpots(int aFacStaffSpot) {
		facStaffSpots = aFacStaffSpot;
	}
	
	/*
	private void setId(int aLotId) {
		lotId = aLotId;
	}*/
	
	public void setName(String aName) {
		lotName = aName;
	}

	private void setVehiclesExited(int aVehExit) {
		totalExited = aVehExit;
	}
	
	private void setVehiclesEntered(int aVehEnt) {
		totalEntered = aVehEnt;
	}
	
}
