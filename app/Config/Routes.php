<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Users::index');
$routes->post('users/login', 'Users::login');
$routes->get('rest/get_members', 'Rest::get_members');

$routes->match(['get', 'post'], 'admin/members', 'Admin::listmembers');
