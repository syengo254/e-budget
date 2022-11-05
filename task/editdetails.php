<?php 
//THIS SCRIPT EDITS USERS' PROFILE INFO.
session_start();
require_once("../sharedlibs/session_validator.php");
include "../sharedlibs/DBMS.class.php";

$db = new DBMS();
$id = $_SESSION['id'];
if($_POST['user'] == '001'){
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	
	$db->do_query("UPDATE stores SET name = '".$name."', phone = '".$phone."', email = '".$email."' WHERE id = ".$id);
	if($db->db_query){
		echo '{"success":1}';
		exit();
	}
	else{
		echo '{"success":0}';
		exit();
	}
}
else if($_POST['user'] == '002'){
	$db->do_query("SELECT first_name, last_name, email FROM customers WHERE customer_id = ".$id);
	list($bfname, $blname, $bemail) = mysqli_fetch_array($db->db_query);
	
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$town = $_POST['town'];
	$area = $_POST['area'];
	$street = $_POST['street'];
	$plot = $_POST['plot'];
	$door = $_POST['door'];
	$add = $_POST['add'];
	
	$db->do_query("UPDATE customers SET first_name = '".$fname."', last_name = '".$lname."', email = '".$email."' WHERE customer_id = ".$id);
	if($db->db_query){
		$db->do_query("UPDATE physical_addresses SET town = '".$town."', area = '".$area."', street_estate = '".$street."', plot_no_name = '".$plot."', door_no = '".$door."', add_details = '".$add."' WHERE customer_id = ".$id);
		
		if($db->db_query){
			echo '{"success":1}';
			exit();
		}
		else{
			$db->do_query("UPDATE customers SET first_name = '".$bfname."', last_name = '".$blname."', email = '".$bemail."' WHERE customer_id = ".$id);
			
			echo '{"success":0}';
			exit();
		}
	}
	else{
		echo '{"success":0}';
		exit();
	}
}
else{
	exit();
}
?>