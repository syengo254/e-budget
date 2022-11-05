<?php 
session_start();
require_once("sharedlibs/session_validator.php");

unset($_SESSION["id"]);
unset($_SESSION["name"]);
$_SESSION["access_c"] = $_SESSION["access_s"] = false;
unset($_SESSION["access_c"]);
unset($_SESSION["access_s"]);
unset($_SESSION["pic"]);
unset($_SESSION["cart_id"]);

session_destroy();
// do logout.
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="styles/common.css" media="screen" type="text/css" />
<link REL="SHORTCUT ICON" HREF="images/site_icon.png">
<script type="text/javascript">
function navigater(){
	setTimeout(function(){window.location = "index.php";}, 3000);
}
</script>
<title>Sign-Up: E-budget.com</title>
</head>
<body onload="navigater()">
<div id="cont">
	<div id="header">
    	<div>
        <ul id="top-nav">
            <li><a href="login.php">Login</a></li>
            <li><img class="dias" src="images/diamond.png" /></li>
            <li><a href="">Contact Us</a></li>
            <li><img class="dias" src="images/diamond.png" /></li>
            <li><a href="">Checkout</a></li>
            <li><img class="dias" src="images/diamond.png" /></li>
            <li><a href="">Shopping Cart:You are logged out</a></li>
        </ul></div>
        <div>
        <ul id="like_btns" style="right:-535px">
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
            <li><a href="catalogviewer.php">Catalog</a></li>
            <li><img class="kaboda" src="images/menu_border.png" /></li>
            <li><a href="">Services</a></li>
            <li><img class="kaboda" src="images/menu_border.png" /></li>
            <li><a href="">Featured</a></li>
            <li><img class="kaboda" src="images/menu_border.png" /></li>
            <li><a href="">Support</a></li>
        </ul>
        </div><!--end menu div-->
        <div id="content-body">
        You have been logged out. <br />Please wait while you be directed to the <a href="index.php">homepage.</a>
        <div id="slide">
                <!--<div id="flashContent">
			<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="990" height="204" id="home" align="middle">
				<param name="movie" value="images/home.swf" />
				<param name="quality" value="high" />
				<param name="bgcolor" value="#666666" />
				<param name="play" value="true" />
				<param name="loop" value="true" />
				<param name="wmode" value="window" />
				<param name="scale" value="showall" />
				<param name="menu" value="true" />
				<param name="devicefont" value="false" />
				<param name="salign" value="" />
				<param name="allowScriptAccess" value="sameDomain" />
				<!--[if !IE]>
				<object type="application/x-shockwave-flash" data="images/home.swf" width="990" height="204">
					<param name="movie" value="images/home.swf" />
					<param name="quality" value="high" />
					<param name="bgcolor" value="#666666" />
					<param name="play" value="true" />
					<param name="loop" value="true" />
					<param name="wmode" value="window" />
					<param name="scale" value="showall" />
					<param name="menu" value="true" />
					<param name="devicefont" value="false" />
					<param name="salign" value="" />
					<param name="allowScriptAccess" value="sameDomain" />
				<!--<![endif]--
					<a href="http://www.adobe.com/go/getflash">
						<img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />
					</a>
				<!--[if !IE]>--
				</object>
				<!--<![endif]--
			</object>
		</div>-->
            </div>
        </div>
    </div><!--end content div-->
    <?php include "sharedlibs/common_footer1.php";?>
</div><!--end cont div-->
</body>
</html>