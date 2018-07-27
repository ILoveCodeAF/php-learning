<!DOCTYPE html>
<html>
	<head>
		<title>Giai pt bac 1</title>
		<meta charset="UTF-8">
		<meta name='viewport' content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<?php
			$result = '';
			if(isset($_POST['calculator'])){
			//	echo isset($_POST['a']);
			//	if("/"==0)
			//		echo "f";
				if(isset($_POST['a']))
					$a = (float)trim($_POST['a']);
				else{
					$a = ' '; 
				}
				if(isset($_POST['b']))
					$b = (float)trim($_POST['b']);
				else
					$b = ' ';
				if( empty(a) ){
					$result = "a havent entered number a";
				}
				else if( $a == '' ){
					$result = "a cant be 0";
				}
				else if( $b == '' ){
					$result = "u havent entered number b";
				}
				else
					$result = -($b)/$a;
			}
		?>
		<h1>Giai pt bac nhat</h1>
		<form method="post" action="">
			<input type="text" style="width: 20px" name="a" value=""/>.x + 
			<input type="text" style="width: 20px" name="b" value=""/> = 0;
			<br/><br/>
			<input type="submit" name="calculator" value="calculate"/>
		</form>
		<?php echo $result; ?>
	</body>
</html>