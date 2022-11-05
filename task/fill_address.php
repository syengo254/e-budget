<?php 
session_start();
if(!(isset($_SESSION["reg"]) && $_SESSION["reg"])){
	header("Location: ../index.php");
}
include "../sharedlibs/DBMS.class.php";

$db = new DBMS();

// get posted address info;
$town = $db->escape(stripslashes(htmlspecialchars($_POST["town"])));
$area = $db->escape(stripslashes(htmlspecialchars($_POST["area"])));
$street = $db->escape(stripslashes(htmlspecialchars($_POST["street"])));
$plot = $db->escape(stripslashes(htmlspecialchars($_POST["plot"])));
$door = $db->escape(stripslashes(htmlspecialchars($_POST["door"])));
$add = $db->escape(stripslashes(htmlspecialchars($_POST["add"])));

// get session array with personal data.
if($_SESSION["form_data"]["fname"]!=''){
	$fname = $db->escape($_SESSION["form_data"]["fname"]);
	$lname = $db->escape($_SESSION["form_data"]["lname"]);  
	$id = $db->escape($_SESSION["form_data"]["id"]);
	$email = $db->escape($_SESSION["form_data"]["email"]);
	$phone = $db->escape($_SESSION["form_data"]["phone"]);
	$pass = $db->escape($_SESSION["form_data"]["pass"]);
	$gender = $db->escape($_SESSION["form_data"]["gender"]);
}else{
	echo '{"success":0}';
	exit();
}

$db->do_query("INSERT INTO customers(customer_id, first_name, last_name, id_number, gender, email, phone_number, password) VALUES(NULL,'".$fname."','".$lname."','".$id."','".$gender."','".$email."','".$phone."','".$pass."')");

if($db->db_query){
	$db->do_query("SELECT customer_id FROM customers where email = '".$email."'");
	list($cid) = mysqli_fetch_array($db->db_query);
	
	$db->do_query("INSERT INTO physical_addresses(customer_id, town, area, street_estate, plot_no_name, door_no, add_details) VALUES(".$cid.",'".$town."','".$area."','".$street."','".$plot."','".$door."','".$add."')");
	
	if($db->db_query){
		$_SESSION["form_data"] = NULL;
		unset($_SESSION["form_data"]);
		
		$db->do_query("INSERT INTO account_state(id, cust_id, state) VALUES(NULL,".$cid.",'not confirmed')");
		
		$_SESSION['phone'] = $phone;
		$_SESSION['id'] = $cid;
		$_SESSION['name'] = $fname." ".$lname;
		
		echo '{"success":1}';
		exit();
	}else{
		$db->do_query("DELETE FROM customers WHERE email = '".$email."'");
		echo '{"success":-1}';
		exit();
	}
}
else{
	$_SESSION["form_data"] = NULL;
	unset($_SESSION["form_data"]);
	echo '{"success":0}';
	exit();
}
?>