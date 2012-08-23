<?php

class Database {
	private static $dsn = 'mysql:host=localhost;dbname=citycorner';
	private static $username = 'citycorner';
	private static $password = '10ProGm3';
	private static $db;

	private function __construct() {}

	public static function getDB () {
		if (!isset(self::$db)) {
			try {
				self::$db = new PDO(self::$dsn,
									self::$username,
									self::$password);
			} catch (PDOException $e) {
				$error_message = $e->getMessage();
				//include('database_error.php');
				exit();
			}
		}
		return self::$db;
	}
}

?>
