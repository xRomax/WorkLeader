<?php

namespace app\models;

use app\core\Model;

class Main extends Model {

	public $error;
	public $messageTitle;
	public $messageBody;

	public function contactValidate($post) {
		$this->error = "Какая то ошибка";
		switch($post["type"]) {
			case "modalForm": 
				if ($this->contactModalForm($post)) return true;
			break;
			case "sideForm":
				if ($this->contactSideForm($post)) return true;
			break;
			case "bottomForm":
				if ($this->contactBottomForm($post)) return true;
			break;
		}
	}

	public function contactModalForm($post) {
		$nameLen = iconv_strlen($post['name']);
		$textLen = iconv_strlen($post['text']);
		if ($nameLen < 3 or $nameLen > 20) {
			$this->error = 'Имя должно содержать от 3 до 25 символов';
			return false;
		} elseif (!$_POST["phone"]) {
			$this->error = 'Телефон указан неверно';
			return false;
		} elseif ($textLen < 10 or $textLen > 500) {
			$this->error = 'Сообщение должно содержать от 10 до 500 символов';
			return false;
		}
		$this->messageTitle = "Вопрос от клиента | Сообщение из сайта";
		$this->messageBody = "Имя клиента:".$post["name"]."\nТелефон:".$post["phone"]."\nСообщение: ".$post["text"];
		return true;
	}

	public function contactSideForm($post) {
		$nameLen = iconv_strlen($post['name']);
		if ($nameLen < 3 or $nameLen > 25) {
			$this->error = 'Имя должно содержать от 3 до 25 символов';
			return false;
		} elseif (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
			$this->error = 'E-mail указан неверно';
			return false;
		} elseif (!$_POST["phone"]) {
			$this->error = 'Телефон указан неверно';
			return false;
		}
		$this->messageTitle = "Заказ консультации | Сообщение из сайта";
		$this->messageBody = "Имя клиента:".$post["name"]."\nПочта:".$post["email"]."\nТелефон: ".$post["phone"];
		return true;
	}

	public function contactBottomForm($post) {
		if (!$_POST["phone"]) {
			$this->error = 'Телефон указан неверно';
			return false;
		}
		$this->messageTitle = "Заказ срочного звонка | Сообщение из сайта";
		$this->messageBody = "Телефон:".$post["phone"];
		return true;
	}

}

?>