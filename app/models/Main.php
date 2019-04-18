<?php

namespace app\models;

use app\core\Model;

class Main extends Model {

	public $error;
	public $messageTitle;
	public $messageBody;

	public function contactValidate($post) {
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
		} elseif (!$post["phone"]) {
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
		} elseif (!$post["phone"]) {
			$this->error = 'Телефон указан неверно';
			return false;
		}
		$this->messageTitle = "Заказ консультации | Сообщение из сайта";
		$this->messageBody = "Имя клиента:".$post["name"]."\nПочта:".$post["email"]."\nТелефон: ".$post["phone"];
		return true;
	}

	public function contactBottomForm($post) {
		$nameLen = iconv_strlen($post['name']);
		if ($nameLen < 3 or $nameLen > 25) {
			$this->error = 'Имя должно содержать от 3 до 25 символов';
			return false;
		} elseif (!$post["phone"]) {
			$this->error = 'Телефон указан неверно';
			return false;
		}
		$this->messageTitle = "Заказ срочного звонка | Сообщение из сайта";
		$this->messageBody = "Имя клиента:".$post["name"]."\nТелефон:".$post["phone"];
		return true;
	}

	public function isJobExists($table,$url,$val) {
		$params = [
			$url => $val,
		];
		return $this->db->column("SELECT url FROM $table WHERE $url = :$url", $params);
	}

	public function jobData($url){
		$params = [
			"url" => $url,
		];
		return $this->db->row("SELECT * FROM `jobs` WHERE url = :url",$params);
	}

	public function jobsList($page) {
		$step = 5;
		$position = --$page * $step;
		$params = [
			'status' => 'active',
			'position' => (int) $position,
			'step' =>(int) $step
		];
		return $this->db->row('SELECT * FROM `jobs` WHERE status = :status ORDER BY id ASC LIMIT :position, :step', $params);
	}

	public function pagination($page) {
		$left = $page - 1; $right = $page + 1;
		$step = 5;
		$count = $this->countTabs('jobs');
		$amoun_pages = ceil($count / $step);
		$html = '<ul class="pagination center">';
		if ($page == 1) {
			$html .= '<li class="waves-effect waves-teal disabled"><a href="/jobs/'.$page.'"><i class="material-icons">chevron_left</i></a></li>';
		} else {
			$html .= '<li class="waves-effect waves-teal"><a href="/jobs/'.$left.'"><i class="material-icons">chevron_left</i></a></li>';
		}
		for ($i = 1; $i <= $amoun_pages; $i++) {
			if ($i == $page) {
				$html.= '<li class="waves-effect waves-teal active"><a href="/jobs/'.$page.'">'.$page.'</a></li>';
			} else {
				$html.= '<li class="waves-effect waves-teal"><a href="/jobs/'.$i.'">'.$i.'</a></li>';
			}
		}
		if ($page == $amoun_pages) {
			$html .= '<li class="waves-effect waves-teal disabled"><a href="/jobs/'.$page.'"><i class="material-icons">chevron_right</i></a></li>';
		} else {
			$html .= '<li class="waves-effect waves-teal"><a href="/jobs/'.$right.'"><i class="material-icons">chevron_right</i></a></li>';
		}
		return $html;
	}

	public function countTabs($table) {
		$params = [
			'status' => 'active',
		];
		$select = $this->db->query("SELECT * FROM $table WHERE status = :status", $params);
		$count = $select->rowCount();
		return $count;
	}
}
?>