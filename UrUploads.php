<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Your Uploads</title>
	<meta charset="utf-8">
</head>
<body>
	<h2>Ur Uploads</h2>
	<br><br>
	<form>
		<a href="UrUploads.php">Home</a>
		<div style="float: right;">
			<a href="UrUploads.php">Log in</a>
			<a id="signup" href="signup.php">Sign up</a>
		</div>
		<br>
	</form>
	<?php
		//echo "<script>document.getElementById("signup").innerHTML = display</script>";
		/*if(isset(&_POST['login'])){

		}*/
		//<button id = "login">Log in</button>
		//<button id = "signup">Sign up</button>
		//<input type="submit" name="login" value="Log In" />
		//<input type="submit" name="signup" value="Sign Up"/>
		function test_input($data){
			$data = trim($data); //strip unesscessary characters( extra space, tab, newline)
			$data = stripcslashes($data);//remove backslashes(\)
			$data = htmlspecialchars($data);
			return $data;
		}
		
 		/*if( ($_REQUEST['all']) || !empty($name) ){
			$servername = "localhost";
			$username = "overlord";
			$password = "Overl0rd!";
			$dbname = "my_blog";

			//create conection
			$conn = new mysqli($servername, $username, $password, $dbname);
			if($conn->connect_error){
				$result = "connect failed" . $conn->connect_error;
			}
			$conn->close();
		}*/
	?>
</body>
</html>