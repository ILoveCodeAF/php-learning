<head>
	<title>Your Uploads</title>
	<meta charset="utf-8">
	<style>.error{color: red;}</style>
</head>
<body>
	<h2>Ur Uploads</h2>
	<br><br>
	<?php
		function test_input($data){
			$data = trim($data); //strip unesscessary characters( extra space, tab, newline)
			$data = stripcslashes($data);//remove backslashes(\)
			$data = htmlspecialchars($data);
			return $data;
		}
		$username = $email = $password = $repreat_password = "";
		$err_username = $err_email = $err_password = $err_repreat_password = '';
		$inpOk = 1;

		if(isset($_POST['signup'])){
			$username = test_input($_POST['username']);
			$password = test_input($_POST['password']);
			$email = test_input($_POST['email']);
			$repreat_password = test_input($_POST['repeat_password']);
			
			if(empty($username)){
				$err_username = "username is requied";
				$inpOk = 0;
			}
			if(empty($password)){
				$err_password = "password is requied";
				$inpOk = 0;
			}
			if(empty($email)){
				$err_email = "email is requied";
				$inpOk = 0;
			}
			if(empty($repreat_password)){
				$err_repreat_password = "comfirm password is requied";
				$inpOk = 0;
			}
			/*else if($repreat_password != $password){
				$err_repreat_password = "comfirm password error";
				$inpOk = 0;
			}*/

		}
	?>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<div style="float: left;">
			<a href="UrUploads.php">Home</a>
		</div>
		<div style="float: right;">
			<a href="UrUploads.php">Log in</a>
			<br>
		</div>
		<br><br>
		<p><span class="error">* requied field</span></p>
		<div style="float: left;">
			<br><br>
			Username: <input type="text" name="username" value="">
			<span class="error">*<?php echo $err_username; ?></span>
			<br><br>
			Email: <input type="text" name="email" value="">
			<span class="error">*<?php echo $err_email; ?></span>
			<br><br>
			Password: <input type="text" name="password" value="">
			<span class="error">*<?php echo $err_password; ?></span>
			<br><br>
			Repeat password: <input type="text" name="repeat_password" value="">
			<span class="error">*<?php echo $err_repreat_password; ?></span>
			<br><br>
			<input type="submit" name="signup" value="Signup">
		</div>
		<br>
	</form>
	<?php
		function isExistTable($conn){
			$sqli = 'SELECT id, username FROM person_id';
			//echo $sqli;
			return $conn->query($sqli);
		}
 		if(isset($_POST['signup']) && $inpOk){
			$servername = "localhost";
			$username = "overlord";
			$password = "Overl0rd!";
			$dbname = "my_blog";

			//create conection
			$conn = new mysqli($servername, $username, $password, $dbname);
			if($conn->connect_error){
				$result = "connect failed" . $conn->connect_error;
			}
			if(!isExistTable($conn)){
				//$result = "not exits";
				$sql = "CREATE TABLE person_id (
					id INT(6) UNSIGNED AUTO_INCREMENT,
					username VARCHAR(40) NOT NULL,
					password VARCHAR(40) NOT NULL PRIMARY KEY;
					email VARCHAR(40) NOT NULL;
					reg_date TIMESTAMP
				)";
				if($conn->query($sql)===TRUE){
					echo "created table successfully";
				}
				else{
					echo "failed to create table: " . $conn->error;
				}

				$sql = "CREATE TABLE uploads_info (
					id INT(6) UNSIGNED AUTO_INCREMENT,
					username VARCHAR(40) NOT NULL PRIMARY KEY;
					reg_date TIMESTAMP
				)";
				if($conn->query($sql)===TRUE){
					echo "created table successfully";
				}
				else{
					echo "failed to create table: " . $conn->error;
				}
			}
			$sql = "INSERT INTO person_id(username, password, email) VALUES( '".$username."', '".$password."', '".$email."')";
			echo "<br>".$sql;
			if($conn->query($sql)===TRUE){
				echo "<br>"."Sign up successfully";
			}
			else{
				echo "<br>"."Failed to sign up";
			}
			$conn->close();
		}
	?>
</body>
</html>