package com.cs490;
import java.sql.*;
import javax.naming.*;
import java.util.*;
import java.*;
import javax.*;

/**
* 
* 
* 
* 
*
**/

public class ParkingFacade {
	
	private static ParkingFacade singleton;
	
	private ParkingDataAccess dao;
	
	private ParkingFacade () throws NamingException, SQLException {
		this.dao = ParkingDataAccess.getInstance();
	}
	
	public static ParkingFacade getInstance() throws NamingException, SQLException {
		
		if(singleton == null)
		{
			singleton = new ParkingFacade();
		}
		return singleton;
	}
	
	public ArrayList<ParkingLot> getLots() throws SQLException, ClassNotFoundException {
		//get the connection from the Data Access singleton object
		Connection con = dao.getConnection();
		
		//Execute the query
		PreparedStatement pStmt = con.prepareStatement("SELECT name, vehiclesEntered, vehiclesExited, numGenSpots, numFacStaffSpots, numHandiSpots FROM parkingLot");
		ResultSet rs = pStmt.executeQuery();
		
		//Build the array list of ParkingLot objects
		ArrayList<ParkingLot> lotArray = new ArrayList<ParkingLot>();
		int count = 0;
		while(rs.next()) {
			//create Parking Lot objects and load them into the array list here//
			//int lotId = rs.getInt("id");
			String lotName = rs.getString("name");
			int vehEntLot = rs.getInt("vehiclesEntered");
			int vehExitLot = rs.getInt("vehiclesExited");
			int lotGenSpots = rs.getInt("numGenSpots");
			int lotFacStaffSpots = rs.getInt("numFacStaffSpots");
			int lotHandiSpots = rs.getInt("numHandiSpots");
			
			ParkingLot lot = new ParkingLot(lotName, vehEntLot, vehExitLot, lotGenSpots, lotFacStaffSpots, lotHandiSpots);
			//lot.getId();
			
			lotArray.add(lot);
			count++;
		}
		if(count > 0) {
			return lotArray;
		}
		else{
			return null;
		}
	}
	
	/**
	* 
	* 
	*
	**/
	public ParkingLot getLotByName(String lotName) throws SQLException, ClassNotFoundException {
		//get the connection from the Data Access singleton object
		Connection con = dao.getConnection();
		
		//Execute the query
		PreparedStatement stmt = con.prepareStatement("SELECT name, vehiclesEntered, vehiclesExited, numGenSpots, numFacStaffSpots, numHandiSpots  FROM parkingLot WHERE name=" + lotName);
		ResultSet rs = stmt.executeQuery();
		
		while(rs.next()) {
			//create Parking lot objects and load them into the array here//
			//int theId = rs.getInt("id");
			String theName = rs.getString("name");
			int theVehEnt = rs.getInt("vehiclesEntered");
			int theVehExit = rs.getInt("vehiclesExited");
			int theGenSpots = rs.getInt("numGenSpots");
			int theFacStaffSpots = rs.getInt("numFacStaffSpots");
			int theHandiSpots = rs.getInt("numHandiSpots");
			
			ParkingLot lot = new ParkingLot(theName, theVehEnt, theVehExit, theGenSpots, theFacStaffSpots, theHandiSpots);
			return lot;
		}
		return null;
		
	}
}