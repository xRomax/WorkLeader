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

		if (empty($_GET)) $list = $this->model->jobsList($page);
		else $list = $this->model->jobsListFilter($page,$_GET,'limit');

		$currencyUAH = $this->model->getCurrency('https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?json','currencyUAH.json');
		foreach ($currencyUAH as $key => $value ) {
			if ($value->cc == 'EUR') $currencyUAH = $value;
		}

		$vars = [
			'pagination' => $this->model->pagination($page,$_GET),
			'salary' => $this->model->getSalary(),
			'list' => $list,
			'currency' => $this->model->getCurrency('https://api.exchangeratesapi.io/latest','currency.json')->rates,
			'currencyUAH' => $currencyUAH,
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
			'list' => $this->model->dataList('news','DESC'),
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
			mail('workleadereurope@gmail.com', $this->model->messageTitle, $this->model->messageBody);
			$this->view->message('success', 'Сообщение отправлено Администратору', 'Отлично!');
			$this->model->addClient($_POST);
		}
	}
}