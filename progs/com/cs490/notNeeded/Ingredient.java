package com.cs330;

public class Ingredient {

	private int id;

	private String name;

	private String category;

	public Ingredient() {
		id = 0;
		name = "no name yet";
		category = "no category yet";
	}

	public Ingredient(int aId, String aName, String aCategory) {
		id = aId;
		name = aName;
		category = aCategory;
	}
	
	public Ingredient(String aName, String aCategory) {
		id = 0;
		name = aName;
		category = aCategory;
	}

	public String toString() {
		String ret = id+": "+name+" ("+category+")";
		return ret;
	}
	
	public String getName(){
		return name;
	}
	
	public String getCategory(){
		return category;
	}
}
	