<?php 
session_start();
include 'sharedlibs/session_check.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="styles/common.css" media="screen" type="text/css" />
<link rel="stylesheet" type="text/css" href="styles/index.css"/>
<link REL="SHORTCUT ICON" HREF="images/site_icon.png">
<link rel="stylesheet" type="text/css" href="styles/carttablestyle.css"/>
<link rel="stylesheet" type="text/css" href="styles/form-elements.css"/>
<script type="text/javascript" src="scripts/jQuery.js"></script>
<script type="text/javascript" src="scripts/jquery.hotkeys-0.7.9.js"></script>
<script type="text/javascript" src="scripts/admin.js"></script>
<noscript>
You just can't use the functions of admin without javascript enabled
</noscript>
<title>E-budget.com: Admin</title>
</head>
<body>
<div id="cont">
	<div id="header">
    	<div>
        <ul id="top-nav">
            <li><a href="logout.php" style="position:relative; right:50px; top:10px; font-size:16px; font-weight:bold;">logout</a></li>
            <li><img class="dias" style="visibility:hidden;" src="images/diamond.png" /></li>
            <li><a href="" style="visibility:hidden;">Contact Us</a></li>
            <li><img class="dias" style="visibility:hidden;" src="images/diamond.png" /></li>
            <li><a href="" style="visibility:hidden;">Checkout</a></li>
            <li><img class="dias" style="visibility:hidden;" src="images/diamond.png" /></li>
            <li><a href="" style="visibility:hidden;">Shopping Cart:empty</a></li>
        </ul></div>
        <div>
        <?php 
		echo "<span style=\"color:white; display:block; position:absolute; top:50px; right:-50px;\">Hello, <b>".$_SESSION["name"]."</b>";
		?>
        <ul id="like_btns" style="visibility:hidden;">
            <li><a href="http://www.facebook.com/e-budget/"><img src="images/facebook_icon.png" /></a></li>
            <li><a href="http://www.twitter.com/@e-budget"><img src="images/twittericon.png" /></a></li>
            <li><a href="http://www.feeds.com/news/e-budget"><img src="images/RSS-Feed-icon.png" /></a></li>
            <li><form method="get" action="task/search.php"><input type="text" name="search" /><input style="position:absolute; width:20px; height:22px; top:4px; right:11px;" type="image" src="images/search.png" alt="search"/></form></li>
        </ul></div>
    </div><!--end header div-->
    <div id="content">
    	<div id="menu">
        <ul id="nav">
        	<li>
            	<a onmouseover="mopen('m1')" onmouseout="mclosetime()" href="index.php">View</a>
                <div id="m1" onmouseover="mcancelclosetime()" 
            onmouseout="mclosetime()">
                    <a onclick="handler(event, 'vorders')" href="#">orders</a>
                    <a onclick="handler(event, 'vpays')" href="#">payments</a>
                    <a onclick="handler(event, 'addc')" href="#">add category</a>
                    <a onclick="handler(event, 'addsc')" href="#">add subcategory</a>
                </div>
            </li>
            <li><img class="kaboda" src="images/menu_border.png" /></li>
            <li><a href="catalogviewer.php">Customers</a></li>
            <li><img class="kaboda" src="images/menu_border.png" /></li>
            <li><a href="">Stores</a></li>
            <li><img class="kaboda" src="images/menu_border.png" /></li>
            <li>
            	<a onmouseover="mopen('m2')" onmouseout="mclosetime()" href="">Remove</a>
                <div id="m2" onmouseover="mcancelclosetime()" 
            onmouseout="mclosetime()">
                    <a onclick="handler(event, 'ccust')" href="#">remove customer</a>
                    <a onclick="handler(event, 'cstore')" href="#">remove store</a>
                    <a onclick="handler(event, 'cpay')" href="#">invalidate pay</a>
                </div>
            </li>
            <li><img class="kaboda" src="images/menu_border.png" /></li>
            <li><a href="" style="width:190px;">Incomplete Products</a></li>
        </ul>
        </div><!--end menu div-->
        <div id="content-body">
        <div id="trace"></div>
            <div class="break">
            	<div class="b-title">View Actions</div>
                <a href="" class="action" onclick="handler(event, 'vusers')">
                	<div class="a-pic">
                    	<img src="images/icons/users.png" width="128" height="128" />
                    </div>
                    <span class="a-label">view users</span>
                </a>
                <a href="" class="action" onclick="handler(event, 'vstores')">
                	<div class="a-pic">
                    	<img src="images/icons/suppliers(1).png" width="32" height="32" />
                    </div>
                    <span class="a-label">view stores</span>
                </a>
                <a href="" class="action" onclick="handler(event, 'vorders')" title="view paid orders.">
                	<div class="a-pic">
                    	<img src="images/icons/order-history-icon.png" width="128" height="128" />
                    </div>
                    <span class="a-label">view orders</span>
                </a>
                <a href="" class="action" style="margin-right:0px" onclick="handler(event, 'vpays')">
                	<div class="a-pic">
                    	<img src="images/icons/1366929994_Cash.png" width="128" height="128" />
                    </div>
                    <span class="a-label">view payments</span>
                </a>
            </div>
             <div class="break">
            	<div class="b-title">Edit Actions</div>
                <!--<a href="" class="action">
                	<div class="a-pic">
                    	<img src="images/icons/Developer-ico3n.png" width="128" height="128" />
                    </div>
                    <span class="a-label">my settings</span>
                </a>-->
                <a href="" class="action" title="sorts items by where they are bought from." onclick="handler(event, 'sorders')">
                	<div class="a-pic">
                    	<img src="images/icons/buy.png" width="108" height="108" />
                    </div>
                    <span class="a-label">sort cart items</span>
                </a>
                <a href="" class="action" style="margin-right:0px;">
                	<div class="a-pic">
                    	<img src="images/icons/lorrygreen.png" width="128" height="128" />
                    </div>
                    <span class="a-label">mark delivered</span>
                </a>
               <!-- <a href="" class="action" style="margin-right:0px">
                	<div class="a-pic">
                    	<img src="images/icons/receipt.png" width="128" height="128" />
                    </div>
                    <span class="a-label">issued receipts</span>
                </a>-->
            </div>
        </div>
    </div><!--end content div-->
    <?php include "sharedlibs/common_footer.php";?>
</div><!--end cont div-->
</body>
</html>