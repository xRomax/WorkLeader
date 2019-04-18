<?php

namespace app\core;

use app\lib\Db;

abstract class Model {

	public $db;
	
	public function __construct() {
		$this->db = new Db;
	}
	public function jobsList($route) {
		$max = 5;
		$params = [
			'max' => $max,
			'start' => '0',
		];
		return $this->db->row('SELECT * FROM jobs ORDER BY id ASC', $params);
	}
}