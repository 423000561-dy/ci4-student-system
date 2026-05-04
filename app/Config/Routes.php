<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('students', 'Students::index');
$routes->get('students/new', 'Students::new');
$routes->post('students', 'Students::create');
$routes->get('students/(:num)', 'Students::show/$1');
$routes->get('students/(:num)/edit', 'Students::edit/$1');
$routes->put('students/(:num)', 'Students::update/$1');
$routes->delete('students/(:num)', 'Students::delete/$1');

$routes->resource('api/students', ['controller' => 'Api\\StudentApi']);
