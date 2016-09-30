<?php 
require_once('Database.php');
class Application {
//This class will start the instance of the database class
	public $db;
	
	public function __construct() {
		$this->db = new Database();//for now this is all we need in this class
	
	}
}
?>