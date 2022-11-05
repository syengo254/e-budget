<?php 
if(isset($_SESSION["access_c"])){
	if(!(isset($db))){
		require_once "DBMS.class.php";
		$db1 = new DBMS();
	}
	$cid = $_SESSION["id"];
	$db1->do_query("SELECT COUNT(id) FROM shopping_cart WHERE shopping_cart.customer_id = ".$cid." AND checked ='no'");
	list($nums) = mysqli_fetch_array($db1->db_query);
	echo "<a href='http://localhost/e-budget.com/task/checkout.php'>Shopping Cart: ".$nums." item(s)</a>";
	$db1 = NULL;
	unset($db1);
}
else{
	echo '<a href="http://localhost/e-budget.com/task/checkout.php">Shopping Cart:empty</a>';
}
?>