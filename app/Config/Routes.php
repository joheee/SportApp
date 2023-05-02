<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

$routes->get('/', 'Home::index', ['as' => 'guest.login']);
$routes->post('/', 'UserController::handleLogin', ['as' => 'guest.handleLogin']);

$routes->get('/register', 'Home::register', ['as' => 'guest.register']);
$routes->post('/register', 'UserController::handleRegister', ['as' => 'guest.handleRegister']);

$routes->get('/logout', 'UserController::handleLogout', ['as' => 'guest.handleLogout']);

$routes->get('/admin-dashboard','AdminController::index',['as' => 'admin.dashboard']);
$routes->get('/admin-transaction','AdminController::transaction',['as' => 'admin.transaction']);

$routes->get('/admin-product','AdminController::insert',['as' => 'admin.insert']);
$routes->post('/admin-product','AdminController::handleInsert',['as' => 'admin.handleInsert']);
$routes->get('/admin-product-delete/(:num)','AdminController::handleDelete/$1',['as' => 'admin.handleDelete']);
$routes->get('/admin-product-update/(:num)','AdminController::update/$1',['as' => 'admin.update']);
$routes->post('/admin-product-update/(:num)','AdminController::handleUpdate/$1',['as' => 'admin.handleUpdate']);

$routes->get('/customer-dashboard','CustomerController::index',['as' => 'customer.dashboard']);
$routes->get('/customer-transaction','CustomerController::transaction',['as' => 'customer.transaction']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
