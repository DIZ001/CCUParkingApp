package com.cs490;
import java.sql.*;
import javax.naming.*;
import java.util.*;
import java.*;
import javax.*;

public class IngredientFacade {
	private static IngredientFacade singleton;
	
	private IngredientDataAccess dao;
	
	private IngredientFacade () throws NamingException, SQLException {
		this.dao = IngredientDataAccess.getInstance();
	}
	
	public static IngredientFacade getInstance() throws NamingException, SQLException {
	
		if(singleton == null)
		{
			singleton = new IngredientFacade();
		}
		return singleton;
	}
	
	public Ingredient[] getIngredients() throws SQLException, ClassNotFoundException{
		//get the connection from the IngredientDataAccess singleton object
		Connection con = dao.getConnection();
		
		//Execute the query
		PreparedStatement stmt = con.prepareStatement("SELECT id,name,category FROM ingredient");
		ResultSet rs = stmt.executeQuery();
		
		//Build the array of Ingredient objects
		Ingredient[] ingArray = new Ingredient[100];
		int count = 0;
		while (rs.next()) {
			int theId = rs.getInt("id");
			String theName = rs.getString("name");
			String theCategory = rs.getString("category");
			Ingredient ing = new Ingredient(theId, theName, theCategory);
			ingArray[count] = ing;
			count++;
		}
		if(count > 0) {
			ingArray = Arrays.copyOf(ingArray, count);
			return ingArray;
		}
		else {
			return null;
		}
	}
	
	public Ingredient[] getIngredientByName( String theName) throws SQLException, ClassNotFoundException {
		//get the connection from the IngredientDataAccess singleton object
		Connection con = dao.getConnection();
		
		//Execute the query
		PreparedStatement stmt = con.prepareStatement("SELECT id,name,category FROM ingredient WHERE name= ?");
		stmt.setString(1, theName);
		ResultSet rs = stmt.executeQuery();
		
		//Build the array of Ingredient objects
		Ingredient[] ingArray = new Ingredient[100];
		int count = 0;
		while (rs.next()) {
			int theId = rs.getInt("id");
			String theName2 = rs.getString("name");
			String theCategory = rs.getString("category");
			Ingredient ing = new Ingredient(theId, theName2, theCategory);
			ingArray[count] = ing;
			count++;
		}
		if(count > 0) {
			ingArray = Arrays.copyOf(ingArray, count);
			return ingArray;
		}
		else {
			return null;
		}
	}
	
	public Ingredient[] getIngredientById( int theId) throws SQLException, ClassNotFoundException {
		//get the connection from the IngredientDataAccess singleton object
		Connection con = dao.getConnection();
		
		//Execute the query
		PreparedStatement stmt = con.prepareStatement("SELECT id,name,category FROM ingredient WHERE id = ?");
		stmt.setInt(1,theId);
		ResultSet rs = stmt.executeQuery();
		
		//Build the array of Ingredient objects
		Ingredient[] ingArray = new Ingredient[100];
		int count = 0;
		while (rs.next()) {
			int theId2 = rs.getInt("id");
			String theName = rs.getString("name");
			String theCategory = rs.getString("category");
			Ingredient ing = new Ingredient(theId2, theName, theCategory);
			ingArray[count] = ing;
			count++;
		}
		if(count > 0) {
			ingArray = Arrays.copyOf(ingArray, count);
			return ingArray;
		}
		else {
			return null;
		}
	}
	
