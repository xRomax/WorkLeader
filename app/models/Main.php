<?php

namespace app\models;

use app\core\Model;

class Main extends Model {

	public $error;
	public $messageTitle;
	public $messageBody;

	public function contactValidate() {
		$this->error = "Непредвиденная ошибка";

		switch($_POST["type"]) {
			case "modalForm": 
				if ($this->contactModalForm()) return true;
			break;
			case "sideForm":
				if ($this->contactSideForm()) return true;
			break;
			case "bottomForm":
				if ($this->contactBottomForm()) return true;
			break;
		}
	}

	public function contactModalForm() {
		$nameLen = iconv_strlen($_POST['name']);
		$textLen = iconv_strlen($_POST['text']);
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
		$this->messageBody = "Имя клиента:".$_POST["name"]."\nТелефон:".$_POST["phone"]."\nСообщение: ".$_POST["text"];
		return true;
	}

	public function contactSideForm() {
		$nameLen = iconv_strlen($_POST['name']);
		if ($nameLen < 3 or $nameLen > 25) {
			$this->error = 'Имя должно содержать от 3 до 25 символов';
			return false;
		} elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$this->error = 'E-mail указан неверно';
			return false;
		} elseif (!$_POST["phone"]) {
			$this->error = 'Телефон указан неверно';
			return false;
		}
		$this->messageTitle = "Заказ консультации | Сообщение из сайта";
		$this->messageBody = "Имя клиента:".$_POST["name"]."\nПочта:".$_POST["email"]."\nТелефон: ".$_POST["phone"];
		return true;
	}

	public function contactBottomForm() {
		$nameLen = iconv_strlen($_POST['name']);
		if ($nameLen < 3 or $nameLen > 25) {
			$this->error = 'Имя должно содержать от 3 до 25 символов';
			return false;
		} elseif (!$_POST["phone"]) {
			$this->error = 'Телефон указан неверно';
			return false;
		}
		$this->messageTitle = "Заказ срочного звонка | Сообщение из сайта";
		$this->messageBody = "Имя клиента:".$_POST["name"]."\nТелефон:".$_POST["phone"];
		return true;
	}

}

?>