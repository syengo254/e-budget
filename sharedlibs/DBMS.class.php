<?php 
//DATABASE CONNECT AND QUERYING HANDLER.

class DBMS{
	private $connection;
	private $db_handler;
	public $db_query;
	public $insert_id;
	
	public function __construct(){
		$DB_USER = "root";
		$DB_NAME = "e-budget";
		$DB_PASS = "";
		$DB_SERVER = "127.0.0.1";
		$this->db_handler = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASS, $DB_NAME);
	}
	
	public function select_all($table_name){
		$str = "SELECT * FROM ".$table_name;
		$this->db_query = mysqli_query($this->db_handler, $str);
	}
	
	public function do_query($str){
		$this->db_query = mysqli_query($this->db_handler,$str);
		if(isset($this->db_handler->insert_id) && $this->db_handler->insert_id > 0){
			$this->insert_id = $this->db_handler->insert_id;
		}
	}
	
	public function __destruct(){
		mysqli_close($this->db_handler);
	}
	public function escape($str){
		return $this->db_handler->real_escape_string($str);
	}
}
?>