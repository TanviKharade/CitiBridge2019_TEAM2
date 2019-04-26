<?php 

	// Variable
	$server_name = "localhost";
	$username = "root";
	$password = "";
	$database_name = "feedgenerate";

	$conn = mysqli_connect($server_name, $username, $password, $database_name);
	if ($conn) 
	{
		//echo "Connected Established";
	}
	else
	{
		echo "Failed to connect to MySQL";
	}

?>