<?php 
if(!(isset($_SESSION["access_a"]) && $_SESSION["access_a"])){
	showLogin();
}

function showLogin(){
	header("Location: login.php");
	session_destroy();
	exit();
}
?>