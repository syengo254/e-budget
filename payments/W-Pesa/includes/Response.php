<?php
//DEVELOPER DAVID KASEE SYENGO.  
/* THIS IS FOR RESPONSE HANDLING FUNCTIONS. READ IT CAREFULLY BEFORE YOU EDIT IT.*/
class Response{
	
	// JSON Response message to send SMS to payer. This is used with the USHAHIDI SMSSync.
	function sendResponseMsg($num, $owner, $method){
		echo '{
					"payload": {
					"success": "true",
					"task": "send",
					"messages": [
						{
						"to": "'.$num.'",
						"message": "Your Payment Has Been Recieved On Our Business Number: '.$owner.'. Please enter the '.$method.' Trans Code You Received To Complete Your Transaction. THANK YOU FOR TRANSACTING WITH US."
						}
					]
					}
				}';
		exit();
	}
	
	//send ONLY an error (success=false) JSON response to your SMS Gateway client.You can edit this function according 
	//to the sms gateway you are using.
	function RespondErrorMsg(){
		echo '{
				payload: {
				success: "false"
				}
			}';
		exit();
	}
	
	//send ONLY a sucess (success=false) JSON response to your SMS Gateway client.You can edit this function according 
	//to the sms gateway you are using.
	function RespondSuccessMsg(){
		echo '{
				payload: {
				success: "true"
				}
			}';
		exit();
	}
}
?>