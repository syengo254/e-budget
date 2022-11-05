<?php 
session_start();
include '../sharedlibs/session_check.php';
include '../sharedlibs/DBMS.class.php';

$db = new DBMS();

$db->do_query("SELECT customers.customer_id, CONCAT(customers.first_name, ' ', customers.last_name) AS name, customers.gender, customers.email, customers.phone_number, physical_addresses.town, physical_addresses.area
FROM customers
INNER JOIN physical_addresses ON customers.customer_id = physical_addresses.customer_id
ORDER BY customers.first_name ASC");

if($db->db_query){
	$str = '<table cellpadding="0" cellspacing="0">
			<tr style="background-color:#D9D9D9; color:#585858; text-shadow:0px 1px 0px #FFF;"><th style="border-left:1px solid #5F5F5F;">Actions</th><th>Customer name</th><th>Gender</th><th>Email</th><th>Phone number</th><th>Town</th><th>Area</th></tr>';
	
	while(list($id, $name, $gender, $email, $phone, $town, $area) = mysqli_fetch_array($db->db_query)){
		$str .= '<tr><td><span class="action-delete" title="delete user" onclick="dropAcc('.$id.', \'user\')"></span></td><td>'.$name.'</td><td>'.$gender.'</td><td>'.$email.'</td><td>'.$phone.'</td><td>'.$town.'</td><td>'.$area.'</td></tr>';
	}
	$str .= '</table>';
	
	$result = array("success" => 1, "content" => $str);
	
	echo json_encode($result);
	exit();
}
else{
	echo "{\"success\":0}";
	exit();
}
?>