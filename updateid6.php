<?php
$servername = "localhost";
$username = "overlord";
$password = "Overl0rd!";
$dbname = "my_blog";

//check connection
$conn = new mysqli( $servername, $username, $password, $dbname );
if( $conn->connect_error ){
	die( "cant connect: ".$conn->connect_error );
}
echo "connect Successfully"."<br>";

$sql = 'UPDATE MyGuests SET id = 6 WHERE id = 7';

if( $conn->query( $sql ) === TRUE ){
	echo "update successfully";
}
else{
	echo "fail to update";
}
$conn->close();
?>
