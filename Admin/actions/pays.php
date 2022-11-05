<?php 
session_start();
include '../sharedlibs/session_check.php';
include '../sharedlibs/DBMS.class.php';

$db = new DBMS();

$db->do_query("SELECT * FROM payments ORDER BY time_paid DESC");

if($db->db_query){
	$str = '<table cellpadding="0" cellspacing="0">
    	<tr style="background-color:#D9D9D9; color:#585858; text-shadow:0px 1px 0px #FFF;"><th style="border-left:1px solid #5F5F5F;">Action</th><th>Transaction Code</th><th>Payer name</th><th>Payer number</th><th>Amount</th><th>Time paid</th><th>Order</th><th>STATUS</th></tr>';
		
	while(list($id, $trans, $name, $phone, $amt, $time, $order, $state) = mysqli_fetch_row($db->db_query)){
		$str .= '<tr><td><span class="action-delete" title="delete payment" onclick="dropAcc('.$id.', \'pays\')"></span></td><td>'.$trans.'</td><td>'.$name.'</td><td>'.$phone.'</td><td><b>'.$amt.'</b></td><td>'.$time.'</td><td>'.$order.'</td><td><b>'.$state.'</b></td></tr>';
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