package com.cs490;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.*;


public class DatabaseDemo {

	public static void main(String[] args) throws SQLException, ClassNotFoundException {
		
		System.out.println("Testing database access...STARTING");
		
		/*The connection string describes how to access the database
		 * over a network. The pattern is 
		 * <protocol>://<domainName>:<portNumber>/<databaseName>
		 * Make sure these values match what you have set up on
		 * your system.
		 */
		String connectStr = "jdbc:mysql://localhost:3306/parkingAppDb";
		
		//Username for the database
		String username = "parkingApp";
		
		//Password for database
		String password = "ccupark1";
		
		/*The driver is the Java class used for accessing
		 * a particular database. You must download this 
		 * from the database vendor
		 */
		
		String driver = "com.mysql.jdbc.Driver";
		
		//Creates a connection object for your database.
		Connection con = DriverManager.getConnection(connectStr,username,password);
		
		populateDatabase();
		
		/*prepares a statement object to be executed on the 
		 * attached database.
		 */
		//Statement stmt = con.createStatement();
		PreparedStatement pStmt = con.prepareStatement("SELECT * FROM parkingLot");
		
		/*Execute a database query and returns the results
		 * as a ResultSet object.
		 */
		ResultSet rs = pStmt.executeQuery();
		// ResultSet rs = stmt.executeQuery("SELECT name, vehiclesEntered, vehiclesExited, numGenSpots, numFacStaffSpots, numHandiSpots FROM parkingLot");
		
		/*This snippet shows how to parse a ResultSet object.
		 * Basically, you loop through the object sort of like
		 * a linked list, and use the getX methods to get data 
		 * from the current row. Each time you call rs.next()
		 * it advances to the next row returned.
		 * This result variable is just used to compile all the
		 * data into one string.
		 */
		String result = "";
		while(rs.next()){
			//int theId = rs.getInt("id");
			String theName = rs.getString("name");
			int theVehEnt = rs.getInt("vehiclesEntered");
			int theVehExit = rs.getInt("vehiclesExited");
			int theGenSpots = rs.getInt("numGenSpots");
			int theFacStaffSpots = rs.getInt("numFacStaffSpots");
			int theHandiSpots = rs.getInt("numHandiSpots");
			result += "Name: "+theName+ ", Vehicles Entered: " +theVehEnt+ ", Vehicles Exited: " +theVehExit+ "; "+ theGenSpots+ "General Spots, " +theFacStaffSpots + " Fac/Staff Spots," +theHandiSpots+ " Handicap Spots" + "\n";
		}
		System.out.println("Results:\n\n"+result);
		
		System.out.println("Testing database access...FINISHED");
	}
	
	public static void populateDatabase() throws SQLException{
		
		System.out.println("Testing database access...STARTING");
		
		String connectStr = "jdbc:mysql://localhost:3306/parkingAppDb";
		
		String username = "parkingApp";
		
		String password = "ccupark1";
		
		String driver = "com.mysql.jdbc.Driver";
		
		Connection con = DriverManager.getConnection(connectStr,username,password);

    // set all the preparedstatement parameters
    PreparedStatement pStmt = con.prepareStatement("INSERT INTO ParkingLot(name, vehiclesEntered, vehiclesExited, numGenSpots, numFacStaffSpots, numHandiSpots) VALUES (?,?,?,?,?,?);");
    pStmt.setString(1, "lot_AA");
    pStmt.setInt(2, 30);
    pStmt.setInt(3, 12);
    pStmt.setInt(4, 50);
    pStmt.setInt(5, 50);
    pStmt.setInt(6, 6);
    // execute the preparedstatement insert
    pStmt.executeUpdate();
	
	pStmt.setString(1, "lot_GG");
    pStmt.setInt(2, 26);
    pStmt.setInt(3, 4);
    pStmt.setInt(4, 100);
    pStmt.setInt(5, 23);
    pStmt.setInt(6, 10);
    // execute the preparedstatement insert
    pStmt.executeUpdate();
	
	pStmt.setString(1, "lot_YY");
    pStmt.setInt(2, 12);
    pStmt.setInt(3, 0);
    pStmt.setInt(4, 25);
    pStmt.setInt(5, 25);
    pStmt.setInt(6, 5);
    // execute the preparedstatement insert
    pStmt.executeUpdate();
	
    pStmt.close();
		
	}

}
