<?php

namespace app\models;

use app\core\Model;

class Admin extends Model {

  public $error;

  public function loginValidate($post) {
		$config = require 'app/config/admin.php';
		if (($post['login'] == 'roman') and ($post['password'] == 'deamon123')) return true;
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
		if ($nameLen < 3 or $nameLen > 100) {
			$this->error = 'Название должно содержать от 3 до 100 символов';
			return false;
		} elseif ($urlLen < 5 or $urlLen > 50) {
			$this->error = 'URL должен содержать от 5 до 50 символов';
			return false;
		} elseif (empty($post["country"])) {
			$this->error = 'Выберите страну';
			return false;
		} elseif (empty($post["sex"])) {
			$this->error = 'Выберите пол';
			return false;
		} elseif (empty($post["age"])) {
			$this->error = 'Введите возраст';
			return false;
		} elseif (empty($post["experience"])) {
			$this->error = 'Введите опыт работы';
			return false;
		} elseif (empty($post["responsibility"])) {
			$this->error = 'Введите обязаности';
			return false;
		} elseif (empty($post["employment_conditions"])) {
			$this->error = 'Введите условия трудоустройства';
			return false;
		} elseif (empty($post["accommodations"])) {
			$this->error = 'Введите условия проживания';
			return false;
		} elseif (empty($post["salary"])) {
			$this->error = 'Введите зарплату (PLN)';
			return false;
		} elseif (empty($post["salary_desc"])) {
			$this->error = 'Введите описание зарплаты';
			return false;
		}
		if (empty($_FILES['img']['tmp_name']) and $type == 'add') {
			$this->error = 'Изображение не выбрано';
			return false;
		}
		return true;
	}

	public function jobsAdd($post) {
		$params = [
			'name' => $post["name"],
			'url' => $post["url"],
			'country' => $post["country"],
			'sex' => $post["sex"],
			'age' => $post["age"],
			'experience' => $post["experience"],
			'responsibility' => $post["responsibility"],
			'employment_conditions' => $post["employment_conditions"],
			'accommodations' => $post["accommodations"],
			'salary' => $post["salary"],
			'salary_desc' => $post["salary_desc"],
			'status' => 'active',
		];
		$sql = "INSERT INTO jobs (name, url, country, sex, age, experience, responsibility, employment_conditions, accommodations, salary, salary_desc, status) VALUES (:name, :url, :country, :sex, :age, :experience, :responsibility, :employment_conditions, :accommodations, :salary, :salary_desc, :status)";
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
			'age' => $post["age"],
			'experience' => $post["experience"],
			'responsibility' => $post["responsibility"],
			'employment_conditions' => $post["employment_conditions"],
			'accommodations' => $post["accommodations"],
			'salary' => $post["salary"],
			'salary_desc' => $post["salary_desc"],
		];
		$sql = "UPDATE jobs SET name = :name, url = :url, country = :country, sex = :sex, age = :age, experience = :experience, responsibility  = :responsibility , employment_conditions = :employment_conditions, accommodations  = :accommodations, salary = :salary, salary_desc = :salary_desc WHERE id = :id";
		$this->db->query($sql,$params);
	}

	public function jobsStatus($id) {
		$params = [
			"id" => $id,
		];
		$result = $this->db->row("SELECT * FROM `jobs` WHERE id = :id", $params);
		if ($result[0]["status"] == 'active') 
			$params['status'] = 'deactive';
		else 
			$params['status'] = 'active';
		$this->db->query("UPDATE jobs SET status = :status WHERE id = :id", $params);
	}

	public function jobsHot($id) {
		$params = [
			"id" => $id,
		];
		$result = $this->db->row("SELECT * FROM `jobs` WHERE id = :id", $params);
		if ($result[0]["hot"] == 'show') $params['hot'] = 'hide';
		else $params['hot'] = 'show';
		$this->db->query("UPDATE jobs SET hot = :hot WHERE id = :id", $params);
	}

	public function jobsHotAmount() {
		$params = [
			"hot" => 'show',
		];
		return count($this->db->row("SELECT * FROM `jobs` WHERE hot = :hot",$params));
	}

	public function isExists($table,$key,$val) {
		$params = [
			$key => $val,
		];
		return $this->db->column("SELECT id FROM $table WHERE $key = :$key", $params);
	}

	public function dataPost($id,$table) {
		$params = [
			"id" => (int) $id,
		];
		return $this->db->row("SELECT * FROM $table WHERE id = :id",$params);
	}
	
	public function dataList($table) {
		return $this->db->row("SELECT * FROM $table ORDER BY id ASC");
	}

	public function deletePost($id,$table) {
		$params = [
			"id" => $id,
		];
		$this->db->query("DELETE FROM $table WHERE id = :id", $params);
		unlink("public/images/$table/$id.jpg");
	}

	public function UploadImage($path, $folder, $id) {
		move_uploaded_file($path,"public/images/$folder/$id.jpg");
	}

	public function newsValidate($post, $type) {
		$nameLen = iconv_strlen($post['name']);
		$urlLen = iconv_strlen($post['url']);
		$descLen = iconv_strlen($post['description']);
		if ($nameLen < 3 or $nameLen > 100) {
			$this->error = 'Название должно содержать от 3 до 100 символов';
			return false;
		} elseif ($urlLen < 5 or $urlLen > 30) {
			$this->error = 'URL должен содержать от 5 до 30 символов';
			return false;
		} elseif (empty($post["text"])) {
			$this->error = 'Введите текст новости';
			return false;
		} elseif ($descLen < 30 or $descLen > 250) {
			$this->error = 'Описание должно содержать от 30 до 250 символов';
			return false;
		} elseif (empty($post["source"])) {
			$this->error = 'Введите источник';
			return false;
		}
		if (empty($_FILES['img']['tmp_name']) and $type == 'add') {
			$this->error = 'Изображение не выбрано';
			return false;
		}
		return true;
	}

	public function newsAdd($post) {
		$params = [
			'name' => $post["name"],
			'url' => $post["url"],
			'text' => $post["text"],
			'description' => $post["description"],
			'source' => $post["source"],
		];
		$sql = "INSERT INTO news (name, url, text, description, source) VALUES (:name, :url, :text, :description, :source)";
		$this->db->query($sql,$params);
		return $this->db->lastInsertId();
	}

	public function newsEdit($post,$id) {
		$params = [
			'id' => $id,
			'name' => $post["name"],
			'url' => $post["url"],
			'text' => $post["text"],
			'description' => $post["description"],
			'source' => $post["source"],
		];
		$sql = "UPDATE news SET name = :name, url = :url, text = :text, source = :source, description = :description WHERE id = :id";
		$this->db->query($sql,$params);
	}
}