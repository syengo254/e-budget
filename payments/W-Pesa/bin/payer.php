<?php 
//DEVELOPER DAVID KASEE SYENGO.
session_start(); 
include "../includes/config.php";

$cost = $_SESSION["total_cost"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
*{margin:0;}
body{
	width:415px;
}
#wp-cont{
	position:relative;
	width:520px;
	height:210px;
	background-color: #224a17; 
	background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#224a17), to(#55a041));
	background: -webkit-linear-gradient(top, #224a17, #55a041);
	background: -moz-linear-gradient(top, #224a17, #55a041); /* IE 10 */ 
	background: -ms-linear-gradient(top, #224a17, #55a041); /* Opera 11.10+ */ 
	background: -o-linear-gradient(top, #224a17, #55a041);
	font-family:Arial;
	border:1px solid #579846;
	border-radius:10px;
	box-shadow:2px 2px 3px #5E5E5E;
}
#wp-logo{
	position:absolute;
	float:left;
	top:22px;
	left:1px;
	z-index:3;
}
#wp-instruction{
	position:relative;
	display:block;
	color:#dcff1c;
	width:490px;
	font-size:16px;
	left:80px;
	top:20px;
}
#wp-label{
	position:relative;
	display:block;
	color:#fff;
	text-shadow:1px 1px 1px #0B0B0B;
	font-size:17px;
	left:120px;
	top:30px;
}
form#wp{
	position:relative;
	float:right;
	right:110px;
	top:30px;
	z-index:4;
}
#wp-foot{
	position:relative;
	color:#FFF;
	font-size:13px;
	font-style:italic;
	top:130px;
	left:110px;
	text-align:center;
}
#t_code{
	position:relative;
	border:1px solid #7bd662;
	height:30px;
	width:210px;
	top:10px;
	left:-5px;
	border-radius:3px;
	font-size:22px;
	font-weight:700;
}
#t_code:focus{
	box-shadow:1px 1px 4px #7bd662;
}
#wp-send{
	position:relative;
	display:block;
	top:30px;
	left:50px;
	width:100px;
	height:30px;
	font-weight:700;
}
</style>
<title>Pay Frame Page</title>
</head>
<body>
    <div id="wp-cont">
        <img id="wp-logo" src="w-pesa-logo.png" />
        <span id="wp-instruction">Send the Kshs. <?php echo number_format($cost, 2); ?> to the number: <?php echo "0".substr($PHONE_NUM, 4, 9); ?> via M-Pesa.</span>
        <span id="wp-label">Enter The M-Pesa Transaction Code (9-digits) Below:</span><br />
        <form id="wp" method="post" action="confirm.php">
        <input type="text" name="t_code" id="t_code" /><br />
        <input type="submit" value="SEND" id="wp-send" />
        </form>
        <div id="wp-foot">
        	Powered by afrigeeks.com
        </div>
	</div>
</body>
</html>