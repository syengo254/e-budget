<?php 
session_start();
require_once("../sharedlibs/session_validator.php");
include "../sharedlibs/DBMS.class.php";
$sid = $_SESSION["id"];
if(!isset($_POST["row"])){
?>
    <div id="hold">
    <div id="edit-form">
    	<div class="v-close" onclick="updatefrmClose();"></div>
        <span style="color:#00f; display:block; height:20px; width:300px; margin:5px auto;">Enter the new values below:</span>
        <form method="post" action="task/editProduct.php">
            <div><label for="e_desc">Enter new description: </label><input type="text" id="e_desc"/></div>
            <div><label for="e_qty">Enter new quantity: </label><input type="text" id="e_qty" style="width:125px"/></div>
            <div><label for="e_price">Enter new price [KShs]: </label><input type="text" id="e_price" style="width:120px;"/></div>
            <div><input type="hidden" value="" id="p_id" /></div>
        </form>
        <form name="updt" method="post" enctype="multipart/form-data" target="uppic" action="task/editProduct.php?pic=1">
        	<div><label for="e_pic">Select new caption: </label><input type="file" name="pimg" id="e_pic"/></div>
            <input type="hidden" name="upload" id="upload" value="1" />
        </form>
        
        <div id="resp" style="position:relative; top:3px; visibility:hidden;"><img src="images/loading.gif" width="24" height="24" style="position:relative; top:7px;" /> uploading...</div>
        
        <a class="submit" href="#" style="margin:0 auto; top:10px;" onclick="sendDetails(event);">update</a>
        
        <iframe name="uppic" src="#" style="visibility:hidden; width:0px; height:0px;"></iframe>
    </div>
    <?php 
}
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
        	<div class="vprod-head">'.$desc2.' ('.$qty.')</div>
            <div class="vprod-pic">
            	<img src="'.$image.'" />
            </div>
            <div class="vprod-price">
            Price: <span style="color:#FF0;">'.number_format($price, 2).'/=</span>
            <a class="edit" href="#" onclick="editProduct(event, \'product'.$div.'\', '.$id.', \''.$desc.'\', \''.$qty.'\',\''.$price.'\');">edit</a>
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