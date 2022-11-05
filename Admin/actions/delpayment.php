<?php 
session_start();
include '../sharedlibs/session_check.php';
include '../sharedlibs/DBMS.class.php';

$db = new DBMS();
$id = $_POST['id'];

$db->do_query("DELETE FROM payments WHERE id = ".$id);

if($db->db_query){
	echo '{"success":1}';
	exit();
}
else{
	echo '{"success":0}';
	exit();
}
?>