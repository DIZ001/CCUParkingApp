package com.cs330;
import com.google.gson.Gson;

public class JSONIngredientTest {

	public static void main(String[] args) {
	
		Ingredient i = new Ingredient(12,"orange","fruit");
		
		System.out.println("Java object: "+i.toString());
		
		//Create the new Gson object to do the marshalling
		Gson theGsonObj = new Gson();
		
		//Use theGsonObj to create the JSON formatted String for the Ingredient object
		String jsonIngredient = theGsonObj.toJson(i);
		
		//Print the JSON formatted object
		System.out.println("JSON formatted: " + jsonIngredient);
		
		//Convert the JSON string back into an Ingredient object (unmarshalling)
		Ingredient i2 = theGsonObj.fromJson(jsonIngredient, Ingredient.class);
		
		//Print the newly inflated Ingredient object
		System.out.println("Back to Java object: " + i2.toString());
	}
}