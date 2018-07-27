<?php
$servername = "localhost";
$username = "overlord";
$password = "Overl0rd!";
$dbname = "my_blog";

//check connection
$conn = new mysqli( $servername, $username, $password, $dbname );
//$conn = sql_connect( $servername, $username, $password );
if( $conn->connect_error ){
	die( "failed to connect: ".$conn->connect_error );
}
echo "connected successfully"."<br>";

$sql = 'DELETE FROM MyGuests WHERE id = 6';
//mysql_select_db( $dbname );
echo "here?" . "</br>";
if( $conn->query($sql) === FALSE ){
	die( "can't delete query where id = 6" . $conn->error );
}
echo "delete successfully";

$conn->close();
//mysql_close( $conn );
?>
