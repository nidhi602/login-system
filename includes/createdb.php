<?php

	/*Please change the following parameters acc. to your system.*/

	$servername = "localhost";
	$dbUsername  = "root";
	$dbPassword = "admin";

	$conn = mysqli_connect($servername, $dbUsername, $dbPassword);

	if(!$conn)
	{
		die("Connection Failed: ".mysqli_connect_error());
	}
	//else
	//	echo "Database connection established!<br>";

	$sql = "CREATE DATABASE loginSystem";
	$result = mysqli_query($conn, $sql);
	
	//if(!$result)
	//	echo "Error creating database : ".$sql."<br>".mysqli_error($conn)."<br>";

	$sql = "USE loginSystem;";
	$result = mysqli_query($conn, $sql);

	//if(!$result)
	//	echo "Error in using database : ".$sql."<br>".mysqli_error($conn)."<br>";

	$sql = "CREATE TABLE users (id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL, firstname varchar(50) NOT NULL, lastname varchar(50) NOT NULL, email varchar(50) NOT NULL, phonenumber char(10) NOT NULL, address varchar(50) NOT NULL, username varchar(25) NOT NULL, password varchar(50) NOT NULL);";
	$result = mysqli_query($conn, $sql);

	//if(!$result)
	//	echo "Error creating table : ".$sql."<br>".mysqli_error($conn);

	mysqli_close($conn);
?>