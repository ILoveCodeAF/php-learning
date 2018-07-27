<?php
$servername = "localhost";
$username = "overlord";
$password = "Overl0rd!";
$dbname = "my_bog";

//create connection
$conn = new mysqli( $servername, $username, $password, $dbname );
//
if( $conn->connect_error ){
	die( "failed to connect: ".$conn->connect_error );
}
echo "connected successfully" . "<br>";

$conn->close();
?>
