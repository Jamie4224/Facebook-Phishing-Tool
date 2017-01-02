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



require_once(__DIR__ . "/../config.inc.php");

if(!function_exists("debug")){
	function debug() {
		global $debug;

		if($debug == "true"){
			// Turn on error reporting
			echo "<br>Debug:";
		    error_reporting(-1);
		    ini_set("display_errors", 'On');
		}else{
			// Turn off error reporting
			error_reporting(0);
   			ini_set("display_errors", 0);
		}	
	}
	debug();
}