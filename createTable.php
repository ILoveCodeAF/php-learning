<?php
$servername = "localhost";
$username = "overlord";
$password = "Overl0rd!";
$dbname = "my_blog";

//create connection
$conn = new mysqli( $servername, $username, $password, $dbname );

//check connection
if( $conn->connect_error ){
	die( "connection failed: ".$conn->connect_error );
}
echo "connected successfully"."<br>";

//sql 2 create table
$sql = "CREATE TABLE MyGuests (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	firstname VARCHAR(30) NOT NULL,
	lastname VARCHAR(30) NOT NULL,
	email VARCHAR(50),
	favorites VARCHAR(50),
	reg_date TIMESTAMP
)";

if( $conn->query($sql) === TRUE ){
	echo "Table is created succesfully";
}
else{
	echo "failes to created table: ".$conn->error;
}

$connn->close();
?>
