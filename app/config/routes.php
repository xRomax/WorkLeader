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
	'jobs' => [
		'controller' => 'main',
		'action' => 'jobs',
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