<?php
//DEVELOPER DAVID KASEE SYENGO. 
// THIS TEMPLATE CONFIRMATION OF PAYMENT SCRIPT DOESN'T CHECK WHETHER THE PAID AMOUNT IS ENOUGH. TO CHECK THIS, USE THE is_enough($amt) method of the TReceipts class. This method takes the $amt parameter as a floating value and returns true if amount paid is enough.
session_start();
include "../includes/TReceipts.php";

$message = "";
$cost = $_SESSION["total_cost"];
$cid = $_SESSION["id"];
$order = $_SESSION["order_id"];
$tr = new TReceipts($_POST["t_code"]);

if($tr->transactions > 0){
	if($tr->is_enough($cost)){
		$message .= " <b>".$tr->getPayerName()."</b>. Your Payment of KSH <b>".number_format($tr->getTransAmount())."</b> has been received.Paid on ".$tr->getTimePaid().". THANKS FOR DOING BUSINESS WITH US. <script type='text/javascript'>top.payComplete();</script>";
		$cn = $tr->completeTransaction($order, $cid); //$order as param
		if($cn){
			$_SESSION["paid"] = $tr->getTransAmount();
		}
	}
	else{
		$message .= $tr->getPayerName()." , the amount we received from you is less than your shopping cost. PLEASE SEND THE DEFICIT OF KShs.".number_format(($cost - $tr->getTransAmount()), 2)."<br /> <a href='payer.php'>Pay again</a>.";
	}
}
else{
	if(!$tr->completed){
		$message .= "<span style='color:#F00;'>This Payment has not been received yet.</span> Click <a href='payer.php'>here</a> to retry after 5 minutes.";
	}else{
		$message .= "<span style='color:#FFF;'>This Payment Was Received In Our Sytem Earlier and Completed. Contact <a href=\"../Admin/query.php?q=payments\">Admin</a> to check if it's still valid.</span> <script type='text/javascript'>top.payComplete();</script>";
		if(!$tr->is_enough($cost)){
			$message .= ", but also the amount we received is less than your shopping cost. PLEASE SEND THE DEFICIT OF KShs.".number_format(($cost - $tr->getTransAmount()), 2)."<br /> <a href='payer.php'>Pay again</a>.";
		}
		$cn = $tr->completeTransaction($order, $cid);
	}
}
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
a, a:visited{
	color:#FF0;
}
</style>
<title>Confirm Document</title>
</head>
<body>
<div id="wp-cont">
	<img id="wp-logo" src="w-pesa-logo.png" />
    <div style="position:relative; top:45px; float:right; right:100px; color:#FFF; width:290px; word-wrap:break-word;"><?php echo $message; ?></div>
</div>
</body>
</html>