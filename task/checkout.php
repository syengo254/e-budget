<?php 
session_start();
$sess = true;
require_once("../sharedlibs/session_validator.php");
if(!(isset($_SESSION["access_c"]))){
	echo "You are not allowed to view this page.";
	exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../styles/common.css" media="screen" type="text/css" />
<link rel="stylesheet" type="text/css" href="../styles/carttablestyle.css"/>
<link rel="stylesheet" type="text/css" href="../styles/form-elements.css"/>
<link REL="SHORTCUT ICON" HREF="../images/site_icon.png">
<script type="text/javascript" src="../scripts/jQuery.js"></script>
<script type="text/javascript" src="../scripts/checkout.js"></script>
<title>E-budget.com: CheckOut[<?php echo $_SESSION["name"]; ?>]</title>
</head>
<body>
<div id="cont" style="width:1100px;">
	<div id="header">
    	<div>
        <ul id="top-nav">
            <li><a href="../logout.php">Logout</a></li>
            <li><img class="dias" src="../images/diamond.png" /></li>
            <li><a href="../contact.php">Contact Us</a></li>
            <li><img class="dias" src="../images/diamond.png" /></li>
            <li><a href="#">Checkout</a></li>
            <li><img class="dias" src="../images/diamond.png" /></li>
            <li><a href="">Shopping Cart: Viewing</a></li>
        </ul></div>
        <div>
        <ul id="like_btns">
            <li><a href="http://www.facebook.com/e-budget/"><img src="../images/facebook_icon.png" /></a></li>
            <li><a href="http://www.twitter.com/@e-budget"><img src="../images/twittericon.png" /></a></li>
            <li><a href="http://www.feeds.com/news/e-budget"><img src="../images/RSS-Feed-icon.png" /></a></li>
            <li><form method="get" action="task/search.php"><input type="text" name="search" /><input style="position:absolute; width:20px; height:22px; top:4px; right:16px;" type="image" src="../images/search.png" alt="search"/></form></li>
        </ul></div>
    </div><!--end header div-->
    <div id="content">
    	<div id="menu">
        <ul id="nav">
        	<li><a href="../customer_home.php">Home</a></li>
            <li><img class="kaboda" src="../images/menu_border.png" /></li>
            <li><a href="../catalogviewer.php">Catalog</a></li>
            <li><img class="kaboda" src="../images/menu_border.png" /></li>
            <li><a href="../services.php">Services</a></li>
            <li><img class="kaboda" src="../images/menu_border.png" /></li>
            <li><a href="../featured.php">Featured</a></li>
            <li><img class="kaboda" src="../images/menu_border.png" /></li>
            <li><a href="../support.php">Support</a></li>
        </ul>
        </div><!--end menu div-->
        <div id="content-body" style="width:1061px;">
        	<div id="trace"></div>
            <span style="position:relative; top:10px; display:block; width:980px; color:blue; font-size:20px; margin:0 auto; text-align:center;">You are 'Checking Out' and these are your cart item(s). Click the proceed button below the displayed cart to make payment.</span>
            <div style="display:block; margin-bottom:50px;">
            <?php include "ViewCart.php";?>
            </div>
            <a class="button" style="margin:0 auto;" href="payprocess.php">proceed</a>
        </div>
    </div><!--end content div-->
    <?php include "../sharedlibs/common_footer.php";?>
</div><!--end cont div-->
</body>
</html>