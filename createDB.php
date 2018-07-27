<?php
$servername = "localhost";
$username = "overlord";
$password = "Overl0rd!";
//$dbname = "my_blog";

//create connection
$conn = new mysqli( $servername, $username, $password );

//check connection
if( $conn->connect_error ){
	dir( "connection failed: " . $conn->connect_error );
}
echo "connected successfully"."<br>";

//create database
$sql = "CREATE DATABASE mydb";
if( $conn->query($sql) === TRUE ){
	echo "Database mydb created successfully";
}
else{
	echo "failed to create database: " . $conn->error;
}
$conn->close();
?>
