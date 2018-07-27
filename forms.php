 <html>
<body>

<form action="welcome.php" method="post">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
<input type="submit">
</form>

<?php
//	$x = 10;
//	$x /= 4;
//	$x = (int)$x;
	echo $x . "<br>";
	function reverseNumber($n){
		$t = 0;
		while($n != 0){
			$t = $t*10+$n%10;
			$n = $n/10;
			$n = (int)$n;
			//echo $n . " ";
		}
		//echo $t. "<br>";
		return $t;
	}
	echo "hello" . "<br>";
	for($i = 10; $i<20; ++$i){
		$n = reverseNumber($i);
		echo $n . " " . $i. "<br>";
	}
	
?>
</body>
</html> 
