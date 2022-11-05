<?php 
//THIS SCRIPT EDITS CONTENTS OF A CUSTOMER'S SHOPPING CART.
session_start();
include "../sharedlibs/DBMS.class.php";
if(!(isset($_SESSION["access_c"]))){
	echo '{"success":0}';
	exit();
}
$action = $_POST["action"];
$pid = $_POST["id"];
$db = new DBMS();
$cid = $_SESSION["id"];

switch($action){
	case "delete":
	delete($db, $pid, $cid);
	break;
	case "add":
	add($db, $pid, $cid);
	break;
	case "less":
	less($db, $pid, $cid);
	break;
}

function delete($db, $pid, $cid){
	$db->do_query("DELETE FROM shopping_cart WHERE product_id = ".$pid." AND customer_id = ".$cid." AND checked = 'no'");
	if($db->db_query){
		echo '{"success":1}';
		exit();
	}
	else{
		echo '{"success":0}';
		exit();
	}
}

function add($db, $pid, $cid){
	$db->do_query("UPDATE shopping_cart SET quantity = (quantity + 1), amount_payable = (price_per_item * quantity) WHERE product_id = ".$pid." AND customer_id = ".$cid." AND checked = 'no'");
	if($db->db_query){
		echo '{"success":1}';
		exit();
	}
	else{
		echo '{"success":0}';
		exit();
	}
}

function less($db, $pid, $cid){
	$db->do_query("SELECT quantity FROM shopping_cart WHERE product_id = ".$pid." AND customer_id = ".$cid." AND checked = 'no'");
	list($num) = mysqli_fetch_array($db->db_query);
	if($num > 1){
		$db->do_query("UPDATE shopping_cart SET quantity = (quantity - 1), amount_payable = (price_per_item * quantity) WHERE product_id = ".$pid." AND customer_id = ".$cid." AND checked = 'no'");
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
		delete($db, $pid, $cid);
	}
}
?>