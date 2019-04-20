<?php

namespace app\models;

use app\core\Model;

class Main extends Model {

	public $error;
	public $messageTitle;
	public $messageBody;
	public $page;

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
		if ($nameLen < 3 or $nameLen > 30) {
			$this->error = 'Имя должно содержать от 3 до 30 символов';
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
		if ($nameLen < 3 or $nameLen > 30) {
			$this->error = 'Имя должно содержать от 3 до 30 символов';
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
		if ($nameLen < 3 or $nameLen > 30) {
			$this->error = 'Имя должно содержать от 3 до 30 символов';
			return false;
		} elseif (!$post["phone"]) {
			$this->error = 'Телефон указан неверно';
			return false;
		}
		$this->messageTitle = "Заказ срочного звонка | Сообщение из сайта";
		$this->messageBody = "Имя клиента:".$post["name"]."\nТелефон:".$post["phone"];
		return true;
	}

	public function addClient($post) {
		if ($post["type"] == 'sideForm') {
			$params = [
				'name' => $post['name'],
				'phone' => $post['phone'],
				'email' => $post['email'],
			];
			$sql ="INSERT INTO clients (name, phone, email) VALUES (:name, :phone, :email)";
		} else {
			$params = [
				'name' => $post['name'],
				'phone' => $post['phone'],
			];
			$sql ="INSERT INTO clients (name, phone) VALUES (:name, :phone)";
		}
		$this->db->query($sql,$params);
	}

	public function isJobExists($table,$url,$val) {
		$params = [
			$url => $val,
		];
		return $this->db->column("SELECT url FROM $table WHERE $url = :$url", $params);
	}

	public function dataPost($url, $table){
		$params = [
			"url" => $url,
		];
		return $this->db->row("SELECT * FROM $table WHERE url = :url",$params);
	}

	public function jobsList($page) {
		$step = 5;
		$position = --$page * $step;
		$params = [
			'status' => 'active',
			'position' => (int) $position,
			'step' =>(int) $step
		];
		$sql = "SELECT * FROM jobs WHERE status = :status ORDER BY id ASC LIMIT :position, :step";
		return $this->db->row($sql, $params);
	}

	public function jobsListFilter($page,$get) {
		$step = 5; $position = --$page * $step;
		$params = [
			'status' => 'active',
			'position' => (int) $position,
			'step' => (int) $step,
			'minsalary' => (int) $get['minsalary'],
			'maxsalary' => (int) $get['maxsalary']
		];
		$country_filter = ''; $i = 1;
		if (!empty($get['country'])) {
			$country_filter = 'and (';
			foreach($get['country'] as $value) {
				$params["country$i"] = $value;
				$country_filter .= "country = :country$i or "; 
				$i++;
			}
			$country_filter = substr($country_filter,0,-4);
			$country_filter .= ')';
		}
		$sql = "SELECT * FROM jobs WHERE status = :status and (salary >= :minsalary and salary <= :maxsalary) $country_filter ORDER BY id ASC LIMIT :position, :step";
		return $this->db->row($sql, $params);
	}

	public function jobsListFilterCount($get) {
		$params = [
			'status' => 'active',
			'minsalary' => (int) $get['minsalary'],
			'maxsalary' => (int) $get['maxsalary']
		];
		$country_filter = ''; $i = 1;
		if (!empty($get['country'])) {
			$country_filter = 'and (';
			foreach($get['country'] as $value) {
				$params["country$i"] = $value;
				$country_filter .= "country = :country$i or "; 
				$i++;
			}
			$country_filter = substr($country_filter,0,-4);
			$country_filter .= ')';
		}
		$sql = "SELECT * FROM jobs WHERE status = :status and (salary >= :minsalary and salary <= :maxsalary) $country_filter ORDER BY id ASC";
		return $this->db->row($sql, $params);
	}

	public function pagination($page,$get) {
		if (!empty($get)) {
			$filter = '?';
			foreach ($get as $key => $value) {
				if (is_array($value)) {
					foreach ($value as $val) {
						$filter .= $key.'[]='.$val;
						$filter .= '&';
					}
				} else {
					$filter .= $key.'='.$value;
					$filter .= '&';
				}
			}
			$filter = rtrim($filter,'&');
			$count = (int) count($this->jobsListFilterCount($_GET));
		} else {
			$filter = NULL;
			$count = $this->db->query("SELECT * FROM jobs WHERE status = 'active'")->rowCount();
		}
		$left = $page - 1; $right = $page + 1; $step = 5;
		$amoun_pages = ceil( $count / $step);
		if ($amoun_pages <= 1) return false;
		$html = '<ul class="pagination center">';
		if ($page == 1) {
			$html .= '<li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>';
		} else {
			$html .= '<li class="waves-effect waves-teal"><a href="/jobs/'.$left.$filter.'"><i class="material-icons">chevron_left</i></a></li>';
		}
		for ($i = 1; $i <= $amoun_pages; $i++) {
			if ($i == $page) {
				$html.= '<li class="waves-effect waves-teal active"><a href="/jobs/'.$page.$filter.'">'.$page.'</a></li>';
			} else {
				$html.= '<li class="waves-effect waves-teal"><a href="/jobs/'.$i.$filter.'">'.$i.'</a></li>';
			}
		}
		if ($page == $amoun_pages) {
			$html .= '<li class="disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li>';
		} else {
			$html .= '<li class="waves-effect waves-teal"><a href="/jobs/'.$right.$filter.'"><i class="material-icons">chevron_right</i></a></li>';
		}
		return $html;
	}

	public function jobsHot() {
		$params = [
			"hot" => 'show',
		];
		return $this->db->row("SELECT * FROM `jobs` WHERE hot = :hot", $params);
	}

	public function dataList($table) {
		return $this->db->row("SELECT * FROM $table ORDER BY id ASC");
	}

}
?>