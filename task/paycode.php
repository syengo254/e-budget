<?php 
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PayCode</title>
</head>
<body>
<div id="payment">
	<iframe style="overflow:hidden;" src="../payments/W-Pesa/bin/payer.php" width="550px" height="230px" frameborder="0" seamless="seamless"></iframe>
    <span style="position:relative; display:block;color:blue; width:2000px; margin:0 auto;">CLICK 'NEXT' TO CONTINUE.</span>
    <a class="button" id="step" style="margin:0 auto; top:10px; visibility:hidden;" href="#" onclick="goNext(event, 3)">next</a>
</div>
</body>
</html>