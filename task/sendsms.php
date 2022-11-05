<?php 
session_start();

include '../sharedlibs/DBMS.class.php';
$code;
$cid = $_SESSION["id"];
$user = $_POST["val"];

$str = "a b c d e f g h i j k l m n o p q r s t u v w x y z A B C D E F G H I J K L M N O P Q R S T U V W X Y Z 0 1 2 3 4 5 6 7 8 9 ' ? #";

$letters = substr($str,0,103);
$nums = substr($str,104,20);
$marks = substr($str,123,6);

function gen_num($num){
	$temp = explode(" ", $num);
	$c1 = $temp[rand(1, 3)];
	$c2 = $temp[rand(3, 7)];
	$c3 = $temp[rand(4, 10)];
	$c4 = $temp[rand(1, 6)];
	$c5 = $temp[rand(1, 10)];
	$c6 = $temp[rand(0, 8)];
	
	return $c1.$c2.$c3.$c4.$c5.$c6;
}

$code = gen_num($nums);

send($code, $cid);

function send($smscode, $cust_id=NULL){
	$db = new DBMS();
	if($user = "customer"){
		$db->do_query("INSERT INTO smscodes (id, customer_id, code, send) VALUES (NULL, '".$cust_id."', '".$smscode."', 'NO')");
	}
	else{
		$db->do_query("INSERT INTO smscodes (id, store_id, code, send) VALUES (NULL, '".$cust_id."', '".$smscode."', 'NO')");
	}
	if($db->db_query){		
		exit();
	}
	else{
		send($smscode);
	}
}
?>