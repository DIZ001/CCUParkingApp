package com.cs490;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.Produces;
import javax.ws.rs.PathParam;
import javax.ws.rs.QueryParam;
import javax.ws.rs.Consumes;
import javax.ws.rs.POST;
import javax.ws.rs.core.MultivaluedMap;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.core.Response;
import javax.ws.rs.core.Response.ResponseBuilder;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.sql.PreparedStatement;
import java.util.ArrayList;
import java.util.*;
import com.google.gson.Gson;
import javax.naming.*;
import java.*;
import javax.*;

/**
* 
* 
* 
* 
*/

@Path("ws2")
public class ParkingServices {
	
	/**
	* 
	* 
	*
	*/
	@Path("/parkingLots/")
	@GET
	@Produces("text/plain")
	public Response getLots() throws NamingException,SQLException,ClassNotFoundException {
		
		//Get a reference to the ParkingFacade singleton object
		ParkingFacade pFacade = ParkingFacade.getInstance();
		
		// Call the ParkingFacade method getLots to get the lots
		ArrayList<ParkingLot> resultArray = pFacade.getLots();
		System.out.println("Got this far.");
		//Create a Json string representation of the array of lots
		if(resultArray != null){
			Gson theGsonObj = new Gson();
			String result = theGsonObj.toJson(resultArray);
			
			//Add the JSON string to the response message body
			ResponseBuilder rb = Response.ok(result, MediaType.TEXT_PLAIN);
			//Setting the HTTP status code to 200
			rb.status(200);
			//Create and return the Response object
			System.out.println("ayeee");
			return rb.build();
		}//end if
		else {
			return Response.status(700).build();
		}
	}
	/**
	* The @QueryParam("id") looks for a section of the url after the 
	* ? that reads id=something. The int in the url that occupies
	* the 'something' spot will be passed through the theId parameter into 
	* the method
	*/
	@Path("/parkingLots/parkingLot")
	@GET
	@Produces("text/plain")
	public Response getLotByName(@QueryParam("name") String theName) throws NamingException,SQLException,ClassNotFoundException {
		
		//Get a reference to the ParkingFacade singleton object
		ParkingFacade pFacade = ParkingFacade.getInstance();
		
		//Call the ParkingFacade method getALot to get all the information pertaining to a specific lot
		ParkingLot resultLot = pFacade.getLotByName(theName);
		//Create a Json string representation of the array of spots
		if(resultLot != null){
			Gson theGsonObj = new Gson();
			String result = theGsonObj.toJson(resultLot);
			
			//Add the JSON string to the response message body
			ResponseBuilder rb = Response.ok(result, MediaType.TEXT_PLAIN);
			//Setting the HTTP status code to 200
			rb.status(200);
			//Create and return the Response object
			return rb.build();
		}//end if
		else {
			return Response.status(700).build();
		}
	}
	
}