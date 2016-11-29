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
	
	public ParkingLot [] getLots() throws SQLException, ClassNotFoundException {
		//get the connection from the Data Access singleton object
		Connection con = dao.getConnection();
		
		//Execute the query
		Statement stmt = con.createStatement();
		String query = "SELECT * FROM " + lot;
		ResultSet rs = stmt.executeQuery(query);
		
		//Execute the query
		PreparedStatement stmt = con.prepareStatement("SELECT * FROM parkingLot");
		ResultSet rs = stmt.executeQuery();
		
		//Build the array list of ParkingLot objects
		ArrayList<ParkingLot> lotArray = new ArrayList<ParkingLot>();
		int count = 0;
		while(rs.next()) {
			//create Parking Lot objects and load them into the array list here//
			int theId = rs.getInt("id");
			String theName = rs.getString("name");
			int theVehEnt = rs.getInt("vehiclesEntered");
			int theVehExit = rs.getInt("vehiclesExited");
			int theGenSpots = rs.getInt("numGenSpots");
			int theFacStaffSpots = rs.getInt("numFacStaffSpots");
			int theHandiSpots = rs.getInt("numHandiSpots");
			
			Parkinglot lot = new ParkingLot(theId, theName, theVehEnt, theVehExit, theGenSpots, theFacStaffSpots, theHandiSpots);
			
			lotArray.add(lot);
			count++;
		}
		if(count > 0) {
			lotArray = lotArray.clone();
			return lotArray;
		}
		else{
			return null;
		}
	}

	public ParkingSpot [] getLotById(int lotId) throws SQLException, ClassNotFoundException {
		//get the connection from the Data Access singleton object
		Connection con = dao.getConnection();
		
		//Execute the query
		PreparedStatement stmt = con.prepareStatement("SELECT * FROM parkingLot WHERE id=" + lotId);
		ResultSet rs = stmt.executeQuery();
		
		while(rs.next()) {
			//create Parking spot objects and load them into the array here//
			int theId = rs.getInt("id");
			String theName = rs.getString("name");
			int theVehEnt = rs.getInt("vehiclesEntered");
			int theVehExit = rs.getInt("vehiclesExited");
			int theGenSpots = rs.getInt("numGenSpots");
			int theFacStaffSpots = rs.getInt("numFacStaffSpots");
			int theHandiSpots = rs.getInt("numHandiSpots");
			
			ParkingLot lot = new ParkingLot(theId, theName, theVehEnt, theVehExit, theGenSpots, theFacStaffSpots, theHandiSpots);
		}
		if(lotId == theId)) {			
			return lot;
		}
		else{
			return null;
		}
	}
}