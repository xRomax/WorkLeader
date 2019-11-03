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
	'reviews' => [
		'controller' => 'main',
		'action' => 'reviews',
		'path' => 'main/reviews'
	],
	'articles' => [
		'controller' => 'main',
		'action' => 'articles',
		'path' => 'main/articles'
	],
	// 'articles/{page:\d+}' => [
	// 	'controller' => 'main',
	// 	'action' => 'articles',
	// 	'path' => 'main/articles'
	// ],
	// 'articles/{url:\D+}' => [
	// 	'controller' => 'main',
	// 	'action' => 'article',
	// 	'path' => 'main/article'
	// ],
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
	'admin/reviewsModerationList' => [
		'controller' => 'admin',
		'action' => 'reviewsModerationList',
		'path' => 'admin/reviewsModerationList'
	],
	'admin/reviewsModerationData/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'reviewsModerationData',
		'path' => 'admin/reviewsModerationData'
	],
	'admin/reviewsDisplay/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'reviewsDisplay',
		'path' => ''
	],
	'admin/reviewsList' => [
		'controller' => 'admin',
		'action' => 'reviewsList',
		'path' => 'admin/reviewsList'
	],
	'admin/reviewsDelete/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'reviewsDelete',
		'path' => ''
	],
	'admin/reviewsDel/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'reviewsDel',
		'path' => ''
	],

	'admin/articlesList' => [
		'controller' => 'admin',
		'action' => 'articlesList',
		'path' => 'admin/articlesList'
	],
	'admin/articlesAdd' => [
		'controller' => 'admin',
		'action' => 'articlesAdd',
		'path' => 'admin/articlessAdd'
	],
	'admin/articlesEdit/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'articlesEdit',
		'path' => 'admin/articlesEdit'
	],
	'admin/articlesDelete/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'articlesDelete',
		'path' => ''
	],
];