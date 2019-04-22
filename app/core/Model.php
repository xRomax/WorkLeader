<?php

namespace app\core;

use app\lib\Db;

abstract class Model {

	public $db;
	
	public function __construct() {
		$this->db = new Db;
	}
	
	public function getCurrency($url) {
		$path = 'app/config/currency.json';
    if (!is_file($path) || filemtime($path) < time() - 86400) {
			if ($data = file_get_contents($url)) {
				file_put_contents($path, $data);
			}
		}
    return json_decode(file_get_contents($path));
	}
}