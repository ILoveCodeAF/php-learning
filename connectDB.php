<?php
$servername = "localhost";
$username = "overlord";
$password = "Overl0rd!";
$dbname = "my_blog";

//create connection
$conn = new mysqli( $servername, $username, $password );

//check connection
if( $conn->connect_error ){
	die( "connection failed :" . $conn->connect_error );
}
echo "connected successfully";
$conn->close();
?>
