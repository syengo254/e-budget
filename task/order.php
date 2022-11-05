<?php 
session_start();
include "../sharedlibs/session_validator.php";
include "../sharedlibs/DBMS.class.php";

$cartid = $_SESSION['cart_id'];
$cid = $_SESSION['id'];
$db = new DBMS();

$db->do_query("INSERT INTO orders(id, cart_id, time_of_order, delivered) VALUES(NULL, '".$cartid."', CURRENT_TIMESTAMP, 'NO')");
if($db->db_query){
	$db->do_query("SELECT id FROM orders WHERE cart_id = '".$cartid."'");
	
	if($db->db_query){
		list($oid) = mysqli_fetch_array($db->db_query);
		$_SESSION["order_id"] = $oid;
		echo '{"success":1}';
		exit();
	}
	else{
		echo '{"success":0}';
		exit();
	}
}
else{
	echo '{"success":0}';
	exit();
}
?>