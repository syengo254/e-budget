<?php 
session_start();
//make sure it is accessible to logged in users.
require_once("../sharedlibs/session_validator.php");
include "../sharedlibs/DBMS.class.php";

$db = new DBMS();
$pid = $db->escape($_POST["pid"]);//product id
$sid = $db->escape($_POST["sid"]);//store id
$qty = $db->escape((int)($_POST["quantity"]));
$customer_id = $_SESSION["id"];

if($qty == 0) {echo "{\"success\":-2}"; exit();}
if($qty > 24) {echo "{\"success\":\"C.O\"}"; exit();}

$price = getPrice($db, $pid);
$amt_payable = $price * $qty;
$cart_id = '';

if(isset($_SESSION["cart_id"]) && $_SESSION["cart_id"] != ''){ //check if cart id is created, otherwise create it and save it as a session variable.
	$cart_id = $_SESSION["cart_id"];
}
else{
	$cart_id = createCartId($db, $customer_id);
	$_SESSION["cart_id"] = $cart_id;
}

$db->do_query("INSERT INTO shopping_cart(id, product_id, store_id, quantity, customer_id, price_per_item, amount_payable, checked) VALUES('".$cart_id."',".$pid.",".$sid.",".$qty.",".$customer_id.",".$price.",".$amt_payable.", 'no')");
if($db->db_query){
	$db->do_query("SELECT quantity FROM shopping_cart WHERE customer_id = '".$customer_id."' AND checked = 'no'");
	
	$arr = array();
	$total = 0;
	while(list($num) = mysqli_fetch_array($db->db_query)){
		$total += $num;
	}
	$arr["success"] = 1;
	$arr["num_items"] = $total;
	
	echo json_encode($arr);
	exit();
}
else{
	echo '{"success":0}';
	exit();
}

function getPrice($dbh, $id){
	$dbh->do_query("SELECT price FROM prices WHERE product_id = ".$id);
	if($dbh->db_query){
		list($id) = mysqli_fetch_array($dbh->db_query);
		return $id;
	}
}

function createCartId(DBMS $dbh, $cust_id){//This function generates a new cart_id.
	$dbh->do_query("SELECT CONCAT(first_name, ' ', last_name) FROM customers WHERE customer_id = ".$cust_id);
	$name = '';
	list($name) = mysqli_fetch_array($dbh->db_query);
	$f = ''; $l = '';
	list($f, $l) = explode(" ", $name);
	$f = strtoupper(substr($f, 0, 1));
	$l = strtoupper(substr($l, 0, 1));
	
	$c_id = $f.$l.date("h:i A");
	
	return $c_id;
}
?>