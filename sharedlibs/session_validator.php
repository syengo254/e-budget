<?php 
if(!((isset($_SESSION["id"]) && isset($_SESSION["access_c"])) || (isset($_SESSION["id"]) && isset($_SESSION["access_s"])))){
	session_destroy();
	header("Location: index.php");
}
?>