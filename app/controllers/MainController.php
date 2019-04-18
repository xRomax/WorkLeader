<?php

namespace app\controllers;

use app\core\Controller;

class MainController extends Controller {

	public function indexAction() {
		$this->contactAction();
		$this->view->render();
	}

	public function jobsListAction() {
		if (array_key_exists('page',$this->route)) {
			$page = (int) $this->route["page"];
		} else $page = 1;
		$vars = [
			'pagination' => $this->model->pagination($page),
			'list' => $this->model->jobsList($page),
		];
		$this->contactAction();
		$this->view->render($vars);
	}

	public function jobAction() {
		if (!$this->model->isJobExists('jobs','url',$this->route['url'])) {
			$this->view->errorCode(404);
		}
		$vars = [
			'data' => $this->model->jobData($this->route['url']),
		];
		$this->contactAction();
		$this->view->render($vars);
	}

	public function aboutAction() {
		$this->contactAction();
		$this->view->render();
	}

	public function newsAction() {
		$this->contactAction();
		$this->view->render();
	}
	
	public function servicesAction() {
		$this->contactAction();
		$this->view->render();
	}

	public function contactAction() {
		if (!empty($_POST)) {
			if (!$this->model->contactValidate($_POST)) {
				$this->view->message('error', $this->model->error, 'Упс. Что то не так');
			}
			mail('romadeamon@gmail.com', $this->model->messageTitle, $this->model->messageBody);
			$this->view->message('success', 'Сообщение отправлено Администратору', 'Отлично!');
		}
	}
}