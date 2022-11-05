<?php 
//THIS SCRIPT SHOWS THE USER'S SHOPPING CART CONTENTS AND EDITIONS ON ITEMS CAN BE MADE.
if(!(isset($sess))) session_start();
require_once("../sharedlibs/session_validator.php");
include "../sharedlibs/DBMS.class.php";

$db = new DBMS();
$cid = $_SESSION["id"];
$cart_id = isset($_SESSION["cart_id"]) == true ? $_SESSION["cart_id"] : 0;
$_SESSION["cart_id"] = $cart_id;
$html = "";

$db->do_query("SELECT shopping_cart.product_id, products.description, stores.name, products.quantity, shopping_cart.quantity, shopping_cart.price_per_item, shopping_cart.amount_payable FROM shopping_cart
INNER JOIN products ON shopping_cart.product_id = products.id
INNER JOIN stores ON shopping_cart.store_id = stores.id
WHERE shopping_cart.customer_id = ".$cid." AND shopping_cart.checked = 'no'");

if($num = mysqli_num_rows($db->db_query) > 0){
	$html .= '<div id="t-hold">
    <table cellpadding="0" cellspacing="0">
    	<tr style="background-color:#D9D9D9; color:#585858; text-shadow:0px 1px 0px #FFF;"><th style="border-left:1px solid #5F5F5F;">Actions</th><th>Item name</th><th>Bought from</th><th>Quantity</th><th>Items bought</th><th>Item Price</th><th>Total Price</th></tr>';
	while(list($id, $item, $store, $qty, $numitems, $price, $total) = mysqli_fetch_array($db->db_query)){
		$html .= '<tr><td><span class="action-delete" title="delete from cart" onclick="editCart('.$id.', 0)"></span><span class="action-add" title="add items" onclick="editCart('.$id.', 1)"></span><span class="action-minus" title="reduce items" onclick="editCart('.$id.', 2)"></span></td><td>'.$item.'</td><td>'.$store.'</td><td>'.$qty.'</td><td>'.$numitems.'</td><td>'.number_format($price, 2).'</td><td>'.number_format($total, 2).'</td></tr>';
	}
	
	$db->do_query("SELECT SUM(amount_payable) FROM shopping_cart WHERE shopping_cart.customer_id = ".$cid." AND shopping_cart.checked = 'no'");
	
	$sum;
	list($sum) = mysqli_fetch_array($db->db_query);
	
	$html .= '<tr class="last"><td></td><td></td><td></td><td style="border-left:1px solid #C3C3C3;">TOTALS</td><td></td><td></td><td style="border-left:1px solid #C3C3C3;">'.number_format($sum, 2).'</td></tr>
	<tr class="last"><td></td><td></td><td></td><td style="border-left:1px solid #C3C3C3; color:orange;">DELIVERY FEE</td><td></td><td></td><td style="border-left:1px solid #C3C3C3; color:orange;">200</td></tr>
	<tr class="last"><td></td><td></td><td></td><td style="border-left:1px solid #C3C3C3;">NET TOTAL</td><td></td><td></td><td style="border-left:1px solid #C3C3C3;">'.number_format($sum + 200, 2).'</td></tr>
    </table>
</div>';
	$_SESSION["total_cost"] = $sum + 200;
	
	echo $html;
}
else{
	die("<span style='position:relative; top:20px; left:100px;'>Dear customer, your cart is empty. Please go to the <a href='../catalogviewer.php'>catalogs page</a> to buy items or go to <a href='../customer_home.php'>HOME</a>.<br /> If you checked out earlier then your cart items won't be editable.</span>");
}
?>