	public Ingredient[] createIngredient(Ingredient theIngredientToAdd) throws SQLException, ClassNotFoundException {
		//get the connection from the IngredientDataAccess singleton object
		Connection con = dao.getConnection();
		
		//get the name and category from the input parameter.
		String newName = theIngredientToAdd.getName();
		
		String newCategory = theIngredientToAdd.getCategory();
		
		//Execute the query
		PreparedStatement createStmt = con.prepareStatement("INSERT INTO ingredient (name,category) VALUES (?,?)");
		createStmt.setString(1,newName);
		createStmt.setString(2,newCategory);
		
		int res = createStmt.executeUpdate();
		
		if(res == 1) {
			PreparedStatement retrieveStmt = con.prepareStatement("SELECT * FROM ingredient WHERE name=? AND category=?");
			retrieveStmt.setString(1, newName);
			retrieveStmt.setString(2, newCategory);
			ResultSet rs = retrieveStmt.executeQuery();
			
			String result = "";
			int count = 0;
			int MAX = 100;
			Ingredient[] ingArray = new Ingredient[MAX];
			
			while(rs.next()){
				int theId = rs.getInt("id");
				String theName = rs.getString("name");
				String theCategory = rs.getString("category");
				Ingredient ing = new Ingredient(theId, theName, theCategory);
				System.out.println(ing);
				ingArray[count] = ing;
				count++;
			}
			
			ingArray = Arrays.copyOf(ingArray,count);
			
			return ingArray;
		}
		else {
			return null;
		}
	}
}



package com.cs490;
import java.sql.*;
import javax.naming.*;
import java.util.*;
import java.*;
import javax.*;

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
	
	//Lot Reference Method Used to Determine Which Lot We Are Talking About//
	public static String determineLot(String lotId){
		String temp = "No lot";
		if(lotId.equalsIgnoreCase("kimbel") || lotId.equalsIgnoreCase("kimbellot")){
			temp = "kimbellot";
			return temp;
		}
		else if(lotId.equalsIgnoreCase("extended") || lotId.equalsIgnoreCase("extendedlot"))
		{
			temp = "extendedlot";
			return temp;
		}
		else if(lotId.equalsIgnoreCase("science") || lotId.equalsIgnoreCase("sciencelot")){
			temp = "sciencelot";
			return temp;
		}
		else
		{
			temp = "nulllot";
			return temp;
		}
	}
	
	//PARKING FACADE METHODS ARE BELOW:  IF YOU ARE GOING TO ALTER ANYTHING THEY ARE DOWN THERE//
	
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

	public ParkingSpot [] getOpenSpots(String lotId) throws SQLException, ClassNotFoundException {
		//get the connection from the Data Access singleton object
		Connection con = dao.getConnection();
		
		//finding out which lot is being referred to//
		String lot = determineLot(lotId);
		
		//Execute the query
		Statement stmt = con.createStatement();
		String query = "SELECT * FROM " + lot + " WHERE occupied IS NULL";
		ResultSet rs = stmt.executeQuery(query);
		
		//Build the array of ParkingSpot objects
		ParkingSpot[] spotArray = new ParkingSpot[1000];
		int count = 0;
		while(rs.next()) {
			//create Parking spot objects and load them into the array here//
			String parkingLotId = rs.getString("parkingLotId");
			String parkingSpotId = rs.getString("parkingSpotId");
			int bool = rs.getInt("occupied");
			boolean occupied;
			if(bool == 0){
				occupied = false;
			}
			else{
				occupied = true;
			}
			int occupiedBy = rs.getInt("occupiedBy");
			String spaceType = rs.getString("spaceType");
			//put timer collector here//
			int spotTimeLimit = rs.getInt("spotTimeLimit");
			int boolTime= rs.getInt("overTime");
			boolean overTime;
			if(boolTime == 0){
				overTime = true;
			}
			else {
				overTime = false;
			}
			
			ParkingSpot spot = new ParkingSpot(parkingLotId,parkingSpotId,spaceType,spotTimeLimit);

			if(occupied == true){
				spot.setOccupied(true);
				spot.setOccupiedBy(occupiedBy);
			}
			if(occupied == false){
				spot.setOccupied(false);
				spot.setOccupiedBy(0);
			}
			if(overTime = true){
				spot.setOverTime(true);
			}
			if(overTime = false){
				spot.setOverTime(false);
			}
			
			spotArray[count] = spot;
			count++;
		}
		if(count > 0) {
			spotArray = Arrays.copyOf(spotArray, count);
			return spotArray;
		}
		else{
			return null;
		}
	}
}