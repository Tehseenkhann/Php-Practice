<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'php_pdo_login_db');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   if (!$db) {
   		echo "No Connection <br />";

   	}else{
   		echo "Connection Successfully <br />";
   	}  

	  $user_id = isset($_POST["user_id"]);
      $username = isset($_POST["username"]); 
      $email = isset($_POST["email"]);
      $password = isset($_POST["password"]);
      $sql = "INSERT INTO `tbl_user` (`username`, `email`, `password`) VALUES ('$username', '$email', '$password')";
      mysqli_query($db, $sql);
      if(mysqli_affected_rows($db)){
      	echo "Data inserted successfully<br>";
      }else{
      	echo "Error inserting data<br>";
      }
?>