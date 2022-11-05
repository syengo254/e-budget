<?php 
//DEVELOPER DAVID KASEE SYENGO. 
include "includes/config.php"; //configurations file.
include "includes/M-PESA/MPrivate.php"; // file for private m-pesa account message handling.
include "includes/Response.php";
setlocale(LC_ALL,"En-Us");

$resp = new Response();
if(isset($_POST["secret"])){ //check integrity of the message.
	if($_POST["secret"] == $_SECRET_KEY){
		$message = $_POST["message"];
		$payer_num = $_POST["from"];
		
		$mp = new MPrivate($message);
		$det = $mp->getMessageDetails(); //retrieve details from message.
		
		if($SIM_MODE){ // simulation mode is ON.
			$conn = mysql_connect("localhost", $DB_USERNAME, $DB_PASSWORD);
			$db = mysql_select_db($DB_NAME, $conn);
			$str = "INSERT INTO payments(id, trans_code, payer_name, payer_number, amount_paid, time_paid, order_id, confirmed) VALUES(NULL,'".$det["t_code"]."','".$det["name"]."','".$det["number"]."',".$det["amount"].",CURRENT_TIMESTAMP,NULL,'NO')";
			$query = mysql_query($str, $conn);
			if($query){
				mysql_close($conn);
				$resp->RespondSuccessMsg();
			}else{
				mysql_close($conn);
				$resp->RespondErrorMsg();
			}
		}else{ // simulation mode is OFF. 
			if($payer_num == "MPESA"){//Check if $payer_num is equal to 'M-PESA'.
				$conn = mysql_connect("localhost", $DB_USERNAME, $DB_PASSWORD);
				$db = mysql_select_db($DB_NAME, $conn);
				$str = "INSERT INTO new_payments(id, trans_code, payer_name, payer_number, amount_paid, raw_text, time_paid) VALUES(NULL,'".$det["t_code"]."','".$det["name"]."','".$det["number"]."',".$det["amount"].",'".$message."',".$time.")";
				$query = mysql_query($str, $conn);
				if($query){
					mysql_close($conn);
					$resp->sendResponseMsg($det["number"], $PHONE_NUM, "M-PESA");
				}else{
					mysql_close($conn);
					$resp->RespondErrorMsg();
				}
			}else{
				$resp->RespondErrorMsg();
			}
		}
	}
	else{
		$resp->RespondErrorMsg();//response for wrong secret key.
	}
}
else{
	$resp->RespondErrorMsg();//response for unsend secret key.
}
?>