<?php

namespace app\models;

use app\core\Model;

class Admin extends Model {

  public $error;

  public function loginValidate($post) {
		$config = require 'app/config/admin.php';
		if ($config['login'] != $post['login'] or $config['password'] != $post['password']) {
			$this->error = 'pass or login wrong!';
			return false;
		}
		return true;
	}
}