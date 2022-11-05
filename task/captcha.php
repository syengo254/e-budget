<?php 
session_start();

$code = $_POST["code"];

if($_SESSION["code"] == strtolower($code)){
	unset($_SESSION["code"]);
	echo '{"success":1}';
	exit();
}else{
	echo '{"success":0}';
	exit();
}
?>