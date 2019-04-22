<?php

return [
	// MainController
	'' => [
		'controller' => 'main',
		'action' => 'index',
		'path' => 'main/index'
	],
	'about' => [
		'controller' => 'main',
		'action' => 'about',
		'path' => 'main/about'
	],
	'news' => [
		'controller' => 'main',
		'action' => 'newsList',
		'path' => 'main/newsList'
	],
	'news/{url:\D+}' => [
		'controller' => 'main',
		'action' => 'newsData',
		'path' => 'main/newsData'
	],
	'services' => [
		'controller' => 'main',
		'action' => 'services',
		'path' => 'main/services/services'
	],
	'services/job_in_poland' => [
		'controller' => 'main',
		'action' => 'services',
		'path' => 'main/services/JobInPol'
	],
	'services/find_jobs' => [
		'controller' => 'main',
		'action' => 'services',
		'path' => 'main/services/FindJob'
	],
	'services/open_company' => [
		'controller' => 'main',
		'action' => 'services',
		'path' => 'main/services/OpenComp'
	],
	'jobs' => [
		'controller' => 'main',
		'action' => 'jobsList',
		'path' => 'main/jobs/jobs'
	],
	'jobs/{page:\d+}' => [
		'controller' => 'main',
		'action' => 'jobsList',
		'path' => 'main/jobs/jobs'
	],
	'jobs/{url:\D+}' => [
		'controller' => 'main',
		'action' => 'jobData',
		'path' => 'main/jobs/job'
	],
	// AdminController
	'admin' => [
		'controller' => 'admin',
		'action' => 'main',
		'path' => 'admin/main'
	],
	'admin/login' => [
		'controller' => 'admin',
		'action' => 'login',
		'path' => 'admin/login'
	],
	'admin/logout' => [
		'controller' => 'admin',
		'action' => 'logout',
		'path' => 'admin/logout'
	],
	'admin/jobsList' => [
		'controller' => 'admin',
		'action' => 'jobsList',
		'path' => 'admin/jobsList'
	],
	'admin/jobsHot' => [
		'controller' => 'admin',
		'action' => 'jobsHot',
		'path' => 'admin/jobsHot'
	],
	'admin/jobsHot/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'jobsHot',
		'path' => 'admin/jobsHot'
	],
	'admin/jobsAdd' => [
		'controller' => 'admin',
		'action' => 'jobsAdd',
		'path' => 'admin/jobsAdd'
	],
	'admin/jobsEdit/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'jobsEdit',
		'path' => 'admin/jobsEdit'
	],
	'admin/jobsDelete/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'jobsDelete',
		'path' => ''
	],
	'admin/jobsStatus/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'jobsStatus',
		'path' => ''
	],
	'admin/newsList' => [
		'controller' => 'admin',
		'action' => 'newsList',
		'path' => 'admin/newsList'
	],
	'admin/newsAdd' => [
		'controller' => 'admin',
		'action' => 'newsAdd',
		'path' => 'admin/newsAdd'
	],
	'admin/newsEdit/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'newsEdit',
		'path' => 'admin/newsEdit'
	],
	'admin/newsDelete/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'newsDelete',
		'path' => ''
	],
	'admin/currency' => [
		'controller' => 'admin',
		'action' => 'currency',
		'path' => 'admin/currency'
	],
	'admin/currency/{code:\D+}' => [
		'controller' => 'admin',
		'action' => 'currency',
		'path' => 'admin/currency'
	],
	'admin/reviewsValidate' => [
		'controller' => 'admin',
		'action' => 'main',
		'path' => 'admin/reviewsValidate'
	],
	'admin/reviewsList' => [
		'controller' => 'admin',
		'action' => 'main',
		'path' => 'admin/reviewsList'
	],
];