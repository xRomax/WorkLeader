<?php

namespace app\models;

use app\core\Model;

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
		}
	}
}