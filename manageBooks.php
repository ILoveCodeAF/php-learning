<!DOCTYPE html>
<html>
	<head>
		<title>Authors</title>
		<meta charset = "UTF-8">
		<meta name="viewport" content = "width = divice-width, initial-scale = 1.0">
	</head>
	<body>
		<h1>Information about books</h1>
		<a href="manageBooks.php">Home</a>
		<a href="AddBooks3.php">Add book</a>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<br/><br/>
			Search(name's author):<input type="text" name="name" value=""/>
			<br/>
			<input type="submit" name="all" value="Dislay all books" />
		</form>
		<br/>
		<br/>
		<br/>
		<?php
			function test_input($data){
				$data = trim($data); //strip unesscessary characters( extra space, tab, newline)
				$data = stripcslashes($data);//remove backslashes(\)
				$data = htmlspecialchars($data);
				return $data;
			}

 			$result = '';
 			$name = test_input($_POST['name']);

 			if( ($_REQUEST['all']) || !empty($name) ){
				$servername = "localhost";
				$username = "overlord";
				$password = "Overl0rd!";
				$dbname = "my_blog";

				//create conection
				$conn = new mysqli($servername, $username, $password, $dbname);
				if($conn->connect_error){
					$result = "connect failed" . $conn->connect_error;
				}
				else{
					if( !empty( $name ) ){
						$result = $name;
					}
					else
						$result = '';
					$sql = 'SELECT id, book_name, author, info FROM book_info_table WHERE author LIKE "%'.$result.'%"';
					echo "<br>".$sql;
					$temp = $conn->query($sql);
					//echo "temp =".$temp->num_rows."<br>";
					echo $result;
					if($temp->num_rows>0){
						$result = $temp->num_rows.' result(s) found' . "<br>";
						echo '<table border="1" cellingspacing="0" cellpadding="10">';
						echo '<tr>';
							echo '<td>'.'id'.'</td>';
							echo '<td>'."book's name".'</td>';
							echo '<td>'."author".'</td>';
							echo '<td>'."info".'</td>';
						echo '</tr>';
						while($row = $temp->fetch_assoc()){
							echo '<tr>';
								echo '<td>'.$row['id'].'</td>';
								echo '<td>'.$row["book_name"].'</td>';
								echo '<td>'.$row["author"].'</td>';
								echo '<td>'.$row["info"].'</td>';
							echo '</tr>';
						}
						echo '</table>';
					}
					else{
						$result = "0 result";
					}
				}
				$conn->close();
			}
		?>
		<?php
			echo $result;
		?>
	</body>
</html>
