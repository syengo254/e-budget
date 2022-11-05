<?php 
session_start();
require_once("sharedlibs/session_validator.php");
if(!(isset($_GET["user"]))){
	exit();
}
include "editProfile.php";
$HTM = '';
if($_GET["user"] == "002"){
	$HTM = showCustomerProfile();	
}
else{
	$HTM = showStoreProfile();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="styles/common.css" media="screen" type="text/css" />
<link REL="SHORTCUT ICON" HREF="images/site_icon.png">
<link rel="stylesheet" type="text/css" href="styles/profile.css"/>
<script type="text/javascript" src="scripts/jQuery.js"></script>
<?php 
if(isset($_SESSION["access_c"])){
	echo '<script type="text/javascript" src="scripts/cprof.js"></script>';
}
else if(isset($_SESSION["access_s"])){
	echo '<script type="text/javascript" src="scripts/sprof.js"></script>';
}
?>
<title>E-budget.com: <?php echo $_SESSION["name"]; ?></title>
</head>
<body>
<div id="cont">
	<div id="header">
    	<div>
        <ul id="top-nav">
            <li><a href="logout.php">Logout</a></li>
            <li><img class="dias" src="images/diamond.png" /></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><img class="dias" src="images/diamond.png" /></li>
            <li><a href="task/checkout.php">Checkout</a></li>
            <li><img style="visibility:hidden;" class="dias" src="images/diamond.png" /></li>
            <li><a style="visibility:hidden;" href="">Shopping Cart:empty</a></li>
        </ul></div>
        <div>
        <ul id="like_btns">
            <li><a href="http://www.facebook.com/e-budget/"><img src="images/facebook_icon.png" /></a></li>
            <li><a href="http://www.twitter.com/@e-budget"><img src="images/twittericon.png" /></a></li>
            <li><a href="http://www.feeds.com/news/e-budget"><img src="images/RSS-Feed-icon.png" /></a></li>
            <li><form method="get" action="task/search.php"><input type="text" name="search" /><input style="position:absolute; width:20px; height:22px; top:4px; right:11px;" type="image" src="images/search.png" alt="search"/></form></li>
        </ul></div>
    </div><!--end header div-->
    <div id="content" style="height:705px;">
    	<div id="menu">
        <ul id="nav">
        	<li><a href="index.php">Home</a></li>
            <li><img class="kaboda" src="images/menu_border.png" /></li>
            <li><a href="catalogviewer.php">Catalog</a></li>
            <li><img class="kaboda" src="images/menu_border.png" /></li>
            <li><a href="services.php">Services</a></li>
            <li><img class="kaboda" src="images/menu_border.png" /></li>
            <li><a href="featured.php">Featured</a></li>
            <li><img class="kaboda" src="images/menu_border.png" /></li>
            <li><a href="support.php">Support</a></li>
        </ul>
        </div><!--end menu div-->
        <div id="content-body" style="height:600px;">
        <div id="trace"></div>
            <div id="p-left">
                <div id="prof-pic">
                <img src="Admin/images/icons/users.png" style="border-bottom:1px solid #DDD;" width="128" height="128" />
                <span style="position:relative; top:4px; font-weight:600; display:block; width:inherit;color:blue; text-align:center; height:auto;"><?php echo $_SESSION["name"]; ?></span>
                </div>
            </div>
            <div id="p-right">
            	<div id="info">
                	<a href="#" id="edit_btn" onclick="enableForm(event)">EDIT</a>
                	<?php echo $HTM; ?>
                </div>
            </div>
        </div>
    </div><!--end content div-->
    <?php include "sharedlibs/common_footer1.php";?>
</div><!--end cont div-->
</body>
</html>