<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>add book_info</title>
	<meta charset="UTF-8">
	<meta name='viewport' content="width=device-width, initial-scale = 1.0">
</head>
<body>
	<h1>ADD BOOKs</h1>
	<a href="manageAuthors.php">Home</a>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		Name's book<input type="text" style="width:200px, text-align:right;" name="book_name" value="" />
		<br/><br/>
		Author<input type="text" style="width:200px, text-align:righ" name="author" value="" />
		<br/><br/>
		Info<textarea name="info" rows="5" cols="40"></textarea>
		<br/><br/>
		<input type="submit" name="add" value="Add"/>
		<br/>
	</form>
	<?php
		function test_input($data){
				$data = trim($data); //strip unesscessary characters( extra space, tab, newline)
				$data = stripcslashes($data);//remove backslashes(\)
				$data = htmlspecialchars($data);
				return $data;
			}
		$result = '';//echo "here";
		function isExistTable($conn){
			$sqli = 'SELECT id, book_name, author, info FROM book_info_table';
			//echo $sqli;
			return $conn->query($sqli);
		}
		if(isset($_POST['add'])){
			$result = 1;
			//$result = "here";
			/*if($result)
				echo "hontony";*/
			//$book_name = $author = $info = "";
			//$book_name = test_input($_POST['book_name']);
			if(!isset($_POST['book_name'])){
				$result = 0;
				//echo "hontony";
			}
			if(!isset($_POST['author'])){
				$result = 0;
			}
			if(!isset($_POST['info'])){
				$result = 0;
			}
			if($result == 1){
				$servername = 'localhost';
				$username = 'overlord';
				$password = 'Overl0rd!';
				$dbname = 'my_blog';

				$conn = new mysqli($servername, $username, $password, $dbname);
				if($conn->connect_error){
					die ("failed to connect to database" . $conn->connect_error);
				}$result = "";
				if(!isExistTable($conn)){
					//$result = "not exits";
					$sql = "CREATE TABLE book_info_table (
						id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
						book_name VARCHAR(40) NOT NULL,
						author VARCHAR(40) NOT NULL,
						info VARCHAR(200),
						reg_date TIMESTAMP
					)";
					if($conn->query($sql)===TRUE){
						echo "created table successfully";
					}
					else{
						echo "failed to create table: " . $conn->error;
					}
				}
				/*else{
					$result = "database created";
				}*/
				$sql = "INSERT INTO book_info_table(book_name, author, info) VALUES( '".$_POST['book_name']."', '".$_POST['author']."', '".$_POST['info']."')";
				echo "<br>".$sql;
				if($conn->query($sql)===TRUE){
					echo "<br>"."Added book to database successfully";
				}
				else{
					echo "<br>"."Failed to add book to database";
				}
				$conn->close();
			}
			else{
				$result = "u havent fill all info";
			}
		}
	?>
	<?php
		echo $result;
	?>
</body>
</html>