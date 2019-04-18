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
		'action' => 'news',
		'path' => 'main/news'
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
		'path' => 'main/jobs'
	],
	'jobs/{url:\D+}' => [
		'controller' => 'main',
		'action' => 'job',
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
	'logout' => [
		'controller' => 'admin',
		'action' => 'logout',
		'path' => 'admin/logout'
	],
	'admin/jobsList' => [
		'controller' => 'admin',
		'action' => 'jobsList',
		'path' => 'admin/jobsList'
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
		'path' => 'admin/jobsDelete'
	],
];