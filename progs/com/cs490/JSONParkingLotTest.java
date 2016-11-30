package com.cs490;
import com.google.gson.Gson;

public class JSONParkingLotTest {

	public static void main(String[] args) {
	
		//Ingredient i = new Ingredient(12,"orange","fruit");
		ParkingLot aLot = new ParkingLot("Lot AA", 23, 12, 50, 50, 5);
		
		System.out.println("Java object: "+ aLot.toString());
		
		//Create the new Gson object to do the marshalling
		Gson theGsonObj = new Gson();
		
		//Use theGsonObj to create the JSON formatted String for the ParkingLot object
		String jsonParkingLot = theGsonObj.toJson(aLot);
		
		//Print the JSON formatted object
		System.out.println("JSON formatted: " + jsonParkingLot);
		
		//Convert the JSON string back into an ParkingLot object (unmarshalling)
		ParkingLot aLot2 = theGsonObj.fromJson(jsonParkingLot, ParkingLot.class);
		
		//Print the newly inflated Ingredient object
		System.out.println("Back to Java object: " + aLot2.toString());
	}
}