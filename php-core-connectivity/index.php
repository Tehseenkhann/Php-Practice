<?php
if(isset($errorMsg)){
	foreach ($errorMsg as $error) {
		?>
		<div class="alert alert-danger">
			<strong><?php echo $error; ?></strong>
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
		<label class="col-sm-3 control-label">Username or Email</label>
		<div class="col-sm-6">
			<input type="text" name="txt_username_email" class="form-control" placeholder="enter Username or email">

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
			<input type="submit" name="btn_login" class="btn btn-success" value="Login">
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-9 m-t-15">
			You don't have a account register here? <a href="register.php"><p class="text-info">Register Account</p></a>
		</div>
	</div>

</form>

<?php

require_once 'connection.php';

session_start();

if (isset($_SESSION["user_login"])) {
	header("location: welcome.php");
}

if (isset($_REQUEST['btn_login'])) {
	$username =strip_tags($_REQUEST["txt_username_email"]);
	$email =strip_tags($_REQUEST["txt_username_email"]);
	$password =strip_tags($_REQUEST["txt_password"]);

	if (empty($username)) {
		$errorMsg[]="Please Enter username or email";
	}
	elseif (empty($email)) {
		$errorMsg[]="Please Enter username or email";
	}
	elseif (empty($password)) {
		$errorMsg[]="Please Enter Password";
	}
	else{
		try {
			$select_stmt=$db->prepare("SELECT * FROM tbl_user WHERE username=:uname OR email=:uemail");
			$select_stmt-> execute(array(':uname'=>$username, ':uemail'=>$email));
			$row=$select_stmt->fetch(PDO::FETCH_ASSOC);

			if ($select_stmt-> rowCount() > 0) {
				if ($username==$row["username"] OR $email==$row["email"]) {
					if (password_verify($password, $row["password"])) {
						$_SESSION["user_login"] = $row["user_id"];
						$loginMsg="Successfully Login...";
						header("refresh:2; welcome.php");
					}else{
						$errorMsg[]="Wrong Password";
					}
				}
				    else{
						$errorMsg[]="Wrong username or email";
				    }
			    }
			    else{
						$errorMsg[]="Wrong username or email";
					}
			} catch (Exception $e) {
				$e->getMessage();
		}
	}
}

?>