<?php
$apppath = dirname(__FILE__);
require("$apppath/../main.boot.php");

class FBPhish{
	private $content;
	private $page;

	public function __construct() {
		// Initialize
	}

	public function init() {
		$this->__construct();
	}

	public function loadPage($page) {
		global $theme;
		global $apppath;

		$this->content = file_get_contents("$apppath/themes/$theme/home.php");
		return $this->content;
	}
}