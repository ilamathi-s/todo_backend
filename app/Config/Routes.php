<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->match(['GET', 'POST'], '/', 'Task_controller::index');
$routes->put('update/(:num)','Task_controller::update/$1');
$routes->put('update/(:num)','Task_controller::update/$1');
$routes->delete('delete/(:num)','Task_controller::delete/$1');
$routes->options('(:any)', function() {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    http_response_code(200);
    exit();
});
