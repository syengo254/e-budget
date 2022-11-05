<?php 
session_start();
include "../sharedlibs/DBMS.class.php";

$code = $_POST["smscode"];
$db = new DBMS();

$db->do_query("SELECT id FROM smscodes WHERE code = '".$code."'");

if($num = mysqli_num_rows($db->db_query) > 0){
	$_SESSION["code"] = NULL;
	unset($_SESSION["code"]);
	unset($_SESSION["phone"]);
	//set account as confirmed.
	$id = $_SESSION["id"];
	$db->do_query("UPDATE account_state SET state = 'confirmed' WHERE cust_id = ".$id." OR supp_id = ".$id);
	
	echo '{"success":1}';
	exit();
}
else{
	echo '{"success":0}';
	exit();
}
?>