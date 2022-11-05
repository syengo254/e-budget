<?php 
//DEVELOPER DAVID KASEE SYENGO. 
// Feel FREE to edit this class as you deem suitables for your website needs.
class TReceipts{
	public $transactions = 0;
	public $completed = false; // If true this payment was made earlier and confirmed.
	private $receipt;
	private $conn, $dbh;  // mysql connection and db handler variables.
	private $name, $amount, $number, $ptime;
	
	public function __construct($receipt){
		$this->receipt = $receipt;
		$this->checkSentCode();
	}
	
	public function __destruct(){
		mysqli_close($this->conn);
	}
	
	private function checkSentCode(){
		include "config.php";
		$this->conn = mysqli_connect('127.0.0.1', $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
		$str = "SELECT COUNT(id) FROM payments WHERE trans_code = '".mysqli_real_escape_string($this->conn, $this->receipt)."' AND confirmed = 'NO'";
		$run = mysqli_query($this->conn, $str);
		while(list($ts) = mysqli_fetch_row($run)){
			$this->transactions = $ts;
		}
		
		$this->getTransactionDetails();
		
		if($this->transactions == 0){
			$this->checkCompleted();
		}
	}
	
	public function checkCompleted(){
		$str = "SELECT COUNT(id) FROM payments WHERE trans_code = '".mysqli_real_escape_string($this->conn, $this->receipt)."' AND confirmed = 'YES'";
		$run = mysqli_query($this->conn, $str);
		if(!$run) exit();
		while(list($ts) = mysqli_fetch_row($run)){
			if($ts == 1){
				$this->completed = true;
			}
		}
	}
	
	public function completeTransaction($order_id, $cid){
		$query = false;
		if($this->transactions > 0){
			$str = "UPDATE payments SET order_id = ".$order_id.", confirmed = 'YES' WHERE trans_code = '".$this->receipt."'";
			$query = mysqli_query($this->conn, $str) or die($str);
			if($query){
				$str = "UPDATE shopping_cart SET checked = 'yes' WHERE customer_id = ".$cid;
				$query = mysqli_query($this->conn, $str) or die($str);
				return $query;
			}
		}		
	}
	
	private function getTransactionDetails(){
		if($this->transactions > 0){
			$str = "SELECT payer_name, payer_number, amount_paid, UNIX_TIMESTAMP(time_paid) FROM payments WHERE trans_code = '".$this->receipt."'";
			$run = mysqli_query($this->conn, $str);
			while(list($nme, $num, $amt, $tm) = mysqli_fetch_row($run)){
				$this->name = $nme;
				$this->number = $num;
				$this->amount = $amt;
				$this->msg = $tm;
				$this->ptime = (1*10*60*60) + $tm;
			}
		}
	}
	
	public function is_enough($amt){ //returns true if amount paid is enough and false if it isn't.
		if($this->amount >= $amt){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function getTransAmount(){
		return $this->amount;
	}
	
	public function getPayerName(){
		return $this->name;
	}
	
	public function getPayerNumber(){
		return $this->number;
	}
	
	public function getTimePaid($full = false){ // return full date if $full is passed as true.
		if($full){
			return $tim = date("Y-m-d h:i A", (int)$this->ptime);
		}else{
			return $tim = date("h:i A", (int)$this->ptime);
		}
	}
}
?>