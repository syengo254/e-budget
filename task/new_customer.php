<?php 
session_start();
if(!(isset($_SESSION["reg"]) && $_SESSION["reg"])){
	header("Location: ../index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../styles/common.css" media="screen" type="text/css" />
<link rel="stylesheet" href="../styles/form-elements.css" media="screen" type="text/css" />
<link rel="stylesheet" href="../styles/newcust.css" media="screen" type="text/css" />
<link rel="stylesheet" href="../styles/controls.css" media="screen" type="text/css" />
<link REL="SHORTCUT ICON" HREF="../images/site_icon.png">
<script src="../scripts/jQuery.js" type="text/javascript"></script>
<script src="../scripts/stepsreg.js" type="text/javascript"></script>
<title><?php echo 'E-budget.com:: step '.(isset($_GET["step"])== true ? $_GET["step"] : "1"); ?></title>
</head>
<body>
<div id="cont">
	<div id="header">
    	<div>
        <ul id="top-nav">
            <li><a href="../login.php">Login</a></li>
            <li><img class="dias" src="../images/diamond.png" /></li>
            <li><a href="../contact.php">Contact Us</a></li>
            <li><img class="dias" src="../images/diamond.png" /></li>
            <li><a href="../index.php">Checkout</a></li>
            <li><img class="dias" src="../images/diamond.png" /></li>
            <li><a href="#">Shopping Cart:empty</a></li>
        </ul></div>
        <div>
        <ul id="like_btns">
            <li><a href="http://www.facebook.com/e-budget/"><img src="../images/facebook_icon.png" /></a></li>
            <li><a href="http://www.twitter.com/@e-budget"><img src="../images/twittericon.png" /></a></li>
            <li><a href="http://www.feeds.com/news/e-budget"><img src="../images/RSS-Feed-icon.png" /></a></li>
            <li><form method="get" action="search.php"><input type="text" name="search" /><input style="position:absolute; width:20px; height:22px; top:4px; right:15px;" type="image" src="../images/search.png" alt="search"/></form></li>
        </ul></div>
    </div><!--end header div-->
    <div id="content">
    	<div id="menu">
        <ul id="nav">
        	<li><a href="../index.php">Home</a></li>
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
            <c>
        <div class="d_box" style="top:40px; height:300px;">
        	<div class="btitle">
            	<span style="position:relative; top:7px;">Captcha Box</span>
            </div>
            <div class="d_body">
            	<img id="icap" style="position:relative; width:310px; height:70px; margin:0 auto; display:block; border:1px solid #0FF;" src="captcha_img.php" />
                <form style="position:relative; width:310px; margin:0 auto; display:block;" action="captcha.php" method="post" onsubmit="handler(event, 2);">
                <span id="lc" style="position:relative; top:-2px; text-align:center; width:inherit; display:block;">Enter the text shown above in the text box below (separate by space):</span>
                <input type="text" name="code" id="code" style="left:30px;" /><br />
                <input type="submit" value="SEND" style="position:relative; width:100px; margin:0 auto; display:block;" />
                </form>
            </div>
        </div>
        </div></c>
    </div><!--end content div-->
    <?php include "../sharedlibs/common_footer.php";?>
</div>
</body>
</html>