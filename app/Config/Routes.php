<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Users;



/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('users/register', [Users::class, 'register']);
$routes->post('users', [Users::class, 'createUser']);
$routes->get('users/login', [Users::class, 'login']);
$routes->post('users/login', [Users::class, 'processLogin']);
$routes->get('users/userDetails', [Users::class, 'userDetails']);
$routes->post('users/saveDetails', [Users::class, 'saveDetails']);
$routes->post('users/logout', [Users::class, 'logout']);
$routes->get('users/userDetailsList',[Users::class, 'userDetailsList']);



