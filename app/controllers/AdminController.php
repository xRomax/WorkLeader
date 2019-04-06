<?php

namespace app\controllers;

use app\core\Controller;

class AdminController extends Controller {

	public function __construct($route) {
		parent::__construct($route);
		$this->view->template = 'admin';
	}

	public function mainAction() {
		$this->view->render();
	}
	public function loginAction() {
		$this->view->render();
	}
	public function logoutAction() {
		unset($_SESSION['admin']);
		$this->view->redirect('login');
	}
}