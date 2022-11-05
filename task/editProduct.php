<?php 
//This file updates the products.
session_start();
require_once("../sharedlibs/session_validator.php");
include "../sharedlibs/DBMS.class.php";
$db = new DBMS();

if(isset($_GET["pic"])){// check if a picture is send.
	updatePic($db);
	exit();
}

$pid = $_POST["pid"];
$desc = $_POST["desc"];
$qty = $_POST["qty"];
$price = (float) $_POST["price"];

//update description first.
if($desc != ''){
	$db->do_query("UPDATE products SET description = '".$desc."' WHERE id = ".$pid);
	if(!$db->db_query){
		echo '{"success":0, "reason":"Failed to update product description. Try again."}';
		exit();
	}
}

//update quantity secondly.
if($qty != ''){
	$db->do_query("UPDATE products SET quantity = '".$qty."' WHERE id = ".$pid);
	if(!$db->db_query){
		echo '{"success":0, "reason":"Failed to update product quantity. Try again."}';
		exit();
	}
}

//update price lastly.
if($price != '' && $price > 0){
	$db->do_query("UPDATE prices SET price = '".$price."' WHERE product_id = ".$pid);
	if(!$db->db_query){
		echo '{"success":0, "reason":"Failed to update product price. Try again."}';
		exit();
	}
}

$_SESSION["pid"] = $pid;
$_SESSION["desc"] = $desc;
echo '{"success":1}';//after successively updating all.
exit();

function updatePic($dbh){
	if(isset($_POST["upload"])){
	include "../sharedlibs/SimpleImagee.php";
	
	if( $_FILES['pimg']['error'] == 0 ){
		
		$type = $_FILES['pimg']['type'];
		$size = $_FILES['pimg']['size'];
		if(($type == "image/jpeg" || $type == "image/pjpeg" || $type == "image/png" || $type == "image/gif") && $size <= 235520){
			$img = new SimpleImagee($_FILES["pimg"]["tmp_name"]);
			
			$info = $img->get_original_info();
			if($info["height"] > 160){
				$img->fit_to_height(160);
			}
			else if($info["width"] > 187){
				$img->fit_to_width(187);
			}
			else{
				$img->best_fit(187, 160);
			}
			//$img->best_fit(250, 150);
			$pid = $_SESSION["pid"];
			$desc = $_SESSION["desc"];
			$path = "images/products/".$desc.".png";
			$img->save("../".$path, 9);
			
			$dbh->do_query("UPDATE products SET image = '".$path."' WHERE id = ".$pid);
			if($dbh->db_query){
				unset($_SESSION["pid"]);
				unset($_SESSION["desc"]);

				echo '<script language="javascript" type="text/javascript">
					top.updtPic(1, "'.$path.'");
				</script>';
					exit();
			}
		}
		else{
			echo '<script language="javascript" type="text/javascript">
			top.updtPic(-1, null);
		</script>';
			exit();
		}
	}
	else{// if post error.
		echo '<script language="javascript" type="text/javascript">
		top.updtPic(0, null);
	</script>';
		exit();
	}
}
else{// if not posted.
	 echo '<script language="javascript" type="text/javascript">
		top.updtPic(0, null);
	</script>';
	exit();
}
}
?>