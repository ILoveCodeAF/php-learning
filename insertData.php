<?php

$servername = "localhost";
$username = "overlord";
$password = "Overl0rd!";
$dbname = "my_blog";

//create connection
$conn = new mysqli( $servername, $username, $password, $dbname );
//check connection
if( $conn->connect_error ){
	die( "connection failed: " . $conn->connect_error );
}
echo "connection successfully" . "<br>";

$sql = "INSERT INTO MyGuests( firstname, lastname, email, favorites )
	VALUES( 'Shion1', 'Asada', 'AsadaSinon@example.com', 'gunShooter' )";
echo $sql."<br>";
if( $conn->query($sql) === TRUE ){
	echo "New record created successfully" . "<br>";
}
else{
	echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
