<?php 
$db_host="localhost"; // localhost server
$db_user="root"; // database username
$db_password=""; // database password
$db_name="php_pdo_login_db"; // database name

try{
	$db= new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user,$db_password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOEXCEPTION $e){
	$e->getMessage();
}

$password = 123456;
$hash_enrypt = password_hash($password, PASSWORD_DEFAULT);
/*
"123456" it will be become

$2y$10$4EPUftoDEwiUonmL.x9zu.YOJL8qjrfSVRybkM8Dwo1xgBZPvyBRK

*/
?>