<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>'abc'</title>
	<meta charset="utf-8">
	<style>.error{color:red;}</style>
</head>
<body>
	<h2>The smallest length of string</h2>
	<br><br>
	<?php
		function test_input($data){
			$data = trim($data); //strip unesscessary characters( extra space, tab, newline)
			$data = stripcslashes($data);//remove backslashes(\)
			$data = htmlspecialchars($data);
			return $data;
		}
		function solve($a, $b, $c){
			if($a+$b == 0){
				return $c;
			}
			else if($b+$c == 0){
				return $a;
			}
			else if($c+$a == 0){
				return $b;
			}
			else{
				$a = $a%2;
				$b = $b%2;
				$c = $c%2;
				//echo $a.' '.$b.' '.$c."<br>";
				if($a+$b+$c == 0 )
					return 2;
				else if($a+$b+$c == 3){
					return 2;
				}
				/*else if($a+$b == 0){
					$result = 1;
				}
				else if($b+$c == 0){
					$result = 1;
				}
				else if($c+$a == 0){
					$result = 1;
				}*/
				else{
					return 1;
				}
			}
		}
		$i = 0;
		$a = $b = $c = 0;
		$result = '';
		$inp = $err_inp = '';
		if( isset($_REQUEST['calc']) ){
			$inp = test_input($_POST['inp']);

			if(!(empty($inp))){
			$len = strlen($inp);
			while($i<$len){
				if($inp[$i] == 'a'){
					$a++;
				}
				else if($inp[$i] == 'b'){
					$b++;
				}
				else if($inp[$i] == 'c'){
					$c++;
				}
				else{
					$err_inp = "input only include in 'a','b','c'";
					break;
				}
				//echo "i = ".$i."<br>";
				++$i;
			}
			//echo $a.' '.$b.' '.$c."<br>";
			
				$result = solve($a,$b,$c);
			}
			else{
				$err_inp = "enter test!";
			}
		}
		//echo $inp[1];	
	?>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		Input: <input type="text" name="inp" value=""/>
		<span class="error"><?php echo $err_inp; ?></span>
		<br><br>
		<input type="submit" name="calc" value="Calculate">
		<br><br>
	</form>
	<?php
	//	echo "len = ".strlen($inp);
	/*	if($inp[0] == 'a')
			echo "<br>"."yep";*/
		if(!(empty($result)))
			echo "Result = ".$result;
	?>
	<script type="text/javascript">
		/*
		<button type="button" onclick="output()">Calculate</button>
		function test_input(data){
			data = trim(data); //strip unesscessary characters( extra space, tab, newline)
			data = stripcslashes(data);//remove backslashes(\)
			data = htmlspecialchars(data);
			return data;
		}
		var inp = '', err_inp = '';
		function output(){
			inp = test_input($_POST['inp']);
			//inp = 'lol';
			document.getElementById("result").innerHTML = inp;
		}*/
	</script>
</body>
</html>