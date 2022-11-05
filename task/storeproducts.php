<?php 
include "../sharedlibs/DBMS.class.php";

$db = new DBMS();
$store_id = $_POST["id"];

$str = "SELECT products.id as id, products.description, p_categories.description as category, p_subcategories.description as subcategory, products.quantity, stores.name, stores.id as sid, stores.logo, products.image, prices.price
	FROM products
	INNER JOIN p_categories ON products.category_id = p_categories.id
	INNER JOIN p_subcategories ON products.subcategory_id = p_subcategories.id
	INNER JOIN stores ON products.store_id = stores.id
	INNER JOIN prices ON products.id = prices.product_id
	WHERE products.store_id = ".$store_id."
	ORDER BY id ASC";
$str2 = "SELECT name FROM stores WHERE id = ".$store_id;
	
$db->do_query($str);

$str = '<div class="row-breaker">';
$i = 0;
$div = 0;
if($num = mysqli_num_rows($db->db_query) < 1) { echo "{\"success\":1, \"content\":\"EOF\"}"; exit();}

while(list($id, $desc, $cat, $subcat, $quantity, $store, $store_id, $store_img, $image, $cost) = mysqli_fetch_array($db->db_query)){
	$i++;
	$desc2 = substr($desc, 0,16)."...";
	$str .= '<div class="item_holder" id="product'.$div.'">
	<div class="item_title" title="'.$desc.'"><span style="position:relative; top:3px;">'.$desc2.' '.$quantity.'</span></div>
	<div class="pic">
		<img class="store_img" src="'.$store_img.'" alt="'.$store.'" title="'.$store.'">
		<img src="'.$image.'" alt="'.$desc2.'" width="187" height="160" onclick="showDetails(event,\''.$cat.'\',\''.$subcat.'\', \''.$image.'\', \''.$store_img.'\', \''.$cost.'\', \''.$quantity.'\', \''.$desc.'\','.$id.', '.$store_id.');"/>
	</div>
	<div class="p_tag">
		<div class="left">Price: <span style="color:#FFFF00;">'.number_format($cost, 2).'/=</span></div>
		<div class="right"><a class="button" onclick="addToCart(event, '.$id.', '.$store_id.', false)" href="#"><span style="position:relative; top:2px;">BUY</span></a></div>
	</div>
</div>';
	if($i == 4){
		$i = 0;
		$str .= '</div><div class="row-breaker">';
	}
	$div++;
}// end while row

$db->do_query($str2);
list($name) = mysqli_fetch_array($db->db_query);

$success = 1;
$html = $str."</div>";
$response = array("success" => $success, "content" => $html, "store" => $name);
echo json_encode($response);
//echo $html;
exit();
?>