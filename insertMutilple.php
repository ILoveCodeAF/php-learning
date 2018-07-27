<?php
$servername = "localhost";
$username = "overlord";
$password = "Overl0rd!";
$dbname = "my_blog";

//create connection
$conn = new mysqli( $servername, $username, $password, $dbname );
//check connection
if( $conn->connect_error ){
	die( "failed to connect: ".$conn->connect_error );
}
echo "connected successfully" . "<br>";

$sql = "INSERT INTO MyGuests ( firstname, lastname, email, favorites )
	VALUES( 'miko', 'no-info', 'no-info', 'no-info' );";
$sql .= "INSERT INTO MyGuests ( firstname, lastname, email, favorites )
	VALUES( 'madscientist', 'no-info', 'no-info', 'no-info' );";
$sql .= "INSERT INTO MyGuests ( firstname, lastname, email, favorites )
	VALUES( 'another', 'no-info', 'no-info', 'no-info' )";


if( $conn->multi_query($sql) === TRUE ){
	echo "New record created successfully" . "<br>";
}
else{
	echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
