<?php
/*
FBPhish
Copyright (C) 2016  Jamie4224

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see http://www.gnu.org/licenses/.
*/



require_once(__DIR__ . "/../config.inc.php");

class sql{
	protected $fbphish_database_conn;
	protected $fbphish_database_conn_err;
	protected $query_arg1;
	protected $query;
	protected $success;

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