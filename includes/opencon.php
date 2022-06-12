<?php
	//Database Constants
	$DB_SERVER="localhost";
	$DB_USER="root";
	$DB_PASSWORD="";
	$DB_NAME="fms";

	//Creating the Database Connection
	$conn=mysqli_connect ($DB_SERVER,$DB_USER,$DB_PASSWORD,$DB_NAME);
	if(!$conn){
		die("Database Connection Failed: ". mysqli_connect_error());
	}
	
?>