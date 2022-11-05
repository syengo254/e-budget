<?php /*<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
.item_holder{
	position:relative;
	display:block;
	margin:5px;
	width:187px;
	min-height:211px;
	background-color:#FFF;
	border:1px solid #203086;
	font-family:Arial;
	font-size:14px;
	border-radius:2px;
	box-shadow:3px 3px 3px #979797;
	float:left;
}
.item_holder .item_title{
	position:relative;
	display:block;
	background-color:#203086;
	width:inherit; min-height:20px;
	padding-bottom:5px;
	word-wrap:break-word;
	text-align:center;
	color:#FFF;
}
.item_holder .pic{
	position:relative;
	display:block;
	width:inherit;
	height:160px;
	cursor:pointer;
}
.item_holder .p_tag{
	position:relative;
	display:block;
	background-color:#203086;
	width:inherit; height:25px;
}
.item_holder .p_tag .left{
	position:relative;
	color:#FFF;
	top:3px;
	padding:0px 0px 0px 2px;
	float:left;
}
.item_holder .p_tag .right{
	position:relative;
	top:3px;
	float:right;
	padding:0px 2px 0px 0px;
}
.p_tag .right a.button{
	position:relative;
	display:block;
	width:45px; height:19px;
	background-color:#FFF;
	border-radius:4px;
	text-align:center;
	color:#000;
	text-decoration:none;
	font-weight:bold;
	outline:none;
}
.p_tag .right a.button:hover{
	background-color:#D6D6D6;
	outline:none;
}
.p_tag .right a.button:active{
	background-color:#000;
	color:#FFF;
	outline:none;
}
.row-breaker{
	position:relative;
	display:table;
}
.store_img{
	position:absolute;
	top:40px;
	left:40px;
	-webkit-transform: rotate(-30deg);
    -moz-transform: rotate(-30deg);
    -o-transform: rotate(-30deg);
    -ms-transform: rotate(-30deg);
    transform: rotate(-30deg);
	z-index:20;
	display:block;
	width:100px;
	height:40px;
	opacity:.95;
}
</style>
<title>item</title>
</head>

<body>
<div class="row-breaker">
	<div class="item_holder">
    	<div class="item_title"><span style="position:relative; top:3px;">Red Wine 500ml</span></div>
        <div class="pic">
        	<img src="../images/products/OMO-500x500.jpg" width="187" height="160" onclick="showDetails();"/>
        </div>
        <div class="p_tag">
        	<div class="left">Price: <span style="color:#FFFF00;">1,000,895.00/=</span></div>
            <div class="right"><a class="button" onclick="addToCart()" href="#"><span style="position:relative; top:2px;">BUY</span></a></div>
        </div>
    </div>
</div>
</body>
</html>*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="styles/common.css" media="screen" type="text/css" />
<link REL="SHORTCUT ICON" HREF="images/site_icon.png">
<style type="text/css">
.det_holder{
	position:absolute;
	display:block;
	margin:5px;
	width:350px;
	min-height:311px;
	background-color:#FFF;
	border:1px solid #203086;
	font-family:Arial;
	font-size:16px;
	border-radius:2px;
	box-shadow:3px 3px 3px #979797;
	float:left;
	z-index:15;
}
.det_holder .item_title{
	position:relative;
	display:block;
	background-color:#203086;
	width:inherit; min-height:45px;
	padding-bottom:5px;
	word-wrap:break-word;
	text-align:center;
	color:#FFF;
}
.det_holder .pic{
	position:relative;
	display:block;
	width:inherit;
	height:275px;
	cursor:pointer;
}
.det_holder .p_tag{
	position:relative;
	display:block;
	background-color:#203086;
	width:inherit; height:43px;
	font-size:18px;
}
.det_holder .p_tag .left{
	position:relative;
	color:#FFF;
	top:8px;
	font-size:20px;
	padding:0px 0px 0px 5px;
	float:left;
}
.det_holder .p_tag .right{
	position:relative;
	top:5px;
	float:right;
	padding:0px 5px 0px 0px;
}
.det_holder .p_tag .right a.button{
	position:relative;
	display:block;
	width:65px; height:30px;
	background-color:#FFF;
	border-radius:4px;
	font-size:22px;
	font-stretch:semi-expanded;
	text-align:center;
	color:#000;
	text-decoration:none;
	font-weight:bold;
	outline:none;
}
.det_holder .p_tag .right a.button:hover{
	background-color:#D6D6D6;
	outline:none;
}
.det_holder .p_tag .right a.button:active{
	background-color:#000;
	color:#FFF;
	outline:none;
}
.det_holder .pic .store_img{
	position:absolute;
	top:50px;
	left:100px;
	-webkit-transform: rotate(-30deg);
    -moz-transform: rotate(-30deg);
    -o-transform: rotate(-30deg);
    -ms-transform: rotate(-30deg);
    transform: rotate(-30deg);
	z-index:20;
	display:block;
	width:150px;
	height:95px;
	opacity:.8;
}
.cat-info{
	position:relative;
	top:5px;
	font-weight:bold;
	text-align:justify;
	width:340px;
	padding-left:5px;
}
.cat-info a{
	text-decoration:none;
	color:#CFC;
}
.cat-info a:hover{
	text-decoration:underline;
}
</style>
<title>Sign-Up: E-budget.com</title>
</head>
<body>
<div class="det_holder">
		<img src="../images/close.png" style="position:absolute; right:0px; z-index:21; cursor:pointer;" onclick="close();" width="24" height="24" />
    	<div class="item_title">
        	<span style="position:relative; top:3px;">
            Red Wine 500ml
            </span>
            <div class="cat-info">
            <a href="#">Toiletry</a> > <a href="#">Toothpastes</a>
            </div>
        </div>
        <div class="pic">
        	<div class="store_img" style="font-weight:bold; font-size:24px; z-index:21; color:#003;"><span style="position:relative; top:-27px;">Available at:</span></div><img src="../images/stores/Tuskys logo.JPG" class="store_img" />
        	<img src="../images/products/OMO-500x500.jpg" width="347" height="274" />
        </div>
        <div class="p_tag">
        	<div class="left">Price: <span style="color:#FFFF00;">1,000,895.00/=</span></div>
            <div class="right"><a class="button" onclick="addToCart(event)" href="#"><span style="position:relative; top:2px;">BUY</span></a></div>
        </div>
</div>
</body>
</html>