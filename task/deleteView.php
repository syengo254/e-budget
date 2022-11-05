<?php 
session_start();
require_once("../sharedlibs/session_validator.php");
include "../sharedlibs/DBMS.class.php";
$sid = $_SESSION["id"];
?>
<div id="hold">
    <?php 
	$db = new DBMS();
	$db->do_query("SELECT products.id AS id, products.description, products.quantity, products.image, prices.price
FROM products
INNER JOIN stores ON products.store_id = stores.id
INNER JOIN prices ON products.id = prices.product_id
WHERE stores.id = ".$sid."
ORDER BY id ASC
LIMIT 0, 20
");
	$str = '<div class="row-breaker">';
	$i = 0;
	$div = 0;
	if($num = mysqli_num_rows($db->db_query) > 0){
		while(list($id, $desc, $qty, $image, $price) = mysqli_fetch_array($db->db_query)){
			$i++;
			$desc2 = substr($desc, 0,16)."...";
			
			$str .= '<div class="vprod-hold" id="product'.$div.'">
        	<div class="v-close" onclick="deleteProduct('.$id.', \'#product'.$div.'\', \''.$desc.'\');"></div>
        	<div class="vprod-head">'.$desc2.' ('.$qty.')</div>
            <div class="vprod-pic">
            	<img src="'.$image.'" />
            </div>
            <div class="vprod-price">
            Price: <span style="color:#FF0;">'.$price.'.00/=</span>
            <a class="edit" href="#" onclick="editProduct(event, \'#product'.$div.'\', '.$id.', \''.$desc.'\', \''.$qty.'\',\''.$price.'\');">edit</a>
            </div>
        </div>';
			
			if($i == 4){
				$i = 0;
				$str .= '</div><div class="row-breaker">';
			}
			$div++;
		}
		echo $str."</div>";
	}
	else{
		echo "You have no products uploaded yet.";
	}
	?>
    </div>
