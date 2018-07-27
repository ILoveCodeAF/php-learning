<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>display array</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
		echo '<table border="1" cellspacing="0" cellpadding="10">';
		$i = 0;
		while($i<5){
			$j = 0;
			echo '<tr>';
			while($j<9){
				echo '<td>' . $j . '</td>';
		//	if( $i%5 == 0 )
		//		echo "<br>";
				++$j;
			}
			echo '</tr>';
			++$i;
		}
		echo '</table>';
	?>
</body>
</html>