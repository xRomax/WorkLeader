<?php

return [
	// MainController
	'' => [
		'controller' => 'main',
		'action' => 'index',
	],
	'about' => [
		'controller' => 'main',
		'action' => 'about',
	],
	'news' => [
		'controller' => 'main',
		'action' => 'news',
	],
	'services' => [
		'controller' => 'main',
		'action' => 'services',
	],
	'services/job_in_poland' => [
		'controller' => 'main',
		'action' => 'servicesJobInPol',
	],
	'services/find_jobs' => [
		'controller' => 'main',
		'action' => 'servicesFindJob',
	],
	'services/open_company' => [
		'controller' => 'main',
		'action' => 'servicesOpenComp',
	],
	'jobs' => [
		'controller' => 'main',
		'action' => 'jobs',
	],
	'jobs/med_sestra' => [
		'controller' => 'main',
		'action' => 'jobsMed',
	],
	// AdminController
	'admin' => [
		'controller' => 'admin',
		'action' => 'main',
	],
	'admin/login' => [
		'controller' => 'admin',
		'action' => 'login',
	],
	'logout' => [
		'controller' => 'admin',
		'action' => 'logout',
	],
];