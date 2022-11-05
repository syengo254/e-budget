<?php 
include "sharedlibs/DBMS.class.php";

$db = new DBMS();

$id_array = array();
$desc_array = array();

$db->do_query("SELECT * FROM p_categories");

while(list($id, $desc) = mysqli_fetch_array($db->db_query)){
	$id_array[] = $id;
	$desc_array[] = $desc;
}

function trace($id, $desc){
	for($i = 0; $i < sizeof($desc); $i ++){
		echo "<option value='".$id[$i]."'>".$desc[$i]."</option>";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="styles/supplier.css"/>
<title>Product Upload Template</title>
</head>
<body>
<div id="hold">
	<div class='f_hold'>
    	<span style="position:relative; display:block; width:200px; height:22px; margin:0 auto; font-weight:700; color:#1D1D1D; text-shadow:1px 2px 1px #FFF;">Product 1</span>
        <form id="new" method="post">
            <label for="cat">Select Category: </label><select id="cat" onchange="showSubcats(event)"><option value="null">--category--</option><?php trace($id_array, $desc_array)?></select><br />
            <label for="sub-cat">Select Sub-category: </label><select id="sub-cat"><option value="null">--sub-category--</option></select><br />	<label for="quantity">Specify quantity: </label><input type="text" id="quantity" style="width:125px" /><br />
            <label for="desc">Product description: </label><input type="text" id="desc" />
            <label for="price">Set product price [KShs]:</label><input type="text" id="price" style="width:120px;" />
        </form>
        <form id="img" enctype="multipart/form-data" action="task/photo.php" target="uploader" method="post">
        	<label for="pimg">Choose product image: </label><input type="file" id="pimg" name="pimg" />
            <input type="hidden" name="upload" value="true" />
        </form>
        
        <div id="resp" style="position:relative; top:3px; visibility:hidden;"><img src="images/loading.gif" width="24" height="24" style="position:relative; top:7px;" /> uploading...</div>
        
        <a class="submit" href="#" style="margin:0 auto; top:10px;" onclick="upload(event)">upload</a>
        
        <iframe name="uploader" src="#" style="visibility:hidden; width:0px; height:0px;"></iframe>
    </div>
    <div class='f_hold'>
    	<span style="position:relative; display:block; width:200px; height:22px; margin:0 auto; font-weight:700; color:#1D1D1D; text-shadow:1px 2px 1px #FFF;">Product 2</span>
        <form id="new2" method="post">
            <label for="cat">Select Category: </label><select id="cat" onchange="showSubcats(event)"><option value="null">--category--</option><?php trace($id_array, $desc_array)?></select><br />
            <label for="sub-cat">Select Sub-category: </label><select id="sub-cat"><option value="null">--sub-category--</option></select><br />	<label for="quantity">Specify quantity: </label><input type="text" id="quantity" style="width:125px" /><br />
            <label for="desc">Product description: </label><input type="text" id="desc" />
            <label for="price">Set product price [KShs]:</label><input type="text" id="price" style="width:120px;" />   
        </form>
        <form id="img2" enctype="multipart/form-data" target="uploader" action="task/photo.php" method="post">
        	<label for="pimg">Choose product image: </label><input type="file" id="pimg" name="pimg" />
            <input type="hidden" name="upload" value="true" />
        </form>
        
        <div id="resp" style="position:relative; top:3px; visibility:hidden;"><img src="images/loading.gif" width="24" height="24" style="position:relative; top:7px;" /> uploading...</div>
        
        <a class="submit" href="#" style="margin:0 auto; top:10px;" onclick="upload(event)">upload</a>
        
    </div>
    <div class='f_hold'>
    	<span style="position:relative; display:block; width:200px; height:22px; margin:0 auto; font-weight:700; color:#1D1D1D; text-shadow:1px 2px 1px #FFF;">Product 3</span>
        <form id="new3" method="post">
            <label for="cat">Select Category: </label><select id="cat" onchange="showSubcats(event)"><option value="null">--category--</option><?php trace($id_array, $desc_array)?></select><br />
            <label for="sub-cat">Select Sub-category: </label><select id="sub-cat"><option value="null">--sub-category--</option></select><br />	<label for="quantity">Specify quantity: </label><input type="text" id="quantity" style="width:125px" /><br />
            <label for="desc">Product description: </label><input type="text" id="desc" />
            <label for="price">Set product price [KShs]:</label><input type="text" id="price" style="width:120px;" />   
        </form>
        <form id="img3" enctype="multipart/form-data" target="uploader" action="task/photo.php" method="post">
        	<label for="pimg">Choose product image: </label><input type="file" id="pimg" name="pimg" />
            <input type="hidden" name="upload" value="true" />
        </form>
        
        <div id="resp" style="position:relative; top:3px; visibility:hidden;"><img src="images/loading.gif" width="24" height="24" style="position:relative; top:7px;" /> uploading...</div>
        
        <a class="submit" href="#" style="margin:0 auto; top:10px;" onclick="upload(event)">upload</a>
        
    </div>
</div>
</body>
</html>