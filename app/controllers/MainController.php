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

	public function servicesFindJobAction() {
		$this->contactAction();
		$this->view->render();
	}

	public function servicesJobInPolAction() {
		$this->contactAction();
		$this->view->render();
	}

	public function servicesOpenCompAction() {
		$this->contactAction();
		$this->view->render();
	}

	public function contactAction() {
		if (!empty($_POST)) {
			if (!$this->model->contactValidate($_POST)) {
				$this->view->message('error', $this->model->error);
			}
			$this->view->message('success', 'Сообщение отправлено Администратору');
			mail('workleader0@gmail.com', $this->model->messageTitle, $this->model->messageBody);
			
		}
	}

}