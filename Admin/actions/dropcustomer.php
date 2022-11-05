<?php 
session_start();
include '../sharedlibs/session_check.php';
include '../sharedlibs/DBMS.class.php';

$db = new DBMS();
$id = $_POST['id'];

$db->do_query("DELETE FROM customers WHERE customer_id = ".$id);

if($db->db_query){
	$db->do_query("DELETE FROM physical_addresses WHERE customer_id = ".$id);
	if($db->db_query){
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