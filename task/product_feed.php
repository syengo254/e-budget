<?php 
include "../sharedlibs/DBMS.class.php";
//set defaults.
$mode = "view";
$view_as = "all";
$current_row = 0;

//IF ACTION IS SPECIFIED REDIRECT TO SPEFIC PAGE.
if(isset($_POST["action"])){
	$action = $_POST["action"];
	$row = $_POST["row"];
	$cat = $_GET["cat"];
	$subcat = $_GET["subcat"];
	
	$url = "custom_product_feed.php?action=".$action."&cat=".$cat."&subcat=".$subcat."&row=".$row;
	
	header("Location: $url");
}

if(isset($_POST["row"])){
	$current_row = $_POST["row"];
}

$num_rows = 12;
$limit = $current_row + $num_rows;
$html = '';
$success = 0;
$db = new DBMS();

if($mode == "view"){
	//do for view.
	if($view_as == "all"){
		$db->do_query("SELECT products.id as id, products.description, p_categories.description as category, p_subcategories.description as subcategory, products.quantity, stores.name, stores.id as sid, stores.logo, products.image, prices.price
	FROM products
	INNER JOIN p_categories ON products.category_id = p_categories.id
	INNER JOIN p_subcategories ON products.subcategory_id = p_subcategories.id
	INNER JOIN stores ON products.store_id = stores.id
	INNER JOIN prices ON prices.product_id = products.id
	ORDER BY id ASC
	LIMIT ".$current_row.", ".$limit);
		
		$str = '<div class="row-breaker">';
		$i = 0;
		$div = 0;
		if($num = mysqli_num_rows($db->db_query) < 1) { echo "{\"success\":1, \"content\":\"EOF\"}"; exit();}
		while(list($id, $desc, $cat, $subcat, $quantity, $store, $store_id, $store_img, $image, $cost) = mysqli_fetch_row($db->db_query)){
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
		
		$success = 1;
		$html = $str."</div>";
		$response = array("success" => $success, "content" => $html);
		echo json_encode($response);
		//echo $html;
		exit();
	}// end if view and all
	else{
		//will be added later.
	}
}// end if view
else if($mode == "edit" && ($_SESSION["access_s"] == true)){
	
}// end if edit
else{
	echo "Please specify view mode in post data.";
} // end if no mode specified

?>