<?php

namespace app\core;

use PDO;

class Model {

	public $db;
	
	public function __construct() {
		$option = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
		$config = require 'app/config/db.php';
		extract($config);
		try {
			$this->db = new PDO("mysql:host=$host;dbname=$name;charset=$charset", $user, $password, $option);
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die("Ошибка");
		}
	}

	public function query($sql, $params = []) {
		$stmt = $this->db->prepare($sql);
		if (!empty($params)) {
			foreach ($params as $key => $val) {
				$stmt->bindValue(':'.$key, $val);
			}
		}
		$stmt->execute();
		// return $stmt;
	}

	public function row($sql, $params = []) {
		$result = $this->query($sql, $params);
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}

	public function column($sql, $params = []) {
		$result = $this->query($sql, $params);
		return $result->fetchColumn();
	}

	public function lastInsertId() {
		return $this->db->lastInsertId();
	}

	public function countTabs($table) {
		$select = $this->db->query("SELECT * FROM $table");
		$count = $select->rowCount();
		return ++$count;
	}
}