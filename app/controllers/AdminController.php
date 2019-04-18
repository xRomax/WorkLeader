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
		$vars = [
			'pagination' => '',
			'list' => $this->model->jobsList($this->route),
		];
		$this->view->render($vars);
	}

	public function jobsAddAction() {
		if (!empty($_POST)) {
			if (!$this->model->jobsValidate($_POST,'add')) {
				$this->view->message('error', $this->model->error, 'Ошибка!');
			}
			$id = $this->model->jobsAdd($_POST);
			if (!$id)	{ 
				$this->view->message('success', 'Ошибка обработки запроса', 'Ошибка!');
			}
			$this->model->jobsUploadImage($_FILES['img']['tmp_name'], $id);
			$this->view->location('admin/jobsList');
			// $this->view->message('success','Вакансия добавлена','Успешно!');
		}
		$this->view->render();
	}

	public function jobsEditAction() {
		if (!$this->model->isJobsExists('jobs','id',$this->route['id'])) {
			$this->view->errorCode(404);
		}
		if (!empty($_POST)) {
			if (!$this->model->jobsValidate($_POST,'edit')) {
				$this->view->message('error', $this->model->error, 'Ошибка!');
			}
			if ($_FILES['img']['tmp_name']) {
				$this->model->jobsUploadImage($_FILES['img']['tmp_name'], $this->route['id']);
			}
			$this->model->jobsEdit($_POST,$this->route['id']);
			$this->view->location('admin/jobsList');
			// $this->view->message('success', 'Новые данные сохранены','Успешно!');
		}
		$vars = [
			'data' => $this->model->jobsData($this->route['id'])[0],
		];
		$this->view->render($vars);
	}

	public function jobsDeleteAction() {
		if (!$this->model->isJobsExists('jobs','id',$this->route['id'])) {
			$this->view->errorCode(404);
		}
		$this->model->jobsDelete($this->route['id']);
		$this->view->redirect('admin/jobsList');
	}

	public function jobsStatusAction() {
		$this->model->jobsStatus($this->route['id']);
		$this->view->redirect('admin/jobsList');
	}
}