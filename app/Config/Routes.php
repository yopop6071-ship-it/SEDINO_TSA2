<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('login', 'Auth::index');
$routes->post('login', 'Auth::login');
$routes->get('logout', 'Auth::logout');

$routes->get('/', 'Home::index', ['filter' => 'auth']);
$routes->get('tasks', 'Tasks::index', ['filter' => 'auth']);
$routes->get('profile', 'Profile::index', ['filter' => 'auth']);
$routes->get('about', 'About::index', ['filter' => 'auth']);

$routes->get('tasks/new', 'Tasks::create', ['filter' => 'auth']);
$routes->post('tasks/store', 'Tasks::store', ['filter' => 'auth']);

$routes->get('tasks/edit/(:num)', 'Tasks::edit/$1', ['filter' => 'auth']);
$routes->post('tasks/update/(:num)', 'Tasks::update/$1', ['filter' => 'auth']);

$routes->post('tasks/archive/(:num)', 'Tasks::archive/$1', ['filter' => 'auth']);