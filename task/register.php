<?php 
session_start();

$_post_data = array(); // to temporarily store posted data.

if($_POST["account"] == "type001"){ // if customer account form data.
	$_post_data["fname"] = stripslashes(htmlspecialchars($_POST["fname"]));
	$_post_data["lname"] = stripslashes(htmlspecialchars($_POST["lname"]));
	$_post_data["id"] = stripslashes(htmlspecialchars($_POST["idnum"]));
	$_post_data["email"] = stripslashes(htmlspecialchars($_POST["email"]));
	$_post_data["phone"] = stripslashes(htmlspecialchars($_POST["phone"]));
	$_post_data["pass"] = sha1(stripslashes(htmlspecialchars($_POST["pass1"])));
	$_post_data["gender"] = stripslashes(htmlspecialchars($_POST["gender"]));
	
	$_SESSION["form_data"] = $_post_data; //save form data in temporary session to insert after correct captcha.
	$_SESSION["reg"] = true;
	
	header("Location: new_customer.php?step=2");
}
else if($_POST["account"] == "type002"){ // if supplier account form data.
	$_post_data["name"] = stripslashes(htmlspecialchars($_POST["sname"]));
	$_post_data["email"] = stripslashes(htmlspecialchars($_POST["semail"]));
	$_post_data["phone"] = stripslashes(htmlspecialchars($_POST["sphone"]));
	$_post_data["pass"] = sha1(stripslashes(htmlspecialchars($_POST["spass1"])));
	
	$_SESSION["form_data"] = $_post_data; //save form data in temporary session to insert after correct captcha.
	$_SESSION["reg"] = true;
	
	header("Location: new_supplier.php?step=2");
}
else{
	die("The source of the received data is not recognized.");
}

?>