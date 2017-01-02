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

spl_autoload_register(function ($class) {
    require_once(__DIR__ . '/' . $class . '.class.php');
});

class logger extends sql{
	private $apppath;
	private $insertUriData;
	private $type;
	private $uri;
	private $error;
	private $userIp;
	private $metaUserIp;
	private $containsBl;
	private $bl;
	private $blacklisted;

	public function __construct() {

	}

	public function uriLog($type, $uri, $logfrom, $error, $userIp, $metaUserIp){
		global $containsBl;
		global $blacklisted;
		global $bl;

			$this->insertUriData = "INSERT INTO `phishx_log_uri` (`id`, `type`, `record_date`, `uri`, `logged_from`, `error`, `user_ip`, `meta_user_ip`, `extra`) VALUES (NULL, '$type', CURRENT_TIMESTAMP, '$uri', '$logfrom', '$error', '$userIp', '$metaUserIp', '$extra')";

			parent::db_connect();
			parent::query($this->insertUriData);
			parent::db_close();
	}
}