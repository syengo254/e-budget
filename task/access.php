<?php 
//this is the main login script.
session_start();
include "../sharedlibs/DBMS.class.php";

$db = new DBMS();

$email = $db->escape(stripslashes(htmlspecialchars($_POST['email'])));
$pass = sha1($db->escape(stripslashes(htmlspecialchars($_POST['pass']))));

$c_q = "SELECT COUNT(customer_id) FROM customers WHERE email = '".$email."' AND password = '".$pass."'"; //check into customers.
$s_q = "SELECT COUNT(id) FROM stores WHERE email = '".$email."' AND password = '".$pass."'"; // check from supplires/stores.

$db->do_query($c_q);
$num = 0;
list($num) = mysqli_fetch_array($db->db_query);

if($num == 1){
	$db->do_query("SELECT customer_id, CONCAT(first_name, ' ', last_name) AS name FROM customers WHERE email = '".$email."' AND password = '".$pass."'");
	
	list($id, $name) = mysqli_fetch_array($db->db_query);
	
	$_SESSION["id"] = $id;
	$_SESSION["name"] = $name;
	$_SESSION["access_c"] = true; //to differentiate customer and supplier due to session names being similar.
	
	header("Location: ../customer_home.php");	
	exit();
}
else{
	$db->do_query($s_q);
	$num = 0;
	list($num) = mysqli_fetch_array($db->db_query);
	
	if($num == 1){
		$db->do_query("SELECT id, name, logo FROM stores WHERE email = '".$email."' AND password = '".$pass."'");
	
		list($id, $name, $logo) = mysqli_fetch_array($db->db_query);
		
		$_SESSION["id"] = $id;
		$_SESSION["pid"] = $id;
		$_SESSION["name"] = $name;
		$_SESSION["pic"] = $logo;
		$_SESSION["access_s"] = true; //to differentiate customer and supplier due to session names being similar.
		
		header("Location: ../supplier_home.php");
		exit();
	}
	else{
		header("Location: ../login.php?attempt=1");
	}
}
?>