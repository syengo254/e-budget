<?php 
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
	echo "1";
	exit();
}
else{
	$db->do_query($s_q);
	$num = 0;
	list($num) = mysqli_fetch_array($db->db_query);
	
	if($num == 1){
		echo "1";
		exit();
	}
	else{
		echo "0";
		exit();
	}
}
?>