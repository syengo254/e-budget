<?php 
include "sharedlibs/DBMS.class.php";

$db = new DBMS();
$id = $_POST["id"];

if($id != NULL){
	$db->do_query("SELECT id, description FROM p_subcategories WHERE category_id = ".$id);
	$num = mysqli_num_rows($db->db_query);
	
	if($num > 0){
		while(list($id, $desc) = mysqli_fetch_array($db->db_query)){
			echo "<option value='".$id."'>".$desc."</option>";
		}
	}
}else{
	echo "You are not allowed to view this page.";
}
?>