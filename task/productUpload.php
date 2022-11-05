<?php
session_start();
require_once("../sharedlibs/session_validator.php");
include "../sharedlibs/DBMS.class.php";

$cat = stripslashes(htmlentities($_POST["cat"]));
$subcat = stripslashes(htmlentities($_POST["subcat"]));
$desc = stripslashes(htmlentities($_POST["desc"]));
$qty = stripslashes(htmlentities($_POST["quantity"]));
$price = stripslashes(htmlentities($_POST["price"]));
$hasPhoto = $_POST["details"];

//$success = 0;

$id = $_SESSION["id"]; // will be used as standard reference to logged user.

$db = new DBMS();

$str = "INSERT INTO products(id, description, category_id, subcategory_id, quantity, store_id,price, image) VALUES(NULL,'".$desc."',".$cat.",".$subcat.",'".$qty."',".$id.",".$price.",'not set')";
$db->do_query($str);

if($db->db_query){
	if($hasPhoto){
		$db->do_query("SELECT id FROM products WHERE description = '".$desc."' AND id = (select MAX(id) FROM products)");
		if($db->db_query){
			list($pid) = mysqli_fetch_array($db->db_query);
			
			$_SESSION["pid"] = $pid;
			$_SESSION["desc"] = $desc; //used when uploading product image.
			
				echo '{"success":1}';
				exit();
		}
		else{
			echo '{"success":0, "reason":"Failed to add product, try again."}';
			exit();
		}
	}else{
		echo '{"success":1}';
		exit();
	}
}
else{
	echo '{"success":0, "reason":"query execution failed."}';
	exit();
}
?>