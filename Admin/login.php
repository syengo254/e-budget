<?php
$err = false; 
if(isset($_GET["err"])){
	$err = true;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link REL="SHORTCUT ICON" HREF="images/site_icon.png">
<script type="text/javascript">
function check(){
<?php if($err) echo "var err = document.getElementById('error');
if(err){
	err.style.visibility = 'visible';
}"; ?>
}
</script>
<style type="text/css">
body{
	background-color:#203086;
	font-family:Arial, Helvetica, sans-serif;
	font-size:16px;
}
#login{
	position:relative;
	width:300px;
	height:300px;
	margin:0 auto;
	top:60px;
	background-color:#a7ebff;
	border-radius:5px;
}
label{
	position:relative;
	display:block;
	width:150px;
	margin:0 auto;
	text-align:center;
	margin-bottom:5px;
}
input[type="text"], input[type="password"]{
	position:relative;
	display:block;
	width:180px;
	margin:0 auto;
	padding:3px 5px 3px 5px;
	margin-bottom:20px;
	border:1px solid #3CF;
	border-radius:3px;
	height:22px;
	font-size:18px;
}
input[type="text"]:focus, input[type="password"]:focus{
	box-shadow:1px 1px 3px #330000;
}
input[type="submit"]{
	position:relative;
	display:block;
	width:80px;
	margin:0 auto;
	height:32px;
	font-weight:700;
}
a.button{
	position:relative;
	top:90px;
	display:block;
	background-color:#172362;
	border:1px solid #59a7d3;
	width:200px;
	height:34px;
	text-align:center;
	padding:6px 0px 0px 0px;
	text-decoration:none;
	color:#FFF;
	font-size:22px;
	font-family:Arial;
	box-shadow:1px 1px 2px #141414;
	border-radius:5px;
	text-shadow:1px 1px 1px #000;
	outline:none;
	margin:0 auto;
}
a.button:hover{
	background-color:#0e153b;
	padding:7px 0px 0px 0px;
	height:33px;
	box-shadow:1px 2px 2px #0B0B0B;
}
</style>
<title>ADMIN: LOGIN</title>
</head>
<body onload="check()">
    <div id="login">
    <span style="position:relative; top:10px; display:block;text-align:center; width:290px; color:#7a0026; text-shadow:1px 1px 1px #EBEBEB;">Please enter your login details as an Admin:</span>
    	<form style="position:relative; top:10px;" method="post" action="access.php">
        <div id="error" style="position:relative; margin-bottom:10px; width:280px; margin:0 auto; color:#F00; visibility:hidden;">wrong username/password combination.</div>
        <label for="username">My username:</label>
        <input type="text" id="username" name="username" />
        <label for="password">My password:</label>
        <input type="password" id="password" name="password" />
        <input type="submit" value="Login" name="log" />
        </form>
    </div>
    <a class="button" href="../index.php">customers area</a>
</body>
</html>