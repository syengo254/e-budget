<?php 
session_start();
include "../sharedlibs/session_validator.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../styles/common.css" media="screen" type="text/css" />
<link rel="stylesheet" type="text/css" href="../styles/payment.css"/>
<link rel="stylesheet" type="text/css" href="../styles/controls.css"/>
<link rel="stylesheet" type="text/css" href="../styles/form-elements.css"/>
<link REL="SHORTCUT ICON" HREF="../images/site_icon.png">
<script type="text/javascript" src="../scripts/jQuery.js"></script>
<script type="text/javascript" src="../scripts/paying.js"></script>
<title>CheckOut: <?php echo $_SESSION['name']; ?></title>
</head>
<body>
<div id="cont">
	<div id="header">
    	<div>
        <ul id="top-nav">
            <li><a href="../logout.php">Logout</a></li>
            <li><img class="dias" src="../images/diamond.png" /></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><img class="dias" src="../images/diamond.png" /></li>
            <li><a href="#" style="text-decoration:line-through;">Checkout</a></li>
            <li><img class="dias" src="../images/diamond.png" /></li>
            <li><a href="#">Shopping Cart: Now paying</a></li>
        </ul></div>
        <div>
        <ul id="like_btns">
            <li><a href="http://www.facebook.com/e-budget/"><img src="../images/facebook_icon.png" /></a></li>
            <li><a href="http://www.twitter.com/@e-budget"><img src="../images/twittericon.png" /></a></li>
            <li><a href="http://www.feeds.com/news/e-budget"><img src="../images/RSS-Feed-icon.png" /></a></li>
            <li><form method="get" action="search.php"><input type="text" name="search" /><input style="position:absolute; width:20px; height:22px; top:4px; right:16px;" type="image" src="../images/search.png" alt="search"/></form></li>
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
        <div id="content-body">
        	<div id="steps">
            	
            </div>
            <div id="dyna">
            	<div class="d_box" style="top:20px; height:200px; width:480px;">
                	<div class="btitle">
                    <span style="position:relative; top:7px;">Where do you want your goods delivered?</span>
                    </div>
                    <div class="d_body" style="width:470px;">
                    <a class="button" style="width:310px; margin:0 auto;" href="#" onclick="goNext(event, 2)">Use currently set location</a>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end content div-->
    <?php include "../sharedlibs/common_footer.php";?>
</div><!--end cont div-->
</body>
</html>