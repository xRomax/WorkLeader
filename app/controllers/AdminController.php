<?php

namespace app\controllers;

use app\core\Controller;

class AdminController extends Controller {

	public function __construct($route) {
		parent::__construct($route);
		$this->view->template = 'admin';
		$this->checkAuthorization();
	}

	public function mainAction() {
		$this->view->render();
	}

	public function loginAction() {
		if (isset($_SESSION['admin'])) $this->view->redirect('admin');
		if (!empty($_POST)) {
			if (!$this->model->loginValidate($_POST)) {
				$this->view->message('error', $this->model->error, 'Ошибка');
			}
			$_SESSION['admin'] = true;
			$this->view->location('admin');
		}
		
		$this->view->render();
	}
	public function logoutAction() {
		unset($_SESSION['admin']);
		$this->view->redirect('admin/login');
	}

	public function checkAuthorization() {
		if ($this->route["action"] != 'login') {
			if (empty($_SESSION["admin"])) $this->view->redirect('admin/login');
		}
	}

	public function jobsListAction() {
		$this->view->render();
	}
	public function jobsAddAction() {
		$this->view->render();
	}
	public function jobsEditAction() {
		$this->view->render();
	}
}