<?php 
session_start();
if(isset($_GET["user"]) && isset($_GET["reg"])){
	$_SESSION["access_s"] = true;
	$_SESSION["reg"] = false;
	unset($_SESSION["reg"]);
}
require_once("sharedlibs/session_validator.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="styles/common.css" media="screen" type="text/css" />
<link rel="stylesheet" type="text/css" href="styles/supplier.css"/>
<link REL="SHORTCUT ICON" HREF="images/site_icon.png">
<script type="text/javascript" src="scripts/jQuery.js"></script>
<script type="text/javascript" src="scripts/jquery.hotkeys-0.7.9.js"></script>
<script type="text/javascript" src="scripts/supplier.js"></script>
<title>STORE: <?php echo $_SESSION["name"]; ?></title>
</head>
<body>
<?php echo $_SESSION["pid"]; ?>
<div id="cont">
<div id="trace"></div>
    <noscript>
    You cannot use this site without JavaScript please enable it or upgrade your browser.
    </noscript>
	<div id="header">
    	<div>
        <ul id="top-nav">
            <li><a href="logout.php">Logout</a></li>
            <li><img class="dias" src="images/diamond.png" /></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><img style="visibility:hidden;" class="dias" src="images/diamond.png" /></li>
            <li><a style="visibility:hidden;" href="">Checkout</a></li>
            <li><img style="visibility:hidden;" class="dias" src="images/diamond.png" /></li>
            <li><a style="visibility:hidden;" href="">Shopping Cart:empty</a></li>
        </ul></div>
        <div id="store_logo">Store: <span style="color:#FF0; text-decoration:underline;"><?php echo $_SESSION["name"]; ?></span></div>
        <div>
        <ul id="like_btns">
            <li><a href="http://www.facebook.com/e-budget/"><img src="images/facebook_icon.png" /></a></li>
            <li><a href="http://www.twitter.com/@e-budget"><img src="images/twittericon.png" /></a></li>
            <li><a href="http://www.feeds.com/news/e-budget"><img src="images/RSS-Feed-icon.png" /></a></li>
            <li><form method="get" action="task/search.php"><input type="text" name="search" /><input style="position:absolute; width:20px; height:22px; top:4px; right:11px;" type="image" src="images/search.png" alt="search"/></form></li>
        </ul></div>
    </div><!--end header div-->
    <div id="content">
    	<div id="menu">
        <ul id="nav">
        	<li><a href="">Home</a></li>
            <li><img class="kaboda" src="images/menu_border.png" /></li>
            <li><a href="profile.php?user=001">Edit profile</a></li>
            <li><img class="kaboda" src="images/menu_border.png" /></li>
            <li><a href="catalogviewer.php">Catalog</a></li>
            <li><img class="kaboda" src="images/menu_border.png" /></li>
            <li><a href="featured.php">Featured</a></li>
            <li><img class="kaboda" src="images/menu_border.png" /></li>
            <li><a href="support.php">Support</a></li>
        </ul>
        </div><!--end menu div-->
        <div id="content-body">
        	<img id="logo" src="<?php echo $_SESSION["pic"]; ?>" alt="<?php echo $_SESSION["name"]; ?>_logo" title="<?php echo $_SESSION["name"];?>" />
            <div style="position:relative; width:540px; margin:0 auto; top:30px; left:40px;">
                <a class="menu_butt" href="#" onclick="setAction(event, 'create');">Enter products</a>
                <a class="menu_butt" href="#" onclick="setAction(event, 'view');">View products</a>
                <a class="menu_butt" href="#" onclick="setAction(event, 'update');">Update Products</a>
                <a class="menu_butt" href="#" onclick="setAction(event, 'remove');">Remove products</a>
            </div>
        </div>
    </div><!--end content div-->
    <?php include "sharedlibs/common_footer1.php";?>
</div>
</body>
</html>