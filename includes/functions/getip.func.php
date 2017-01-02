<?php
/*
Phishx
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



require_once(__DIR__ . "/../config.inc.php");

if(!function_exists("getIp")){
	function getIp() {
		$ip = $_SERVER['REMOTE_ADDR'];
		return $ip;
	}
}

if(!function_exists("getMetaIp")){
	function getMetaIp() {
		$metaIp = "NULL";
	    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
	        $metaIp = $_SERVER['HTTP_CLIENT_IP'];
	    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	        $metaIp = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    }
	    return $metaIp;
	}
}