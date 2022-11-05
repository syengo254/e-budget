<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../styles/form-elements.css" type="text/css" />
<title>Untitled Document</title>
<style type="text/css">
#holder{
	position:relative;
	width:480px;
	margin:0 auto;
}
#add_form{
	position:relative;
	float:left;
	background-color:#2e45ba;
	border-radius:5px;
	width:445px; height:455px;
	padding:5px 10px 5px 10px;
}
label{
	font-family:Arial, Helvetica, sans-serif;
	font-size:18px;
	padding-right:10px;
	float:left;
	text-shadow:1px 1px 1px #000;
	display:block;
	color:#FFF;
	width:43%;
}
span.f_title{
	color:#FFF;
	position:relative;
	top:-7px;
	display:block;
	width:inherit;
	text-align:center;
	font-family:Calibri; font-style:italic; font-size:24px;
	text-shadow:1px 1px 1px #1B1B1B;
	margin-bottom:10px;
}
textarea{
	position:relative;
	width:230px;
	padding:3px;
	height:70px;
	border:1px solid #07bee2;
	margin-bottom:10px;
	right:5px;
	font-size:14px;
}
</style>
</head>

<body>
<div id="holder">
	<div id="add_form">
        <span class="f_title">Addressing Information</span>
        <form name="address" method="post" action="fill_address.php">
            <div><label for="town">My Town:</label><input type="text" id="town" name="town" /></div>
            <div><label for="area">My Area Name:</label><input type="text" id="area" name="area" /></div>
            <div><label for="street">My Street/Estate Name:</label><input type="text" id="street" name="street" /></div>
            <div><label for="plot">My Plot Number/ Name:</label><input type="text" id="plot" name="plot" /></div>
            <div><label for="door">My Door Number:</label><input type="text" id="door" name="door" /></div>
            <div><label for="add">Additional Info [e.g gate-color, unique details, etc.]:</label><textarea id="add" name="add"></textarea></div><span id="resp" class="responses"></span>
            <a style="margin:0 auto;" class="button" href="#form" onclick="handler(event, 3);">continue</a>
        </form>
	</div>
</div>
</body>
</html>
