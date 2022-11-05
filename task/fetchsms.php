<?php
session_start(); 
include '../sharedlibs/DBMS.class.php';

$db = new DBMS();
$db->do_query("SELECT customers.phone_number, stores.phone, code
FROM smscodes LEFT JOIN customers
ON smscodes.customer_id = customers.customer_id
LEFT JOIN stores
ON smscodes.store_id = stores.id
WHERE smscodes.send = 'NO'");
$num = mysql_num_rows($db->db_query);
$res = $db->db_query;

$str = "THANK YOU FOR REGISTERING WITH E-BUDGET.COM. TO COMPLETE YOUR REGISTRATION PLEASE PROVIDE THIS CODE: ";
$dyn = '{
        "payload": {
        "task": "send",
        "secret": "1234",
        "messages": [';

if($num > 0){
	$first = true;
	while(list($cust_phone, $store_phone, $code) = mysql_fetch_array($res)){
		$phone;
		if($cust_phone != NULL){
			$phone = $cust_phone;
		}
		else{
			$phone = $store_phone;
		}
		if($first){
			$dyn .= '{
			"to": "'.$phone.'",
			"message": "'.$str.$code.' THIS CODE EXPIRES IN 10 MINUTES. HAVE A NICE TIME.'.'"
			}';
			$first = false;
		}
		else{
			$dyn .= ',{
			"to": "'.$phone.'",
			"message": "'.$str.$code.' Have a nice time.'.'"
			}';
		}
		$db->do_query("UPDATE smscodes SET send = 'YES' WHERE code = '".$code."'");
	}
	$dyn .= ']
        }
        }';
	//$db->do_query("DELETE FROM smscodes"); it is commented out becoz it's buggy.
	
	echo $dyn;
}
?>