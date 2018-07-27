<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>add book_info</title>
	<meta charset="UTF-8">
	<meta name='viewport' content="width=device-width, initial-scale = 1.0">
	<style>.error{color: red;}</style>
</head>
<body>
	<h2>ADD BOOKs</h2>
	<a href="manageBooks.php">Home</a>
	<p><span class="error">* requied field</span></p>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		Name's book<input type="text" style="width:200px, text-align:right;" name="book_name" value="" />
		<span class="error">*<?php echo $err_book_name; ?></span>
		<br/><br/>
		Author<input type="text" style="width:200px, text-align:righ" name="author" value="" />
		<span class="error">*<?php echo $err_author; ?></span>
		<br/><br/>
		Info<br/><textarea name="info" rows="5" cols="40"></textarea>
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
			$book_name = $author = $info = '';
			$err_book_name = $$err_author = '';

			$book_name = test_input($_POST['book_name']);
			$author = test_input($_POST['author']);
			$info = test_input($_POST['info']);

			if(empty($book_name)){
				$result = 0;
				$err_book_name = "Name's book is required";
			}
				//echo "hontony";
			if(empty($author)){
				$result = 0;
				$err_author = "Author is required";
			}
			if($result == 1){
				if(empty($info)){
					//$result = 0;
					$info = 'no info';
				}

				$servername = 'localhost';
				$username = 'overlord';
				$password = 'Overl0rd!';
				$dbname = 'my_blog';

				$conn = new mysqli($servername, $username, $password, $dbname);
				if($conn->connect_error){
					die ("failed to connect to database" . $conn->connect_error);
				}
				$result = "";
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
				$sql = "INSERT INTO book_info_table(book_name, author, info) VALUES( '".$book_name."', '".$author."', '".$info."')";
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
				$result = "some info havent been filled!";
			}
		}
	?>
	<?php
		echo $result;
	?>
</body>
</html>