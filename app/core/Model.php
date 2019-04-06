<?php

use PDO;

namespace app\core;

abstract class Model {

	public $db;
	
	public function __construct() {
		$this->db = new Db;
	}

}

class Db {

	protected $db;
	
	public function __construct() {
		$config = require 'app/config/db.php';
		$this->db = new PDO("mysql:host=$host;dbname=$name", $user, $password);
	}

	public function query($sql, $params = []) {
		$stmt = $this->db->prepare($sql);
		if (!empty($params)) {
			foreach ($params as $key => $val) {
				$stmt->bindValue(':'.$key, $val);
			}
		}
		$stmt->execute();
		return $stmt;
	}

	public function row($sql, $params = []) {
		$result = $this->query($sql, $params);
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}

	public function column($sql, $params = []) {
		$result = $this->query($sql, $params);
		return $result->fetchColumn();
	}

}