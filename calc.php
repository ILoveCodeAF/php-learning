<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>My Calc</title>
	<meta charset="utf-8">
	<style type="text/css">
		.error{color: red;}
	</style>
</head>
<body>
	<h1>Calculator</h1>
	<br>
	<?php
		function test_input($data){
			$data = trim($data); //strip unesscessary characters( extra space, tab, newline)
			$data = stripcslashes($data);//remove backslashes(\)
			$data = htmlspecialchars($data);
			return $data;
		}
		function isOperator($c){
			return $c == '-' || $c == '+' || $c == '*' || $c == '/'; 
		}
		$inp = "";
		$err_inp = "";
		if(isset($_POST['calc'])){
			$inp = test_input($_POST['inp'])
			if(!empty($inp)){

			}
		}
	?>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<br>
		Input: <input type="text" style="width: 400px;" name="inp" value="">
		<br><br>
		<input type="submit" name="calc" value="Calculate">
		<br><br>
	</form>

</body>
</html>