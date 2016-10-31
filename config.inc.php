<?
// This is the configuration of the FB phishing tool!
// Here you should define all database connection settings and other stuff

// Database settings
$fbphish_sql_ip = "";
$fbphish_sql_user = "";
$fbphish_sql_password = "";
$fbphish_sql_db = "";
$fbphish_sql_table_prefix = "fbphish_";


// DO NOT TOUCH
// Defining global functions
function getMetaIp() {
    $metaIp = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $metaIp = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $metaIp = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $metaIp;
}

function getIp() {
	$ip = $_SERVER['REMOTE_ADDR'];
	return $ip;
}
