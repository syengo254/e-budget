<?php 
session_start();
include '../sharedlibs/session_check.php';
include '../sharedlibs/DBMS.class.php';

$db = new DBMS();

$db->do_query("SELECT id, name, logo, phone, email FROM stores ORDER BY name ASC");

if($db->db_query){
	$str = '<table cellpadding="0" cellspacing="0">
    	<tr style="background-color:#D9D9D9; color:#585858; text-shadow:0px 1px 0px #FFF;"><th style="border-left:1px solid #5F5F5F;">Actions</th><th>Store name</th><th>Store logo</th><th>Email</th><th>Phone number</th></tr>';
		
	while(list($id, $name, $logo, $phone, $email) = mysqli_fetch_array($db->db_query)){
		$str .= '<tr><td><span class="action-delete" title="delete store" onclick="dropAcc('.$id.', \'supp\')"></span></td><td>'.$name.'</td><td><img src="../'.$logo.'" width="100" height="35"/></td><td>'.$phone.'</td><td>'.$email.'</td></tr>';
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