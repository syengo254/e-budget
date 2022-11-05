<?php 
session_start();
include "sharedlibs/DBMS.class.php";

if(isset($_POST["log"])){	
	$db = new DBMS();
	$user = $db->escape(stripslashes($_POST["username"]));
	$pass = sha1($db->escape(stripslashes($_POST["password"])));
	
	$db->do_query("SELECT COUNT(id) FROM admin WHERE username = '".$user."' AND password ='".$pass."'");
	
	if($db->db_query){
		list($num) = mysqli_fetch_array($db->db_query);
		
		if($num > 0 && $num < 2){
			$_SESSION["access_a"] = true;
			$_SESSION["name"] = $user;
			
			header("Location: index.php");
		}
		else{
			session_destroy();
			header("Location: login.php?err=1");
		}
	}
	else{
		echo "LOGIN FAILED PLEASE TRY AGAIN.";
	}
}
else{
	echo "LOGIN VIA THE APPROPRIATE MEANS.";
	exit();
}
?>