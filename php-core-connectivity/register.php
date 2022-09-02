<?php
if(isset($errorMsg)){
	foreach ($errorMsg as $error) {
		?>
		<div class="alert alert-danger">
			<strong>WRONG ! <?php echo $error; ?></strong>
		</div>
		<?php 
	}
}
if (isset($loginMsg)) {
	?>
	<div class="alert alert-success">
		<strong><?php echo "$loginMsg"; ?></strong>
	</div>
	<?php
}
?>

<form method="post" class="form-horizontal">
	<div class="form-group">
		<label class="col-sm-3 control-label">Username</label>
		<div class="col-sm-6">
			<input type="text" name="txt_username" class="form-control" placeholder="enter Username or email">

		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label">Email</label>
		<div class="col-sm-6">
			<input type="text" name="txt_email" class="form-control" placeholder="enter Username or email">

		</div>
	</div>


	<div class="form-group">
		<label class="col-sm-3 control-label">Password</label>
		<div class="col-sm-6">
			<input type="Password" name="txt_password" class="form-control" placeholder="enter password">
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-9 m-t-15">
			<input type="submit" name="btn btn-primary" value="Register">
		</div>
	</div>


	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-9 m-t-15">
			You have a account register here? <a href="index.php"><p class="text-info">Login Account</p></a>
		</div>
	</div>

</form>

<?php

require_once 'connection.php';

session_start();

if (isset($_REQUEST['btn_register'])) {
	$username =strip_tags($_REQUEST["txt_username"]);
	$email =strip_tags($_REQUEST["txt_email"]);
	$password =strip_tags($_REQUEST["txt_password"]);

	if (empty($username)) {
		$errorMsg[]="Please Enter username";
	}
	elseif (empty($email)) {
		$errorMsg[]="Please Enter email";
	}
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errorMsg[]="Please Enter a valid email address";
	}
	elseif (empty($password)) {
		$errorMsg[]="Please Enter Password";
	}
	elseif (strlen($password)< 6) {
		$errorMsg[]="Password must be atleast 6 characters";
	}
	else{
		try {
			$select_stmt=$db->prepare("SELECT username, email FROM tbl_user WHERE username=:uname OR email=:uemail");
			$select_stmt-> execute(array(':uname'=>$username, ':uemail'=>$email));
			$row=$select_stmt->fetch(PDO::FETCH_ASSOC);

			if ($row["username"]==$username) {
				$errorMsg[] = "Sorry Username already exists";
			} elseif ($row["email"]==$email) {
				$errorMsg[] = "Sorry Email already exists";
			} elseif (!isset($errorMsg)) {
				$new_password = password_hash($password, PASSWORD_DEFAULT);
				$insert_stmt=$db->prepare("INSERT INTO tbl_user (username, email,password) VALUES (:uname,:uemail,:upassword)");
				if ($insert_stmt->execute(array(':uname'=> $username, ':uemail'=>$email, ':upassword'=>$password))) {
					$registerMsg="Register Successfully..... Please Click on the Login Account Link";
				}
			}
		}
			 catch (Exception $e) {
				$e->getMessage();
		}
	}
}

?>