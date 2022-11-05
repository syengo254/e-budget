<?php 
session_start();

include "sharedlibs/config.php";
$db = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASS, $DB_NAME);

$logged = false;
$supp = false;
$cust=0;

if(isset($_SESSION["access_c"])){
	$logged = true;
	$cust = $_SESSION["id"];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link REL="SHORTCUT ICON" HREF="images/site_icon.png">
<link rel="stylesheet" type="text/css" href="styles/cviewer.css"/>
<script type="text/javascript" src="scripts/jQuery.js"></script>
<script type="text/javascript" src="scripts/cviewer.js"></script>
<script type="text/javascript" src="scripts/jquery.hotkeys-0.7.9.js"></script>
<title>E-budget.com: View Products</title>
</head>
<body>
<?php 
if($logged){
	echo '<input type="hidden" value="TRUE" id="logged" />';
}
else if(isset($_SESSION["access_s"])){
	echo '<input type="hidden" value="SUPP" id="logged" />';
	$supp = true;
}
else{
	echo '<input type="hidden" value="FALSE" id="logged" />';
}
?>
    <div id="cont">
    <div id="trace"></div>
    	<div id="header">
        	<ul id="nav">
           		<li><?php
				 if(!$logged && !$supp){echo '<a href="login.php">Not Logged In';}else{echo '<a style="width:250px;" href="logout.php">&nbsp;('.$_SESSION["name"].') Logout';} 
				 ?></a></li>
                <li><a href="task/checkout.php">Checkout</a></li>
                <li>
                	<a href="#" onmouseover="mopen('m1')" onmouseout="mclosetime()" onclick="showByStore(event, null);">View by Store</a>
                    <div id="m1" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
                    	<?php 
						$str = "SELECT id, name FROM stores ORDER BY name ASC";
						$run = mysqli_query($db, $str);
						
						if($run) while(list($id, $name) = mysqli_fetch_array($run, MYSQLI_NUM)){
							echo '<a onclick="showByStore(event, '.$id.')" href="#">'.$name.'</a>';
						}
						?>
                	</div>
                </li>
                <li><a href="task/checkout.php">My Shopping History</a></li>
                <li><a style="width:180px;" id="cart" href="task/checkout.php">Shopping Cart (<?php
				$open = mysqli_query($db, "SELECT quantity FROM shopping_cart WHERE customer_id = '".$cust."' AND checked = 'no'");
	
				$arr = array();
				$total = 0;
				while(list($num) = mysqli_fetch_array($open)){
					$total += $num;
				}
				$arr["success"] = 1;
				$arr["num_items"] = $total;
				echo $total;
				?>)</a></li>
                <li><a style="width:120px;" href="<?php 
				if($supp){
					echo 'supplier_home.php';
				}
				else{
					echo 'customer_home.php';
				}
				?>">Go Home</a></li>
        	</ul>
            <div id="search">
            	<form action="task/search.php" method="get">
                <input type="text" name="search" style="height:26px; width:230px; padding-left:5px; border:2px solid #3d5cff;box-sizing:border-box;" />
                <input type="image" src="images/search2.png" style="position:relative; top:9px; left:-36px;" />
                </form>
            </div>
            <div id="show" style="position:relative; left:600px; top:35px; display:block; visibility:hidden;"><input type="button" value="show all products" onclick="showAll();" /></div>
        </div>
        <div id="content">
            <div id="left">
            <?php 
			//setup left pane.
			$cat_q = "SELECT id, description FROM p_categories";
$car_res = mysqli_query($db, $cat_q);
$htm = "";

if($num = mysqli_num_rows($car_res) > 0){
	while(list($cid, $cdes) = mysqli_fetch_array($car_res, MYSQLI_NUM)){
		$htm .= '<div class="cat-holder">
                	<div class="cat">
                    	<a href="task/product_feed.php?cat='.$cid.'" onclick="getSpecific(event)">'.$cdes.'</a>
                    </div>
					<div class="subcat">';
		
		$sub_q = "SELECT id, description FROM p_subcategories WHERE category_id = ".$cid;
		$sub_res = mysqli_query($db, $sub_q);
		
		if($num2 = mysqli_num_rows($sub_res) > 0){
			while(list($sid, $sdes) = mysqli_fetch_array($sub_res)){
				$htm .= '<a href="task/product_feed.php?subcat='.$sid.'" onclick="getSpecific(event)">'.$sdes.'</a>';
			}
		}
		$htm .= '</div>
                </div>';
	}
	echo $htm;
}
			
			?>
                <!--<div class="cat-holder">
                	<div class="cat">
                    	<a href="#">Toiletry</a>
                    </div>
                    <div class="subcat">
                    	<a href="#">Soaps and Detergents</a>
                        <a href="#">Toothpastes</a>
                        <a href="#">Bathroom Stuff</a>
                        <a href="#">Shavers & creams</a>
                    </div>
                </div>-->
            </div>
            <div id="right">
            	<div id="quantity">Please specify your quantity:[1,2,3,etc]<input type="text" id="qty" style="position:relative; font-size:16px; top:5px; height:25px; margin:0 auto; display:block; width:60px; margin-bottom:10px;" /><input type="button" value="cancel" onclick="cancelQty()" style="position:relative; top:5px; height:25px; float:left; display:block;" /><input type="button" value="ok" onclick="setQuantity()" style="position:relative; top:5px; height:25px; float:right; display:block; width:60px;" /></div>
                <div id="head" style="display:none;">
                Products
                </div>                
            </div>
        </div>
    </div>
</body>
</html>