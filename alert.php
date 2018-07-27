<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Alert</title>
	<meta charset="utf-8">
</head>
<body>
	<form method="get" action="">
		Alert message:<input type="text" name="msg" value="">
	</form>
	<?php
//alert("Hello World");
	$msg = $_GET['msg'];
	if(!empty($msg)){
		alert($msg);
	}
	function alert($msg) {
	    echo "<script type='text/javascript'>alert('$msg	');</script>";
	}
	?>
</body>
</html>