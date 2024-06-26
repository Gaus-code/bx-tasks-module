<?php

use Bitrix\Main\Routing\Controllers\PublicPageController;
use Bitrix\Main\Routing\RoutingConfigurator;

return function (RoutingConfigurator $routes) {

	$routes->get('/', new PublicPageController('/local/modules/up.tasks/views/tasks-list.php'));
	$routes->get('/tasks/', new PublicPageController('/local/modules/up.tasks/views/tasks-list.php'));
	$routes->get('/tasks/create/', new PublicPageController('/local/modules/up.tasks/views/tasks-create.php'));

	$routes->post('/tasks/', new PublicPageController('/local/modules/up.tasks/views/tasks-list.php'));
	$routes->post('/', new PublicPageController('/local/modules/up.tasks/views/tasks-list.php'));
	$routes->post('/tasks/create/', new PublicPageController('/local/modules/up.tasks/views/tasks-create.php'));
};