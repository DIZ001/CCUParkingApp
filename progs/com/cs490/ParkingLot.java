/**
* CSCI 490 Parking App Project
* IngredientForRecipe.java
* Purpose: This program creates a ParkingLot object.
* 
* @author Jonathan Winters, Hailey Crouse, Frankie Murray, CJ Garling
* @date Created 7 November 2016
* @version 1.0, 7 November 2016
*/
package com.cs490;
public class ParkingLot {
	
	//declaring and initializing variables
	int lotId = 0;
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
	* @param aId 
	* 	unique ID for the parking lot
	* @param aName
	* 	name of the parking lotfgsd
	* @param aGenSpot
	* 	number of general spots in the parking lot
	* @param aFacStaffSpot
	* 	number of faculty/staff spots in the parking lot	
	* @param aHandiSpot
	* 	number of handicap spots in the parking lot
	* 
	**/
	public void ParkingLot(String aName, int aGenSpot, int aFacStaffSpot, int aHandiSpot) {
		//setId(000);
		setName(aName);
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
	**/
	public int getId() {
		return lotId;
	}
	
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
	public int getTotalVehicles() {
		int totalEnt = getTotalEnt();
		int totalExit = getTotalExit();
		if (totalEnt > totalExit) {
			int vehiclesInLot = totalEnt - totalExit;
			return vehiclesInLot;
		} else {
			System.out.println("Error: Negative total vehicles. Please try again.");
			return -1;
		}
	}
	
	
	
	
	// SETTERS //
	
	/**
	* Retrieves the parking lot's ID
	* 
	* @return returns the parking lot's ID
	* 
	**/
	private void setGenSpots(int aGenSpot) {
		genSpots = aGenSpot;
	}
	
	/**
	* Retrieves the parking lot's ID
	* 
	* @return returns the parking lot's ID
	* 
	**/
	private void setHandiSpots(int aHandiSpot) {
		handiSpots = aHandiSpot;
	}
	
	/**
	* Retrieves the parking lot's ID
	* 
	* @return returns the parking lot's ID
	* 
	**/
	private void setFacStaffSpots(int aFacStaffSpot) {
		facStaffSpots = aFacStaffSpot;
	}
	
	/**
	* Retrieves the parking lot's ID
	* 
	* @return returns the parking lot's ID
	* 
	**/
	private void setId(int aLotId) {
		lotId = aLotId;
	}
	
	/**
	* Retrieves the parking lot's ID
	* 
	* @return returns the parking lot's ID
	* 
	**/
	public void setName(String aName) {
		lotName = aName;
	}
	
}
