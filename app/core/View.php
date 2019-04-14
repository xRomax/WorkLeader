<?php

namespace app\core;

class View {

	public $path;
	public $route;
	public $template = 'default';

	public function __construct($route) {
		$this->route = $route;
		$this->path = $route["path"];
	}

	public function render() {
		$path = 'app/views/'.$this->path.'.php';
		
		if (file_exists($path)) {
			ob_start();
			require $path;
			$content = ob_get_clean();
			require 'app/views/templates/'.$this->template.'.php';
		}
	}

	public function redirect($url) {
		header('location: /'.$url);
		exit;
	}

	public static function errorCode($code) {
		http_response_code($code);
		$path = 'app/views/errors/'.$code.'.php';
		if (file_exists($path)) {
			require $path;
		}
		exit;
	}

	public function message($status, $message, $title) {
		exit(json_encode(['status' => $status, 'message' => $message, 'title' => $title]));
	}
	
	public function location($url) {
		exit(json_encode(['url' => $url]));
	}

}	