<!DOCTYPE html>
<html>
<body>

<h1>My first PHP page</h1>

<?php
	echo "Hello World!" . "<br>";
	$x = 3;
	$y = 5;
	print $x+$y;
function isprime($n){
	if( $n<2 )
		//echo "<br>". $n . " nho hon " . 2;
		return FALSE;
	for($i = 2; $i*$i<=$n; ++$i)
		if($n%$i == 0)
			return FALSE;
	return TRUE;
}
for($i = 1; $i<10; ++$i)
	if( isprime($i) == TRUE ){
		print "<br>". $i ." is prime";
	}
	else{
		print "<br>".$i." is nope";
	}
$string = "oh my godness";
echo "<br>" . $string . "<br>";
for($i = 0; $i<strlen($string); ++$i)
	echo $string[$i] . " / ";
?>

</body>
</html>
