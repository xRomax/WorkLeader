<?php

namespace app\models;

use app\core\Model;
// use Imagick;

class Admin extends Model {

  public $error;

  public function loginValidate($post) {
		$config = require 'app/config/admin.php';
		if ($config['login'] != $post['login'] ) {
			$this->error = 'Неправильный логин!';
			return false;
		} else if ($config['password'] != $post['password']) {
      $this->error = 'Неправильный пароль!';
			return false;
    }
		return true;
	}

	public function jobsValidate($post, $type) {
		$nameLen = iconv_strlen($post['name']);
		$urlLen = iconv_strlen($post['url']);
		if ($nameLen < 3 or $nameLen > 40) {
			$this->error = 'Название должно содержать от 3 до 40 символов';
			return false;
		} elseif ($urlLen < 5 or $urlLen > 20) {
			$this->error = 'URL должен содержать от 5 до 40 символов';
			return false;
		} elseif (empty($post["country"])) {
			$this->error = 'Выберите страну';
			return false;
		} elseif (empty($post["sex"])) {
			$this->error = 'Выберите пол';
			return false;
		} elseif (empty($post["salary"])) {
			$this->error = 'Введите зарплату (PLN)';
			return false;
		}
		if (empty($_FILES['img']['tmp_name']) and $type == 'add') {
			$this->error = 'Изображение не выбрано';
			return false;
		}
		return true;
	}

	public function jobsAdd($post) {
		$count = $this->db->countTabs('jobs1');
		$params = [
			'id' => $count,
			'name' => $post["name"],
			'url' => $post["url"],
			'country' => $post["country"],
			'sex' => $post["sex"],
			'salary' => $post["salary"],
		];
		$sql = "INSERT INTO jobs1 (id, name, url, country, sex, salary) VALUES (:id, :name, :url, :country, :sex, :salary)";
		$this->db->query($sql,$params);
		return $this->db->lastInsertId();
	}

	public function jobsEdit($post, $id) {
		$params = [
			'id' => $id,
			'name' => $post["name"],
			'url' => $post["url"],
			'country' => $post["country"],
			'sex' => $post["sex"],
			'salary' => $post["salary"],
		];
		$sql = "UPDATE `jobs1` SET `name` = :name, `url` = :url, `country` = :country, `sex` = :sex, `salary` = :salary WHERE `id` = :id";
		$this->db->query($sql,$params);
	}

	public function jobsDelete($id) {
		$params = [
			"id" => $id,
		];
		$this->db->query("DELETE FROM jobs1 WHERE id = :id", $params);
		unlink('public/images/jobs/'.$id.'.jpg');
	}

	public function isJobsExists($table,$key,$val) {
		$params = [
			$key => $val,
		];
		return $this->db->column("SELECT id FROM $table WHERE $key = :$key", $params);
	}

	public function jobsData($id) {
		$params = [
			"id" => $id,
		];
		return $this->db->row("SELECT * FROM `jobs1` WHERE id = :id",$params);
	}

	public function jobsUploadImage($path, $id) {
		move_uploaded_file($path,'public/images/jobs/'.$id.'.jpg');
	}
}