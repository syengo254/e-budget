<?php 
require_once("sharedlibs/session_validator.php");
include "sharedlibs/DBMS.class.php";

function showCustomerProfile(){
	$db = new DBMS();
	
	$db->do_query("SELECT customers.first_name, customers.last_name, customers.email, physical_addresses.town, physical_addresses.area, physical_addresses.street_estate, physical_addresses.plot_no_name, physical_addresses.door_no, physical_addresses.add_details FROM customers
	INNER JOIN physical_addresses ON customers.customer_id = physical_addresses.customer_id
	WHERE customers.customer_id = ".$_SESSION["id"]);
	
	while(list($fname, $lname, $email, $town, $area, $street, $plot, $door, $add) = mysqli_fetch_array($db->db_query)){
		$str = '<div class="cont-head">Personal Information</div>
                    <form method="post" action="editProfile.php">
                    <div><label for="fname">My first name:</label><input disabled="disabled" class="intxt" type="text" name="fname" id="fname" value="'.$fname.'" /></div>
                    <div><label for="lname">My last name:</label><input disabled="disabled" class="intxt" type="text" name="lname" id="lname" value="'.$lname.'" /></div>
                    <div><label for="email">My email:</label><input disabled="disabled" class="intxt" type="email" name="email" id="email" value="'.$email.'" /></div>
                    <div class="cont-head">Addressing Information</div>
                    <div><label for="town">My town:</label><input disabled="disabled" class="intxt" type="text" name="town" id="town" value="'.$town.'" /></div>
                    <div><label for="area">My area:</label><input disabled="disabled" class="intxt" type="text" name="area" id="area" value="'.$area.'" /></div>
                    <div><label for="street">My street/estate:</label><input disabled="disabled" class="intxt" type="text" name="street" id="street" value="'.$street.'" /></div>
                    <div><label for="plot">My plot name/number:</label><input disabled="disabled" class="intxt" type="text" name="plot" id="plot" value="'.$plot.'" /></div>
                    <div><label for="door">My door number:</label><input disabled="disabled" class="intxt" type="text" name="door" id="door" value="'.$door.'" /></div>
                    <div><label for="add">My additional info:</label><textarea disabled="disabled" name="add" id="add">'.$add.'</textarea></div>
                    <input type="button" class="hide" id="done" value="Done" onclick="editPersonal()" />
                    </form>';
	}
	return $str;
}
function showStoreProfile(){
	$db = new DBMS();
	
	$db->do_query("SELECT name, phone, email FROM stores WHERE id = ".$_SESSION["id"]);
	
	while(list($name, $phone, $email) = mysqli_fetch_array($db->db_query)){
		$str = '<div class="cont-head">Store Information</div>
                    <form name="edit_form" method="post" action="editProfile.php">
                    <div><label for="name">Store name:</label><input disabled="disabled" class="intxt" type="text" name="name" id="name" value="'.$name.'" /></div>
                    <div><label for="phone">Phone number:</label><input disabled="disabled" class="intxt" type="text" name="phone" id="phone" value="'.$phone.'" /></div>
                    <div><label for="email">Email:</label><input disabled="disabled" class="intxt" type="email" name="email" id="email" value="'.$email.'" /></div>
                    <input type="button" class="hide" id="done" value="Done" onclick="editSupplier()" />
                    </form>';
		return $str;
	}
}
?>