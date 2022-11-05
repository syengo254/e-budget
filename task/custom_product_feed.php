<?php
//redirect to specific pages. 
$action = $_GET["action"];
$cat = $_GET["cat"];
$subcat = $_GET["subcat"];
$row = $_GET["row"];

if($action == "edit"){
	//redirect to edit scenario.
}
else{
	if($cat != ''){
		$url = "get_specific.php?cat=".$cat."&row=".$row;
		
		header("Location: $url");
	}
	else if($subcat != ''){
		$url = "get_specific.php?subcat=".$subcat."&row=".$row;
		
		header("Location: $url");
	}
}
?>