<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Users::index');
$routes->post('users/login', 'Users::login');
$routes->get('rest/get_members', 'Rest::get_members');

$routes->match(['get', 'post'], 'admin/members', 'Admin::listmembers');
$routes->get('admin/groups', 'Admin::listgroups');
$routes->get('admin/groups/(:num)', 'Admin::listgroups');
$routes->get('admin/group/(:num)', 'Admin::groupdetails/$1');
