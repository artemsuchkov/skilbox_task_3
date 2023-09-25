<?php


namespace classes\db;

class Connect {

	protected static $_instance;
	public static $conn;

    private function __construct() {  
		$host = 'mysql';
		$user = 'root';
		$pass = 'rootpassword';
		$db = 'test_db';
		$conn = mysqli_connect($host, $user, $pass, $db);

		if (!$conn) {
			die("Connection failed");
		} 
		
		mysqli_query($conn, "SET NAMES 'utf8'");

		$this->conn = $conn;

		//echo "Connected to MySQL successfully!";
    }

    public static function getInstance() {
        if (self::$_instance === null) {
            self::$_instance = new self;  
        }
 
        return self::$_instance;
    }
 
    private function __clone() {
    }

    private function __wakeup() {
    } 






	







}