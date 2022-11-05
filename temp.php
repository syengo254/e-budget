<?php 
include "sharedlibs/config.php";
mysql_connect($DB_SERVER, $DB_USER, $DB_PASS);
mysql_select_db($DB_NAME);

$cat_q = "SELECT id, description FROM p_categories";
$car_res = mysql_query($cat_q);
$htm = "";

if($num = mysql_num_rows($car_res) > 0){
	while(list($cid, $cdes) = mysql_fetch_row($car_res)){
		$htm .= '<div class="cat-holder">
                	<div class="cat">
                    	<a href="task/product_feed.php?cat='.$cid.'">'.$cdes.'</a>
                    </div>
					<div class="subcat">';
		
		$sub_q = "SELECT id, description FROM p_subcategories WHERE category_id = ".$cid;
		$sub_res = mysql_query($sub_q);
		
		if($num2 = mysql_num_rows($sub_res) > 0){
			while(list($sid, $sdes) = mysql_fetch_row($sub_res)){
				$htm .= '<a href="task/product_feed.php?subcat='.$sid.'">'.$sdes.'</a>';
			}
		}
		$htm .= '</div>
                </div>';
	}
	echo $htm;
}
?>