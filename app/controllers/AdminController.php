<?php

namespace app\controllers;

use app\core\Controller;

class AdminController extends Controller {

	public $reviewsPage;

	public function __construct($route) {
		parent::__construct($route);
		$this->view->template = 'admin';
		$this->checkAuthorization();
	}

	public function mainAction() {
		$this->view->render();
	}

	public function loginAction() {
		if (isset($_SESSION['admin'])) $this->view->redirect('admin/jobsList');
		if (!empty($_POST)) {
			if (!$this->model->loginValidate($_POST)) {
				$this->view->message('error', $this->model->error, 'Ошибка');
			}
			$_SESSION['admin'] = true;
			$this->view->location('admin/jobsList');
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
			'list' => $this->model->dataList('jobs'),
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
			$this->model->UploadImage($_FILES['img']['tmp_name'], 'jobs', $id);
			$this->view->location('admin/jobsList');
		}
		$this->view->render();
	}

	public function jobsEditAction() {
		if (!$this->model->isExists('jobs','id',$this->route['id'])) {
			$this->view->errorCode(404);
		}
		if (!empty($_POST)) {
			if (!$this->model->jobsValidate($_POST,'edit')) {
				$this->view->message('error', $this->model->error, 'Ошибка!');
			}
			if ($_FILES['img']['tmp_name']) {
				$this->model->UploadImage($_FILES['img']['tmp_name'], 'jobs', $this->route['id']);
			}
			$this->model->jobsEdit($_POST,$this->route['id']);
			$this->view->location('admin/jobsList');
		}
		$vars = [
			'data' => $this->model->dataPost($this->route['id'],'jobs')[0],
		];
		$this->view->render($vars);
	}

	public function jobsDeleteAction() {
		if (!$this->model->isExists('jobs','id',$this->route['id'])) {
			$this->view->errorCode(404);
		}
		$this->model->deletePost($this->route['id'],'jobs');
		$this->view->redirect('admin/jobsList');
	}

	public function jobsStatusAction() {
		$this->model->jobsStatus($this->route['id']);
		$this->view->redirect('admin/jobsList');
	}

	public function jobsHotAction() {
		if (array_key_exists('id',$this->route)) {
			$this->model->jobsHot($this->route['id']);
			$this->view->redirect('admin/jobsHot');
		} else {
			$vars = [
				'amount' => $this->model->jobsHotAmount(),
				'list' => $this->model->dataList('jobs'),
			];
			$this->view->render($vars);
		}
	}

	public function newsListAction() {
		$vars = [
			'pagination' => '',
			'list' => $this->model->dataList('news'),
		];
		$this->view->render($vars);
	}

	public function newsAddAction() {
		if (!empty($_POST)) {
			if (!$this->model->newsValidate($_POST,'add')) {
				$this->view->message('error', $this->model->error, 'Ошибка!');
			}
			$id = $this->model->newsAdd($_POST);
			if (!$id)	{ 
				$this->view->message('success', 'Ошибка обработки запроса', 'Ошибка!');
			}
			$this->model->UploadImage($_FILES['img']['tmp_name'], 'news', $id);
			$this->view->location('admin/newsList');
		}
		$this->view->render();
	}

	public function newsEditAction() {
		if (!$this->model->isExists('news','id',$this->route['id'])) {
			$this->view->errorCode(404);
		}
		if (!empty($_POST)) {
			if (!$this->model->newsValidate($_POST,'edit')) {
				$this->view->message('error', $this->model->error, 'Ошибка!');
			}
			if ($_FILES['img']['tmp_name']) {
				$this->model->UploadImage($_FILES['img']['tmp_name'], 'news', $this->route['id']);
			}
			$this->model->newsEdit($_POST,$this->route['id']);
			$this->view->location('admin/newsList');
		}
		$vars = [
			'data' => $this->model->dataPost($this->route['id'],'news')[0],
		];
		$this->view->render($vars);
	}

	public function newsDeleteAction() {
		if (!$this->model->isExists('news','id',$this->route['id'])) {
			$this->view->errorCode(404);
		}
		$this->model->deletePost($this->route['id'],'news');
		$this->view->redirect('admin/newsList');
	}

	public function currencyAction() {
		$currencyUAH = $this->model->getCurrency('https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?json','currencyUAH.json');
		foreach ($currencyUAH as $key => $value ) {
			if ($value->cc == 'EUR') $currencyUAH = $value;
		}
		$vars = [
			'currency' => $this->model->getCurrency('https://api.exchangeratesapi.io/latest','currency.json')->rates,
			'currencyUAH' => $currencyUAH,
		];
		$this->view->render($vars);
	}

