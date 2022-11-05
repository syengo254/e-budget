<?php 
session_start();
if(isset($_SESSION["access_c"])){
	header("Location: customer_home.php");
}
else if(isset($_SESSION["access_s"])){
	header("Location: supplier_home.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="styles/index.css" type="text/css" />
<link rel="stylesheet" href="styles/form-elements.css" type="text/css" />
<link REL="SHORTCUT ICON" HREF="images/site_icon.png">
<title>Welcome to E-Budget</title>
</head>
<body>
<div id="cont">
	<div id="header">
    	<div>
        <ul id="top-nav">
            <li><a href="login.php">Login</a></li>
            <li><img class="dias" src="images/diamond.png" /></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><img class="dias" src="images/diamond.png" /></li>
            <li><a href="#">Checkout</a></li>
            <li><img class="dias" src="images/diamond.png" /></li>
            <li><a href="#">Shopping Cart:empty</a></li>
        </ul></div>
        <div>
        <ul id="like_btns">
            <li><a href="http://www.facebook.com/e-budget/"><img src="images/facebook_icon.png" /></a></li>
            <li><a href="http://www.twitter.com/@e-budget"><img src="images/twittericon.png" /></a></li>
            <li><a href="http://www.feeds.com/news/e-budget"><img src="images/RSS-Feed-icon.png" /></a></li>
            <li><form method="get" action="task/search.php"><input type="text" name="search" /><input style="position:absolute; width:20px; height:22px; top:4px; right:15px;" type="image" src="images/search.png" alt="search"/></form></li>
        </ul></div>
    </div><!--end header div-->
    <div id="content">
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
        <div id="tab1">
        	<div id="slide">
                <div id="flashContent">
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
				<!--[if !IE]>-->
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
            <div id="info">
            <div id="left"><img src="images/decor.jpg" /></div>
            <div id="right">
            <span><h3>Eliminating the stress in shopping!!!</h3></span>
            <span id="atten">This is how it works:</span><br />
            <ul style="color:#FFF; list-style:url(images/lister.png); width:520px; font-family:Arial; font-size:17px;">
            	<li style="position:relative; top:-5px;">We bring major supermarkets and shopping stores in this one single portal to eliminate the need to visit different sites by different stores.</li>
                <li style="position:relative; top:-5px;">Sign up, shop and pay through our online payment systems and tell us where you want your goods delivered and the time.....just easy!</li>
                <li style="position:relative; top:-5px;">We have an automated shopping cart that will select your choosen items at the stores they are available the cheapest. Enjoy!</li>
            </ul>
            <div style="position:relative; width:160px; margin:0 auto; top:10px;">
            <a class="button" href="joinpage.php">Join Now!</a>
            </div>
            </div>
            </div>
        </div>
    </div><!--end content div-->
    <div id="h_footer">
    <span style="position:relative; display:block; width:300px; margin:0 auto; font-family:Brush Script MT; font-size:36px; text-align:center; color:#FFF;">Supported Stores:</span>
    <img src="images/store_logos.png" style="position:relative; display:block; width:745px; height:auto; margin:0 auto;" />
    <div id="owner"><p>“Bringing your favourite stores to one single portal”</p><span style="color:#FF0"><p> Powered by Wydateam</p> <p>© 2012-2013</p></span></div>
    </div>
</div>
</body>
</html>