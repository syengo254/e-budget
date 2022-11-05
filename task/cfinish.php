<?php 
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../styles/controls.css"/>
<link rel="stylesheet" type="text/css" href="../styles/form-elements.css"/>
<title>E-budget Sign up: Verification</title>
</head>
<body>
    <div id="holder">
        <div class="d_box" style="top:40px; height:350px;">
        	<div class="btitle">
            	<span style="position:relative; top:7px;">Finish</span>
            </div>
            <div class="d_body">
            <span style="color:#00F; font-weight:700">Congratulations!</span> <p>Your Customer Account has been set up successfully. We just need you to confirm it as instructed below:</p> 
            <p> A numeric code has been sent to your phone number <?php echo $_SESSION['phone']; ?> [wait for atmost <b>5</b> mins]. Enter the code in the text box below and click finish to go to the customer's base page.</p>
            <span style="position:relative;left:90px;margin:0;display:block;color:#0F0; font-size:14px;">This is done to confirm your identity</span><br />
            <form name="fverify" method="post" action="verifier.php">
            <input type="text" name="smscode" id="smscode" style="position:relative; left:20%;" />
            <div id="resp" style="display:none;"><img src="../images/loading.gif" style='position:relative; top:2px; margin-right:3px; display:inline;' width="24" height="24"/> Please wait...</div>
            <a class="button" style="margin:0 auto;" href="#form" onclick="handler(event, 4)">Finish</a>
            </form>
            </div>
        </div>
    </div>
</body>
</html>