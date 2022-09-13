<?php
if (isset($_POST["button"])) {
	$upload_directory 		= "../uploads/";
	$filename 				= $_FILES["myfile"]["name"];
	$upload_directory 		= $filename;
	$tmp_dir 				= $_FILES["myfile"]["tmp_name"];
	$size 					= $_FILES["myfile"]["size"];
	$ext					= pathinfo($filename, PATHINFO_EXTENSION);

	if ($ext == 'jpg' OR $ext == 'jpeg' OR $ext =='png' OR $ext == 'gif') {
		$uploaded =  move_uploaded_file($tmp_dir, $upload_directory);
		if($uploaded){
			$connection = mysqli_connect("localhost", "root", "", "joints_test");
			if (mysqli_connect_errno()) {
				die(mysqli_connect_errno());
			}
			$sql = "INSERT INTO `files`(`filename`, `location`) VALUES (?, ?)";
			$stmt = mysqli_prepare($connection, $sql);

			if ($stmt) {
				mysqli_stmt_bind_param($stmt, 'ss', $filename, $upload_directory);
				$saved = mysqli_stmt_execute($stmt);
				if ($saved) {
					header("Location: index.php?success=File Uploaded!!!");
				}else{
					if (file_exists($upload_directory)) {
						unlink($upload_directory);
					}
					header("Location: index.php?error=Error: Unable to store info in db");
				}
			}
		}
		else{
		  header("Location: index.php?error=Error: Unable to upload in dir!");
		}
	} else{
		header("Location: index.php?error=Error: It's not an image file!");
	}
}else{
	header("Location: index.php?error=Error: Please upload the file!");
}
?>