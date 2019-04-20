<?php

namespace app\controllers;

use app\core\Controller;

class MainController extends Controller {

	public function __construct($route) {
		parent::__construct($route);
		$this->contactAction();
	}

	public function indexAction() {
		$vars = [
			'hot' => $this->model->jobsHot(),
		];
		$this->view->render($vars);
	}

	public function jobsListAction() {
		if (array_key_exists('page',$this->route)) {
			$page = (int) $this->route["page"];
		} else $page = 1;
		$vars = [
			'pagination' => $this->model->pagination($page),
			'list' => $this->model->jobsList($page),
		];
		$this->view->render($vars);
	}

	public function jobDataAction() {
		if (!$this->model->isJobExists('jobs','url',$this->route['url'])) {
			$this->view->errorCode(404);
		}
		$vars = [
			'data' => $this->model->dataPost($this->route['url'],'jobs')[0],
		];
		$this->view->render($vars);
	}

	public function aboutAction() {
		$this->view->render();
	}

	public function newsListAction() {
		$vars = [
			'list' => $this->model->dataList('news'),
		];
		$this->view->render($vars);
	}

	public function newsDataAction() {
		$vars = [
			'data' => $this->model->dataPost($this->route['url'],'news')[0],
		];
		$this->view->render($vars);
	}
	
	public function servicesAction() {
		$this->view->render();
	}

	public function contactAction() {
		if (!empty($_POST)) {
			if (!$this->model->contactValidate($_POST)) {
				$this->view->message('error', $this->model->error, 'Упс. Что то не так');
			}
			mail('romadeamon@gmail.com', $this->model->messageTitle, $this->model->messageBody);
			$this->view->message('success', 'Сообщение отправлено Администратору', 'Отлично!');
			$this->model->addClient($_POST);
		}
	}
}