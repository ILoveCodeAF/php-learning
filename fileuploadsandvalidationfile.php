<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Upload file</title>
	<meta charset="utf-8">
</head>
<body>
	<h2>File upload</h2>
	<form action="upload.php" method="post" enctype="multipart/form-data">
		Select image to upload:
		<input type="file" name="fileToUpload" value="Upload File">
		<br><br>
		<input type="submit" name="submit" value="Submit">
	</form>
	<?php
		$target_dir = 'uploads/';
		$target_file = $target_dir.basename($_FILES['fileToUpload']['name']);
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$uploadOk = 1;
		if(isset($_POST['submit'])){
			if(file_exists($target_file)){
				echo "Sorry, file already exists.";
				$uploadOk = 0;
			}
			else{
				$check = getimagesize($_FILES['fileToUpload']['tmp_name']);
				if(!$check){
					echo "file is not an image.";
					$uploadOk = 0;
				}
				else{
					//echo "file is an image - ".$check['mine'].'.';
					if($imageFileType!="jpg" && $imageFileType!="jpeg" && $imageFileType!="png" && $imageFileType!="gif"){
						echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed";
						$uploadOk = 0;
					}
					else{
						if($_FILES['fileToUpload']['size']>500000){
							echo "Sorry, your file is too large.";
							$uploadOk = 0;
						}
					}
				}
			}
			if($uploadOk==0){
				echo "Sorry, your file was not upload.";
			}
			else{
				if(move_uploaded_file($_FILES['fileToUpload']["tmp_name"], $target_file)){
					echo "The file ". basename($_FILES["fileToUpload"]['name'])." has been uploaoded.";
				}
				else{
					echo "Sorry, there was an error uploading your file.";
				}
			}
		}
	?>
</body>
</html>