<?php 
//This script deletes the product specified by the posted product-id.
session_start();
require_once("../sharedlibs/session_validator.php");
include "../sharedlibs/DBMS.class.php";

$db = new DBMS();
$pid = $_POST["pid"];

$db->do_query("DELETE FROM products WHERE id = ".$pid);

if($db->db_query){
	$db->do_query("DELETE FROM prices WHERE product_id = ".$pid);
	if($db->db_query){
		echo "1";
	}
	else{
		echo "-1";
	}
}
else{
	echo "0";
}
?>