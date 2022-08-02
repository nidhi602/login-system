<?php

	/*Please change the following parameters acc. to your system.*/
	
	$servername = "localhost";
	$dbUsername  = "root";
	$dbPassword = "admin";
	$dbName = "loginSystem";
	
	$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

	if(!$conn)
	{
		die("<br>Connection Failed: ".mysqli_connect_error());
	}
?>