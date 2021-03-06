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

@Path("ws2")
public class IngredientServices {
 
 @Path("/ingredients")
 @POST
 @Produces("text/plain")
 @Consumes("application/x-www-form-urlencoded")
 public Response createIngredient(MultivaluedMap<String,String> formFields) throws NamingException,SQLException,ClassNotFoundException{
 	
	//Get a reference to the IngredientFacade singleton objects
	IngredientFacade iFacade = IngredientFacade.getInstance();
	
	//Call the IngredientFacade method createIngredient to create the ingredient(s)
	//that are to be added. To do this we first get the parameters from formfields
	//then we create a temp ingredient to add it to database
	String newName = formFields.getFirst("name");

	String newCategory = formFields.getFirst("category");
	
	Ingredient temp = new Ingredient(newName,newCategory);
	
	Ingredient[] resultArray = iFacade.createIngredient(temp);
	
	if(resultArray != null){
		Gson theGsonObj = new Gson();
		String result = theGsonObj.toJson(resultArray);
		System.out.println("the json: \n"+result);
		//return result;
		ResponseBuilder rb = Response.ok(result,MediaType.TEXT_PLAIN);
		rb.status(201);
		return rb.build();
	}
	else {
		Gson theGsonObj = new Gson();
		Ingredient[] blankIngArray = new Ingredient[1];
		blankIngArray[0] = new Ingredient(0,"none","none");
		String blankResult = theGsonObj.toJson(blankIngArray);
		return Response.status(700).build();
	}
 }

 @Path("/ingredients")
 @GET
 @Produces("text/plain")
 public Response getIngredients() throws NamingException,SQLException,ClassNotFoundException{
	
	//Get a reference to the IngredientFacade singleton objects
	IngredientFacade iFacade = IngredientFacade.getInstance();
   
	//Call the IngredientFacade method getIngredientById to get the ingredient(s)
    //with the matching id
    Ingredient[] resultArray = iFacade.getIngredients();
	
   //Create a Json string representation of the array of ingredients
	if(resultArray != null) {
		Gson theGsonObj = new Gson();
		String result = theGsonObj.toJson(resultArray);
		
		//Add the JSON string to the response message body
		ResponseBuilder rb = Response.ok(result, MediaType.TEXT_PLAIN);
		//Setting the HTTP status code to 200
		rb.status(200);
		//Create and return the Response object
		return rb.build();	
	}//end if
	else {
		return Response.status(700).build();
	}//end else
  }
  
  
  
  //The optional id indicates a path parameter ( a parameter
  // passed directly in the URL path
  // @PathParam("id") means that the value in the url that
  // occupies the spot where /{id} is, will be passed
  // through theId parameter to the method
 @Path("/ingredients/{id}")
 @GET
 @Produces("text/plain")
 public Response getIngredientById(@PathParam("id") String theId) throws NamingException,SQLException,ClassNotFoundException{
   //Get a reference to the IngredientFacade singleton objects
   IngredientFacade iFacade = IngredientFacade.getInstance();
   
   //Convert the path parameter id to an int
   int intId = 0;
    //Since url parameters are always strings, convert to int
   try {
    intId = Integer.parseInt(theId);
   } catch (NumberFormatException ne) {
    intId = 1;
   }
   
   //Call the IngredientFacade method getIngredientById to get the ingredient(s)
   //with the matching id
   Ingredient[] resultArray = iFacade.getIngredientById(intId);
   
   //Create a Json string representation of the array of ingredients
	if(resultArray != null) {
		Gson theGsonObj = new Gson();
		String result = theGsonObj.toJson(resultArray);
		
		//Add the JSON string to the response message body
		ResponseBuilder rb = Response.ok(result, MediaType.TEXT_PLAIN);
		//Setting the HTTP status code to 200
		rb.status(200);
		//Create and return the Response object
		return rb.build();	
	}//end if
	else {
		return Response.status(700).build();
	}//end else
  }
  
  
  
  //The @QueryParam("name") looks for a section of the url
  // after the ? that reads name=something. The string
  // in the url that occupies the 'something' spot will be
  // passed through the theName parameter into the method
 @Path("/ingredients/ingredient")
 @GET
 @Produces("text/plain")
 public Response getIngredientByName(@QueryParam("name") String theName) throws NamingException,SQLException,ClassNotFoundException{
    //Get a reference to the IngredientFacade singleton objects
   IngredientFacade iFacade = IngredientFacade.getInstance();
   
   //Call the IngredientFacade method getIngredientById to get the ingredient(s)
   //with the matching id
   Ingredient[] resultArray = iFacade.getIngredientByName(theName);
   
   //Create a Json string representation of the array of ingredients
	if(resultArray != null) {
		Gson theGsonObj = new Gson();
		String result = theGsonObj.toJson(resultArray);
		
		//Add the JSON string to the response message body
		ResponseBuilder rb = Response.ok(result, MediaType.TEXT_PLAIN);
		//Setting the HTTP status code to 200
		rb.status(200);
		//Create and return the Response object
		return rb.build();	
	}//end if
	else {
		return Response.status(700).build();
	}//end else
 }
}



package com.cs330;
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

@Path("ws2")
public class ParkingServices {

	@Path("/parkingSpots/")
	@GET
	@Produces("text/plain")
	public Response getLots() throws NamingException,SQLException,ClassNotFoundException 	{
		
		//Get a reference to the ParkingFacade singleton object
		ParkingFacade pFacade = ParkingFacade.getInstance();
		
		// Call the ParkingFacade method getLots to get the spots in the lot
		ParkingLot[] resultArray = pFacade.getLots();
		
		//Create a Json string representation of the array of spots
		if(resultArray != null){
			Gson theGsonObj = new Gson();
			String result = theGsonObj.toJson(resultArray);
			
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
	
	@Path("/openSpots/{lotId}")
	@GET
	@Produces("text/plain")
	public Response getOpenSpots(@PathParam("lotId") String theId) throws NamingException,SQLException,ClassNotFoundException 
	{
		
		//Get a reference to the ParkingFacade singleton object
		ParkingFacade pFacade = ParkingFacade.getInstance();
		
		//Call the ParkingFacade method getSpotsKimbel to get the spots in the lot
		ParkingSpot[] resultArray = pFacade.getOpenSpots(theId);
		
		//Create a Json string representation of the array of spots
		if(resultArray != null){
			Gson theGsonObj = new Gson();
			String result = theGsonObj.toJson(resultArray);
			
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