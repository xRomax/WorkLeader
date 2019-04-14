<?php

namespace app\controllers;

use app\core\Controller;

class MainController extends Controller {

	public function indexAction() {
		$this->contactAction();
		$this->view->render();
	}

	public function jobsAction() {
		$this->contactAction();
		$this->view->render();
	}

	public function jobsMedAction() {
		$this->contactAction();
		$this->view->render();
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