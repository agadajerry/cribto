<?php


function connect2Db()
{

$host = 'localhost:3305';
$user = 'root';
$password ='';


	#----------------------Connection-------------------------------------

	$conn = mysqli_connect($host,$user,$password);

if (!$conn) {

	echo "Connection not  successful";

}

	$createDb = 'CREATE DATABASE IF NOT EXISTS tut_mysql_php_db';

	if(mysqli_query($conn, $createDb)){

	$conn = mysqli_connect($host,$user,$password,'tut_mysql_php_db');

	$tableCreation ="CREATE TABLE IF NOT EXISTS product_List (id int not null AUTO_INCREMENT PRIMARY KEY,
	 productName VARCHAR(45) NOT NULL, 
	  vendor VARCHAR(45) NOT NULL, 
	  itemlocation VARCHAR(45) NOT NULL, 
	 category VARCHAR(45) NOT NULL, 
	 saveDate datetime not null);";



if(mysqli_query($conn,$tableCreation))
{


return $conn;

}else{
	echo "Table is not created".mysqli_error($conn);
}

	}else{
		echo "Could not create database";
	} 
	

}


