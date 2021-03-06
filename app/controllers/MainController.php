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
			'reviews' => $this->model->reviewsList(),
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
			'pagination' => $this->model->pagination($page,$_GET,'jobs'),
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

	public function reviewsAction() {
		if (!empty($_POST)) {
			if (!$this->model->reviewsValidate($_POST)) {
				$this->view->message('error', $this->model->error, 'Упс. Что то не так');
			}
			$id = $this->model->addReview($_POST);
			$this->model->UploadImage($_FILES['image']['tmp_name'], 'reviews', $id);
			$this->view->message('success', 'Отзыв отправлен на модерацию', 'Спасибо за вашу оценку!');
		}
		$vars = [
			'list' => $this->model->reviewsListMain(),
		];
		$this->view->render($vars);
	}

	public function contactAction() {
		if (!empty($_POST["type"])) {
			if (!$this->model->contactValidate($_POST)) {
				$this->view->message('error', $this->model->error, 'Упс. Что то не так');
			}
			mail('workleadereurope@gmail.com', $this->model->messageTitle, $this->model->messageBody);
			$this->view->message('success', 'Сообщение отправлено Администратору', 'Отлично!');
			$this->model->addClient($_POST);
		}
	}

	public function articlesListAction() {
		$page = array_key_exists('page', $this->route) ? $page = (int) $this->route["page"] : 1;

		$vars = [
			'pagination' => $this->model->pagination($page, $_GET, 'articles', 4),
			'list' => $this->model->articlesList($page),
		];
		$this->view->render($vars);
	}

	public function articleDataAction() {
		$data = $this->model->dataPost($this->route['url'],'articles')[0];
		$recommend = json_decode($data['recommend']);

		$vars = [
			'data' => $data,
			'list' => $this->model->dataList('articles', 'ASC'),
			'recommend' => $recommend
		];
		$this->view->render($vars);
	}

}