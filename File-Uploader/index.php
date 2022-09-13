<!DOCTYPE html>
<html>
<head>
	<title>File Upload</title>
	<style type="text/css">
		#error, #success{
			text-align: center;
			margin-top: 50px;
		}
		#error{
			color: red;
		}
		#success{
			color: green;
		}
		.frame{
			width: 100px;
			height: 60px;
			display: inline-block;
		}
		#img-wrapper{
			margin-top: 50px;
		}
		.frame > img{
			width: 100%;
			height: 100%;
		}
	</style>
</head>
<body>
	<form method="post" action="upload.php" enctype="multipart/form-data">
		<fieldset>
			<legend>
				<input type="file" name="myfile">
				<button type="submit" name="button" value="pressed">Upload!</button>
			</legend>
		</fieldset>
		
	</form>

	<div id="error">
		<?php
		if (isset($_GET["error"])) {
			echo $_GET["error"];
		}
		?>
	</div>
	<div id="success">
		<?php
		if (isset($_GET["success"])) {
			echo $_GET["success"];
		}
		?>
	</div>
	<div id="img-wrapper">
		<?php
		$connection = mysqli_connect("localhost", "root", "", "joints_test");
			if (mysqli_connect_errno()) {
				die(mysqli_connect_errno());
			}
			$sql = "SELECT * FROM `files`";
			$result = mysqli_query($connection, $sql);
			if (mysqli_num_rows($result) > 0) {
				while ($data = mysqli_fetch_assoc($result)) {
					echo "<div class='frame'>";
					echo "<img src='".$data["location"]."' alt=''>";
					echo "</div>";  
				}
			}
		?>
	</div>
</body>
</html>