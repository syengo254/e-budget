<?php 
//This script uploads the product caption if available.
session_start();
require_once("../sharedlibs/session_validator.php");

$desc = $_SESSION["desc"];
$pid = $_SESSION["pid"];

sleep(1);
if(isset($_POST["upload"])){
	include "../sharedlibs/DBMS.class.php";
	include "../sharedlibs/SimpleImagee.php";
	
	if( $_FILES['pimg']['error'] == 0 ){
		
		$type = $_FILES['pimg']['type'];
		$size = $_FILES['pimg']['size'];
		if(($type == "image/jpeg" || $type == "image/pjpeg" || $type == "image/png" || $type == "image/gif") && $size <= 235520){
			$img = new SimpleImagee($_FILES["pimg"]["tmp_name"]);
			$db = new DBMS();
			
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
			$path = "images/products/".$desc.".png";
			$img->save("../".$path, 9);
			
			$db->do_query("UPDATE products SET image = '".$path."' WHERE id = ".$pid);
			if($db->db_query){
				unset($_SESSION["desc"]);
				unset($_SESSION["pid"]);

				echo '<script language="javascript" type="text/javascript">
					top.upstat(1);
				</script>';
					exit();
			}
			else{
				$db->do_query("DELETE FROM products WHERE id = ".$pid);
				echo '<script language="javascript" type="text/javascript">
					top.upstat(0);
				</script>';
					exit();
			}
		}
		else{
			echo '<script language="javascript" type="text/javascript">
			top.upstat(-1);
		</script>';
			exit();
		}
	}
	else{// if post error.
		echo '<script language="javascript" type="text/javascript">
		top.upstat(0);
	</script>';
		exit();
	}
}
else{// if not posted.
	 echo '<script language="javascript" type="text/javascript">
		top.upstat(0);
	</script>';
	exit();
}
?>