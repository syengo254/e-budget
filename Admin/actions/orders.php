<?php 
session_start();
include '../sharedlibs/session_check.php';
include '../sharedlibs/DBMS.class.php';

$db = new DBMS();

$db->do_query("SELECT shopping_cart.id, orders.id, CONCAT( customers.first_name, ' ', customers.last_name ) , (payments.amount_paid + 200), orders.time_of_order, payments.confirmed
FROM shopping_cart
INNER JOIN customers ON shopping_cart.customer_id = customers.customer_id
INNER JOIN orders ON shopping_cart.id = orders.cart_id
INNER JOIN payments ON orders.id = payments.order_id
WHERE payments.confirmed = 'YES'
ORDER BY customers.first_name ASC");

if($db->db_query){
	if($num = mysql_num_rows($db->db_query) > 0){
	$str = '<table cellpadding="0" cellspacing="0">
    	<tr style="background-color:#D9D9D9; color:#585858; text-shadow:0px 1px 0px #FFF;"><th style="border-left:1px solid #5F5F5F;">Action</th><th>Order Number</th><th>Customer</th><th>Order cost</th><th>Time of order</th><th>Paid for</th></tr>';
		
	while(list($sid, $id, $cust, $cost, $time, $status) = mysql_fetch_row($db->db_query)){
		$str .= '<tr><td><span class="action-delete" title="delete order" onclick="dropAcc('.$id.')"></span></td><td><a href="#" onclick="viewContents(event, \''.$sid.'\')" title="click to view contents">'.$id.'</a></td><td>'.$cust.'</td><td>'.$cost.'</td><td>'.$time.'</td><td>'.$status.'</td></tr>';
	}
	$str .= '</table>';
	
	$result = array("success" => 1, "content" => $str);
	
	echo json_encode($result);
	exit();
	}
	else{
		echo '{"success":-1}';
		exit();
	}
}
else{
	echo "{\"success\":0}";
	exit();
}

?>