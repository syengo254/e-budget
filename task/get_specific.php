<?php
include "../sharedlibs/DBMS.class.php";

$db = new DBMS();
$criteria = "";
if(isset($_GET["cat"])){
	$cat = $_GET["cat"];
	$row = $_GET["row"];
	$criteria = "SELECT products.id as id, products.description, p_categories.description as category, p_subcategories.description as subcategory, products.quantity, stores.name, stores.id as sid, stores.logo, products.image, prices.price
	FROM products
	INNER JOIN p_categories ON products.category_id = p_categories.id
	INNER JOIN p_subcategories ON products.subcategory_id = p_subcategories.id
	INNER JOIN stores ON products.store_id = stores.id
	INNER JOIN prices ON products.id = prices.product_id
	WHERE products.category_id = ".$cat."
	ORDER BY id ASC
	LIMIT ".$row.", ".($row + 12);
}
else if(isset($_GET["subcat"])){
	$cat = $_GET["subcat"];
	$row = $_GET["row"];
	$criteria = "SELECT products.id as id, products.description, p_categories.description as category, p_subcategories.description as subcategory, products.quantity, stores.name, stores.id as sid, stores.logo, products.image, prices.price
	FROM products
	INNER JOIN p_categories ON products.category_id = p_categories.id
	INNER JOIN p_subcategories ON products.subcategory_id = p_subcategories.id
	INNER JOIN stores ON products.store_id = stores.id
	INNER JOIN prices ON products.id = prices.product_id
	WHERE products.subcategory_id = ".$cat."
	ORDER BY id ASC
	LIMIT ".$row.", ".($row + 12);
}

$db->do_query($criteria);
if($num = mysqli_num_rows($db->db_query) > 0){
	$str = '<div class="row-breaker">';
	$i = 0;
	$div = 0;
	while(list($id, $desc, $cat, $subcat, $quantity, $store, $store_id, $store_img, $image, $cost) = mysqli_fetch_array($db->db_query)){
		$i++;
		$desc2 = substr($desc, 0,16)."...";
		$str .= '<div class="item_holder" id="product'.$div.'">
		<div class="item_title" title="'.$desc.'"><span style="position:relative; top:3px;">'.$desc2.' '.$quantity.'</span></div>
		<div class="pic">
			<img class="store_img" src="'.$store_img.'" alt="'.$store.'" title="'.$store.'">
			<img src="'.$image.'" style="display:block;" alt="'.$desc2.'" width="187" height="160" onclick="showDetails(event,\''.$cat.'\',\''.$subcat.'\', \''.$image.'\', \''.$store_img.'\', \''.$cost.'\', \''.$quantity.'\', \''.$desc.'\','.$id.', \''.$store.'\');"/>
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
	}// end while
	
	$success = 1;
	$html = $str."</div>";
	$response = array("success" => $success, "html" => $html);
	echo json_encode($response);
	//echo $html;
	exit();
}
{
	echo '{"success":0, "reason":"EOF"}';
}
?>