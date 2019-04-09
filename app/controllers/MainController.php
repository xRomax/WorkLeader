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
				$this->view->message('error', $this->model->error);
			}
			$this->view->message('success', 'Сообщение отправлено Администратору');
			// mail('romadeamon@gmail.com', 'Сообщение из сайта', $_POST['name'].'|'.$_POST['tel'].'|'.$_POST['text']);
			
		}
	}

}