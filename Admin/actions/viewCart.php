<?php 
session_start();
include '../sharedlibs/session_check.php';

if($_GET['set'] == 1){
	include '../sharedlibs/DBMS.class.php';
	
	$db = new DBMS();
	$cid = $_POST["id"];
	
	$db->do_query("SELECT products.description, stores.name, shopping_cart.quantity, shopping_cart.amount_payable
	FROM shopping_cart
	INNER JOIN products ON shopping_cart.product_id = products.id
	INNER JOIN stores ON shopping_cart.store_id = stores.id
	WHERE shopping_cart.id = '".$cid."' AND shopping_cart.checked = 'yes'");
	
	if($db->db_query){
		if($num = mysqli_num_rows($db->db_query) > 0){
			$str = '<table cellpadding="0" cellspacing="0">
				<tr style="background-color:#D9D9D9; color:#585858; text-shadow:0px 1px 0px #FFF;"><th>Product name</th><th>Store name</th><th>Items bought</th><th>Total cost</th></tr>';
			while(list($desc, $name, $qty, $amt) = mysqli_fetch_row($db->db_query)){
				$str .= '<tr><td>'.$desc.'</td><td>'.$name.'</td><td>'.$qty.'</td><td>'.$amt.'</td></tr>';
			}
			$str .= '</table>';
			$_SESSION["htm"] = $str;
			
			echo '{"success":1}';
			exit();
		}
		else{
			echo '{"success":-1}';
			exit();
		}
	}
	else{
		echo '{"success":0}';
		exit();
	}
}
else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../styles/carttablestyle.css"/>
<title>Viewing cartcontents</title>
</head>
<body>
<span style='position:relative; display:block; width:inherit; text-align:center; top: 10px; margin-bottom:10px; font-family:\"Trebuchet MS\", Arial, Helvetica, sans-serif; color:blue; font-weight:600;'>This are the cart contents for order:</span>
<?php 
echo $_SESSION["htm"];
unset($_SESSION["htm"]);
}
?>
</body>
</html>