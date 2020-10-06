<?php 
	//MYSQL database configuaration using credentials 
	define("HOST","localhost");
	define("DB_USER","root");
	define("DB_PASS","");
	define("DB_NAME","w3db");
	
	// create connection mysqli
	$conn = mysqli_connect(HOST,DB_USER,DB_PASS,DB_NAME);
	
	// corrupted connection
	// exeception handling
	if(!$conn)
	{
		die(mysqli_error());
	}
	// take the access token of the user when login
	
?>