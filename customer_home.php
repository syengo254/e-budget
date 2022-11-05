<?php 
session_start();
if(isset($_GET["user"]) && isset($_GET["reg"])){
	$_SESSION["access_c"] = true;
	$_SESSION["reg"] = false;
	unset($_SESSION["reg"]);
}
require_once("sharedlibs/session_validator.php");
if(isset($_GET["action"]) && $_GET["action"] == "clearcart"){ //clear cart sessions if checkout is complete.
	unset($_SESSION["cart_id"]);
	unset($_SESSION["total_cost"]);
	unset($_SESSION["order_id"]);
	unset($_SESSION["paid"]);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="styles/common.css" media="screen" type="text/css" />
<link REL="SHORTCUT ICON" HREF="images/site_icon.png">
<title>CUSTOMER: <?php echo $_SESSION["name"]; ?></title>
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
            <li><a href="./task/checkout.php">Checkout</a></li>
            <li><img class="dias" src="images/diamond.png" /></li>
            <li><?php include "sharedlibs/cartItems.php";?></li>
        </ul></div>
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
        	<li><a href="index.php">Home</a></li>
            <li><img class="kaboda" src="images/menu_border.png" /></li>
            <li><a href="profile.php?user=002">Edit profile</a></li>
            <li><img class="kaboda" src="images/menu_border.png" /></li>
            <li><a href="catalogviewer.php">Catalog</a></li>
            <li><img class="kaboda" src="images/menu_border.png" /></li>
            <li><a href="featured.php">Featured</a></li>
            <li><img class="kaboda" src="images/menu_border.png" /></li>
            <li><a href="support.php">Support</a></li>
        </ul>
        </div><!--end menu div-->
        <div id="content-body">
        <!--Show products animation and adverts and div history.-->
        <div id="flashContent">
			<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="990" height="300" id="steps_by_guide" align="middle">
				<param name="movie" value="images/steps_by_guide.swf" />
				<param name="quality" value="high" />
				<param name="bgcolor" value="#ffffff" />
				<param name="play" value="true" />
				<param name="loop" value="true" />
				<param name="wmode" value="gpu" />
				<param name="scale" value="showall" />
				<param name="menu" value="true" />
				<param name="devicefont" value="false" />
				<param name="salign" value="" />
				<param name="allowScriptAccess" value="sameDomain" />
				<!--[if !IE]>-->
				<object type="application/x-shockwave-flash" data="images/steps_by_guide.swf" width="990" height="300">
					<param name="movie" value="images/steps_by_guide.swf" />
					<param name="quality" value="high" />
					<param name="bgcolor" value="#ffffff" />
					<param name="play" value="true" />
					<param name="loop" value="true" />
					<param name="wmode" value="gpu" />
					<param name="scale" value="showall" />
					<param name="menu" value="true" />
					<param name="devicefont" value="false" />
					<param name="salign" value="" />
					<param name="allowScriptAccess" value="sameDomain" />
				<!--<![endif]-->
					<a href="http://www.adobe.com/go/getflash">
						<img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />
					</a>
				<!--[if !IE]>-->
				</object>
				<!--<![endif]-->
			</object>
		</div>
        </div>
    </div><!--end content div-->
    <?php include "sharedlibs/common_footer1.php";?>
</div><!--end cont div-->
</body>
</html>