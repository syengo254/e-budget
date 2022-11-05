<?php 
session_start();
include '../sharedlibs/session_check.php';
include '../sharedlibs/DBMS.class.php';

$db = new DBMS();
$str = '';
$db->do_query("SELECT CONCAT( customers.first_name, ' ', customers.last_name ) , orders.id, physical_addresses.town, physical_addresses.area, physical_addresses.street_estate, physical_addresses.plot_no_name, physical_addresses.door_no, physical_addresses.add_details
FROM customers, orders, physical_addresses, shopping_cart
WHERE shopping_cart.customer_id = customers.customer_id
AND customers.customer_id = physical_addresses.customer_id
AND orders.delivered = 'NO'");

if($num = mysqli_num_rows($db->db_query) > 0){
	$str .= '<table cellpadding="0" cellspacing="0">
				<tr style="background-color:#D9D9D9; color:#585858; text-shadow:0px 1px 0px #FFF;"><th>Customer</th><th>Order ID</th><th>Address Location</th><th>Delivered (tick)</th></tr>';
	while(list($name, $oid, $town, $area, $street, $plot, $door, $add) = mysqli_fetch_row($db->db_query)){
		$str .= '<tr><td>'.$name.'</td><td>'.$oid.'</td><td><b>town:</b>'.$town.'<br /><b>area:</b>'.$area.'<br /><b>street/estate:</b>'.$street.'<br /><b>plot:</b>'.$plot.'<br /><b>door:</b>'.$door.'<br /><b>info:</b>'.$add.'</td></tr>';
	}
	$str .= '</table>';
}
else{
	$str = 'NO orders have been made or ALL orders have been DELIVERED.';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="../styles/carttablestyle.css"/>
<link rel="stylesheet" type="text/css" href="../styles/form-elements.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Order Addresses</title>
</head>
<body>
<a class="button" href="#" onclick='document.getElementsByClassName("button").item(0).style.visibility = "hidden"; window.print(); return false;'>print</a>
<span style='position:relative; display:block; width:inherit; text-align:center; top: 10px; margin-bottom:10px; font-family:\"Trebuchet MS\", Arial, Helvetica, sans-serif; color:blue; font-weight:600;'>These are the addresses where orders will delivered at:</span>
<?php echo $str; ?>
</body>
</html>