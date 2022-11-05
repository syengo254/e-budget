<?php
//DEVELOPER DAVID KASEE SYENGO. 
//THIS CLASS HANDLES M-PESA PRIVATE ACCOUNT MESSAGES.
//THIS CLASS EXTRACTS DETAILS FROM AN MPESA PRIVATE ACCOUNT PAYMENT MESSAGE.
class MPrivate{
	private $text;
	private $msgitems = array();
	
	public function __construct($msg){
		$this->text = $msg;
		$this->getMsgItems();
	}
	
	private function getMsgItems(){
		$this->msgitems["t_code"] = substr($this->text, 0, 9); //get transaction code.
		
		$pos = strpos($this->text, "Ksh") + 3;
		$pos2 = strpos($this->text, " from");
		$len = $pos2 - $pos;
		$amt = explode(",", substr($this->text, $pos, $len));
		list($s1, $s2) = $amt;
		$amt = $s1.$s2;
		$this->msgitems["amount"] = (float) $amt; //get amount paid.
		
		$pos = strpos($this->text, "from") + 5;
		$pos2 = strpos($this->text, " 254");
		$len = $pos2 - $pos;
		$this->msgitems["name"] = substr($this->text, $pos, $len); //get name of payer.
		
		$pos = strpos($this->text, "254");
		$this->msgitems["number"] = "+".substr($this->text, $pos, 12); //get number of payer.
	}
	
	public function getMessageDetails(){
		return $this->msgitems;
	}
}
?>