<?php 
	//MYSQL database configuaration using credentials 
	define("HOST","localhost");
	define("DB_USER","root");
	define("DB_PASS","");
	define("DB_NAME","w3db1");
	
	// create connection mysqli
	$conn = mysqli_connect(HOST,DB_USER,DB_PASS,DB_NAME);
	
	// if a corrupted connection
	// exeception handling
	if(!$conn)
	{
		die(mysqli_error());
	}
	//
	class Database
	{
		private static $bdd = null;

		private function __construct() {
		}

		public static function getBdd() {
			if(is_null(self::$bdd)) {
				self::$bdd = new PDO("mysql:host=localhost;dbname=w3project", 'root', 'root');
			}
			return self::$bdd;
		}
		public function getConnection(){
			//MYSQL database configuaration using credentials 
			define("HOST","localhost");
			define("DB_USER","root");
			define("DB_PASS","");
			define("DB_NAME","w3db1");
			
			// create connection mysqli
			$conn = mysqli_connect(HOST,DB_USER,DB_PASS,DB_NAME);
			
			// if a corrupted connection exception handling
			if(!$conn)
			{
				die(mysqli_error());
			}else{
				echo "connection successful";
			}
			
		}
	}
?>