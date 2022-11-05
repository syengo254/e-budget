<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="styles/common.css" media="screen" type="text/css" />
<link rel="stylesheet" href="styles/join.css" media="screen" type="text/css" />
<link rel="stylesheet" href="styles/form-elements.css" media="screen" type="text/css" />
<link REL="SHORTCUT ICON" HREF="images/site_icon.png">
<script type="text/javascript" src="scripts/joinp.js"></script>
<title>Sign-Up: E-budget.com</title>
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
            <li><a href="index.php">Checkout</a></li>
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
        <div id="content-body">
            <div id="left_form">
            	<span class="f_title">I'm a customer</span>
                <form name="f_cust" method="post" action="task/register.php">
                    <div><label for="fname">My First Name:</label><input type="text" id="fname" name="fname" /></div>
                    <div><label for="lname">My Last Name:</label><input type="text" id="lname" name="lname" /></div>
                    <div><label for="idnum">My ID Number:</label><input type="text" id="idnum" name="idnum" /></div>
                    <div><label for="email">My Email Address:</label><input type="email" id="email" name="email" /></div>
                    <div><label for="phone">My Phone Number:</label><input type="text" id="phone" name="phone" /></div>
                    <div><label for="pass1">My Password <span style="text-shadow:none;font-size:12px; color:#0f0;">[more than 8 chars]</span>:</label><input type="password" id="pass1" name="pass1" /></div>
                    <input type="hidden" value="type001" name="account" />
                    <div><label for="pass2">Re-enter Password:</label><input type="password" id="pass2" name="pass2" /></div>
                    <div><label for="gender">My gender:</label>
                        <select name="gender" id="gender">
                        	<option value="NULL">--select--</option>
                        	<option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <a style="margin:0 auto;" class="button" href="#form" onclick="cvalidate()">continue</a>
                </form>
            </div>
            <div id="right_form">
            	<span class="f_title">Create Store Account</span>
                <form name="f_supp" method="post" action="task/register.php">
                    <div><label for="name">Store Name:</label><input type="text" id="name" name="sname" /></div>
                    <div><label for="semail">My Email Address:</label><input type="email" id="semail" name="semail" /></div>
                    <div><label for="sphone">My Phone Number:</label><input type="text" id="sphone" name="sphone" /></div>
                    <div><label for="spass1">My Password <span style="text-shadow:none;font-size:12px; color:#0F0;">[more than 8 chars]</span>:</label><input type="password" id="spass1" name="spass1" /></div>
                    <input type="hidden" value="type002" name="account" />
                    <div><label for="spass2">Re-enter Password:</label><input type="password" id="spass2" name="spass2" /></div>
                    <!--<div><label for="logo">Upload Logo:[must]</label><input type="file" name="logo" id="logo"></div>-->
                    <a style="margin:0 auto; top:145px;" class="button" href="#form" onclick="svalidate()">continue</a>
                </form>
            </div>
        </div>
    </div><!--end content div-->
    <?php include "sharedlibs/common_footer.php";?>
</div>
</body>
</html>