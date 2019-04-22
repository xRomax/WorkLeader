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

	public function dataList($table, $type) {
		return $this->db->row("SELECT * FROM $table ORDER BY id $type");
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

	public function jobsHot() {
		$params = [
			"hot" => 'show',
		];
		return $this->db->row("SELECT * FROM `jobs` WHERE hot = :hot", $params);
	}

	public function jobsListFilter($page, $get, $type) {
		$params['status'] = 'active';
		extract($this->jobsListFilterCheckType($page,$type));
		if (!empty($params1)) $params = array_merge($params, $params1);

		extract($this->jobsListFilterCountry($get));
		if (!empty($params2)) $params = array_merge($params, $params2);

		extract($this->jobsListFilterSalary($get));
		if (!empty($params3)) $params = array_merge($params, $params3);

		$sql = "SELECT * FROM jobs WHERE status = :status $salary $country_filter ORDER BY id ASC $limit";
		return $this->db->row($sql, $params);
	}
	
	public function jobsListFilterCheckType($page, $type) {
		if ($type == 'limit') {
			$step = 5; $position = --$page * $step;
			$limit = 'LIMIT :position, :step';
			$params['position'] = (int) $position;
			$params['step'] = (int) $step;
		} else if ($type == 'count') {
			$limit = '';
			$params = [];
		}
		return array('params1' => $params, 'limit' => $limit);
	}

	public function jobsListFilterCountry($get) {
		$country_filter = ''; $params = [];
		if (!empty($get['country'])) {
			$country_filter = 'and ('; $i = 1;
			foreach($get['country'] as $value) {
				$params["country$i"] = $value;
				$country_filter .= "country = :country$i or "; 
				$i++;
			}
			$country_filter = substr($country_filter,0,-4);
			$country_filter .= ')';
		}
		return array('params2' => $params, 'country_filter' => $country_filter);
	}

	public function jobsListFilterSalary($get) {
		$salary = ''; $params = [];
		if (!empty($get['min']) and !empty($get['max'])) {
			$params['min'] = (int) $get['min'];
			$params['max'] = (int) $get['max'];
			$salary = 'and (salary >= :min and salary <= :max)';
		}
		return array('params3' => $params, 'salary' => $salary);
	}

	public function pagination($page,$get) {
		extract($this->paginationFilter($page,$get));
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

	public function paginationFilter($page, $get) {
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
			$count = count($this->jobsListFilter($page,$get,'count'));
		} else {
			$filter = NULL;
			$count = $this->db->query("SELECT * FROM jobs WHERE status = 'active'")->rowCount();
		}
		return array('filter' => $filter, 'count' => $count);
	}

	public function getSalary () {
		$min = 99999999999999;
		$max = 0;
		$result = $this->db->row("SELECT * FROM jobs WHERE status = 'active'");
		foreach ($result as $key => $value) {
			if ($value['salary'] < $min) $min = $value['salary'];
		}
		foreach ($result as $key => $value) {
			if ($value['salary'] > $max) $max = $value['salary'];
		}
		return array('max' => $max, 'min' => $min);
	}

}
?>