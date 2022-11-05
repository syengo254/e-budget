<?php
$log_fail = false; 
if(isset($_POST["attempt"]) && $_POST["attempt"] > 0){
	$log_fail = true;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="styles/common.css" media="screen" type="text/css" />
<link rel="stylesheet" type="text/css" href="styles/login.css"/>
<link REL="SHORTCUT ICON" HREF="images/site_icon.png">
<script type="text/javascript">
var obj;
function handler(){
	var email = document.getElementById('email').value;
	var password = document.getElementById('pass').value;
	
	if(email == "" || password == ""){
		alert('Enter login details!!!');
	}
	else{
		var url = "task/check_user.php";
		var data = "email=" + email + "&pass=" + password;
		//alert(data);
		if (window.XMLHttpRequest) {
			obj = new XMLHttpRequest();
			obj.onreadystatechange = processChange;
			obj.open("POST", url, true);
			obj.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			obj.setRequestHeader("Content-length", data.length);
			obj.setRequestHeader("Connection", "close");
			obj.send(data);
		  } else if (window.ActiveXObject) {
			obj = new ActiveXObject("Microsoft.XMLHTTP");
			if (obj) {
			  obj.onreadystatechange = processChange;
			  obj.open("POST", url, true);
			  obj.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			  obj.setRequestHeader("Content-length", data.length);
			  obj.setRequestHeader("Connection", "close");
			  obj.send(data);
			}
		  } else {
				document.forms.item(1).submit();
		  }
	}
	return false;
}

function processChange(){
	if (obj.readyState == 4) {
        if (obj.status == 200) {
            if(obj.responseText == "1"){
				document.forms.item(1).submit();
			}
			else if(obj.responseText == "0"){
				document.getElementById('err').style.visibility = "visible";
			}
			else{
				//alert(obj.responseText);
				document.forms.item(1).submit();
			}
        } else {
            document.forms.item(1).submit();
        }
    }
}
</script>
<noscript>
please enable javascript to be able to use this site or upgrade your browser.
</noscript>
<title>LOGIN: E-budget.com</title>
</head>
<body>
<div id="cont">
	<div id="header">
    	<div>
        <ul id="top-nav">
            <li><a href="#" style="visibility:hidden;">Login</a></li>
            <li><img class="dias" src="images/diamond.png" style="visibility:hidden;" /></li>
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
            <li><a href="services.php">Services</a></li>
            <li><img class="kaboda" src="images/menu_border.png" /></li>
            <li><a href="featured.php">Featured</a></li>
            <li><img class="kaboda" src="images/menu_border.png" /></li>
            <li><a href="support.php">Support</a></li>
        </ul>
        </div><!--end menu div-->
        <div id="content-body">
        	<div id="log-cont">
            	<div id="log-hold">
                	<span id="log-text">This is the login area, please enter the email address and password you registered with.<br />Passwords are case-sensitive.</span>
                    <div id="log-box">
                    	<div id="decor"></div>
                        <form id="log" method="post" action="task/access.php" onsubmit="return handler();">
                        	<div><label for="email">Email:</label><input type="email" id="email" name="email" /></div>
                            <div id="err" class="error"><span style="font-weight:bold; font-size:18px;">X </span>Incorrect email/password combination.</div>
                            <div><label for="pass">Password:</label><input type="password" id="pass" name="pass" /></div>
                            <input type="submit" name="login" value="Login" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end content div-->
    <?php include "sharedlibs/common_footer1.php";?>
</div><!--end cont div-->
<?php 
if($log_fail){
	echo '<script type="text/javascript">document.getElementById("err").style.visibility = "visible";</script>';
}
?>
</body>
</html>