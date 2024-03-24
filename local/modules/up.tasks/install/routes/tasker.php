<?php

use Bitrix\Main\Routing\Controllers\PublicPageController;
use Bitrix\Main\Routing\RoutingConfigurator;

return function (RoutingConfigurator $routes) {

	$routes->get('/', new PublicPageController('/local/modules/up.tasks/views/tasks-list.php'));
	$routes->get('/tasks/', new PublicPageController('/local/modules/up.tasks/views/tasks-list.php'));
	$routes->get('/tasks/create/', new PublicPageController('/local/modules/up.tasks/views/tasks-create.php'));
	$routes->get('/tasks/{id}/edit/', new PublicPageController('/local/modules/up.tasks/views/tasks-edit.php'));
	$routes->get('/tasks/{id}/', new PublicPageController('/local/modules/up.tasks/views/tasks-details.php'));

	$routes->post('/tasks/', function () {
		// create new project
	});
	$routes->post('/tasks/{id}/', function () {
		// update existing project
	});
	$routes->post('/tasks/{id}/delete/', function () {
		// delete project
	});

	$routes->post('/tasks/create/status/', function () {
		// handle adding task
		var_dump($_REQUEST);die;
	});
};