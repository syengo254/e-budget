<?php 
session_start();
include '../sharedlibs/session_check.php';

$db = mysqli_connect("localhost", "root", "","e-budget");

$cids = array();
$sids = array();

$str = "SELECT DISTINCT cart_id FROM orders WHERE delivered = 'no'";
$query = mysqli_query($db, $str);
$htm = '<table cellpadding="0" cellspacing="0"><tr style="background-color:#D9D9D9; color:#585858; text-align:center; text-shadow:0px 1px 0px #FFF;"><tr><th style="font-weight:600; border:none;">ITEMS BOUGHT FROM:</th></tr>
<tr style="background-color:#D7D7D7; color:#585858; text-shadow:0px 1px 0px #FFF;">';

while(list($id) = mysqli_fetch_array($query)){
	$cids[] = $id;
}
for($i = 0; $i < sizeof($cids); $i ++){
	$str = "SELECT DISTINCT shopping_cart.store_id, stores.name FROM shopping_cart
	INNER JOIN stores ON shopping_cart.store_id = stores.id
	WHERE shopping_cart.id = '".$cids[$i]."'";
	$query = mysqli_query($db, $str);
	
	while(list($id, $name) = mysqli_fetch_array($query)){
		$htm .= '<th>'.$name.'</th>';
		$sids[] = $id;
	}
}
$htm .= '</tr>';
$htm .= '<tr>';
for($i = 0; $i < sizeof($sids); $i ++){
	$htm .= '<td>';
	for($j = 0; $j < sizeof($cids); $j ++){
		$str = 'SELECT products.description, products.quantity, shopping_cart.quantity FROM shopping_cart
		INNER JOIN products ON shopping_cart.product_id = products.id
		WHERE shopping_cart.store_id = '.$sids[$i].'
		AND shopping_cart.id = "'.$cids[$j].'"';
		
		$query = mysqli_query($db, $str);
		//$htm .= '<tr>';
		while(list($desc, $qty, $num) = mysqli_fetch_array($query)){
			$htm .= $desc.'('.$qty.') <<span style="color:green; font-weight:bold;">'.$num.' item(s)</span>>';
		}
		//$htm .= '</tr>';
	}
	$htm .= '</td>';
}
$htm .= '</tr>';
$htm .= '</table>';
echo json_encode(array("success" => 1, "content" => $htm));
exit();

/*$db = new DBMS();

$db->do_query("SELECT DISTINCT cart_id FROM orders WHERE delivered = 'no'");

$cids = array();
$sids = array();

while(list($id) = mysql_fetch_row($db->db_query)){
	$cids[] = $id;
}

$db->do_query("SELECT shopping_cart.store_id, stores.name FROM shopping_cart
INNER JOIN stores ON shopping_cart.store_id = stores.id
WHERE shopping_cart.checked = 'yes'");

$str = '<table cellpadding="0" cellspacing="0"><tr style="background-color:#D9D9D9; color:#585858; text-align:center; text-shadow:0px 1px 0px #FFF;"><td>ITEMS BOUGHT FROM:</td></tr>
    	<tr style="background-color:#D9D9D9; color:#585858; text-shadow:0px 1px 0px #FFF;">';
		
while(list($id, $name) = mysql_fetch_row($db->db_query)){
	$sids[] = $id;
	
	$str .= '<th>'.$name."</th>";
}
$str .= '</tr>';

for($i = 0; $i < sizeof($cids); $i ++){
	$db->do_query("SELECT products.description, products.quantity FROM shopping_cart
	INNER JOIN products ON shopping_cart.product_id = products.id
	WHERE shopping_cart.id = '".$cids[$i]."' AND shopping_cart.checked = 'yes' ");
	
	$res = $db->db_query;
	while(list($desc, $qty) = mysql_fetch_row($res)){
		$str .=
	}
}

echo json_encode(array("success" => 1, "content" => $str));
*/?>