	public function reviewsModerationListAction() {
		$vars = [
			'list' => $this->model->reviewsList('moderation'),
		];
		$this->view->render($vars);
	}
	
	public function reviewsModerationDataAction() {
		if (!$this->model->isExists('jobs','id',$this->route['id'])) {
			$this->view->errorCode(404);
		}

		if (!empty($_POST)) {
			if (!$this->model->reviewsValidate($_POST)) {
				$this->view->message('error', $this->model->error, 'Ошибка!');
			}
			if ($_FILES['img']['tmp_name']) {
				$this->model->UploadImage($_FILES['img']['tmp_name'], 'reviews', $this->route['id']);
			}
			$this->model->reviewsModeration($_POST,$this->route['id']);
			$this->view->location('admin/reviewsModerationList');
		}
		$vars = [
			'data' => $this->model->dataPost($this->route['id'],'reviews')[0],
		];
		$this->view->render($vars);
	}

	public function reviewsListAction() {
		$vars = [
			'amount' => $this->model->reviewsDisplayAmount(),
			'list' => $this->model->reviewsList('active'),
		];
		$this->view->render($vars);
	}

	public function reviewsDisplayAction() {
		$this->model->reviewsDisplay($this->route['id']);
		$this->view->redirect('admin/reviewsList');
	}

	public function reviewsDeleteAction() {
		if (!$this->model->isExists('reviews','id',$this->route['id'])) {
			$this->view->errorCode(404);
		} else {
			$this->model->deletePost($this->route['id'],'reviews');
			$this->view->redirect('admin/reviewsModerationList');
		}
	}

	public function reviewsDelAction() {
		if (!$this->model->isExists('reviews','id',$this->route['id'])) {
			$this->view->errorCode(404);
		} else {
			$this->model->deletePost($this->route['id'],'reviews');
			$this->view->redirect('admin/reviewsList');
		}
	}

	public function articlesListAction() {
		$vars = [
			'pagination' => '',
			'list' => $this->model->dataList('articles'),
		];
		$this->view->render($vars);
	}

	public function articlesViewAction() {
		$vars = [
			'pagination' => '',
			'data' => $this->model->dataPost($this->route['id'], 'articles')[0],
		];
		$this->view->render($vars);
	}

	public function articlesAddAction() {
		if (!empty($_POST)) {
			if (!isset($_POST['recommend'])) {
				$_POST['recommend'] = NULL;
			}
			// var_dump($_POST);exit;
			if (!$this->model->articlesValidate($_POST,'add')) {
				$this->view->message('error', $this->model->error, 'Ошибка!');
			}
			$id = $this->model->articlesAdd($_POST);
			if (!$id)	{ 
				$this->view->message('success', 'Ошибка обработки запроса', 'Ошибка!');
			}
			$this->model->UploadImage($_FILES['img']['tmp_name'], 'articles', $id);
			$this->view->location('admin/articlesList');
		}
		$vars = [
			'list' => $this->model->dataList('articles')
		];
		$this->view->render($vars);
	}

	public function articlesEditAction() {
		if (!$this->model->isExists('articles','id',$this->route['id'])) {
			$this->view->errorCode(404);
		}
		if (!empty($_POST)) {
			if (!isset($_POST['recommend'])) {
				$_POST['recommend'] = NULL;
			}
			// var_dump($_POST);exit;
			if (!$this->model->articlesValidate($_POST, 'edit')) {
				$this->view->message('error', $this->model->error, 'Ошибка!');
			}
			if ($_FILES['img']['tmp_name']) {
				$this->model->UploadImage($_FILES['img']['tmp_name'], 'articles', $this->route['id']);
			}
			$this->model->articlesEdit($_POST,$this->route['id']);
			$this->view->location('admin/articlesList');
		}
		
		$data = $this->model->dataPost($this->route['id'],'articles')[0];
		$recommend = json_decode($data['recommend']);

		$vars = [
			'data' => $data,
			'list' => $this->model->dataList('articles'),
			'recommend' => $recommend
		];
		$this->view->render($vars);
	}

	public function articlesDeleteAction() {
		if (!$this->model->isExists('articles','id',$this->route['id'])) {
			$this->view->errorCode(404);
		} else {
			$this->model->deletePost($this->route['id'],'articles');
			$this->view->redirect('admin/articlesList');
		}
	}
}