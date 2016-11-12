#creates database for the parking App
create database parkingApp;
#using this database
use parkingApp;

#creating a table for user information
create table user (
id int not null auto_increment,
name varchar(50),
email varchar(100),
status varchar(100),

primary key(id)
);



create table parkingLot (
id int not null auto_increment, 
name varchar(70),
vehiclesEntered int not null,
vehiclesExited int not null,
primary key(id)
);






