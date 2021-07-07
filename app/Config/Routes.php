<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/shop', 'Home::shop');
// $routes->get('/cart', 'Home::cart');
// $routes->get('/wishlist', 'Home::wishlist');
// $routes->get('/checkout', 'Home::checkout');

// $routes->get('/admin', 'Home::admin');

// $routes->get('/user/login', 'UsersController::login');
// $routes->get('/user/register', 'UsersController::register');
// $routes->post('/user/data_register', 'UsersController::data_register');
// $routes->post('/user/data_login', 'UsersController::data_login');
// $routes->get('/user/logout', 'UserController::logout');

$routes->get('/', 'Home::index');
$routes->get('/quotes', 'Home::quotes');
$routes->get('/video', 'Home::video');

$routes->group('user', function ($routes) {
	$routes->get('login', 'UsersController::login');
	$routes->get('register', 'UsersController::register');
	$routes->post('data_register', 'UsersController::data_register');
	$routes->post('data_login', 'UsersController::data_login');
	$routes->get('logout', 'UsersController::logout');
});

$routes->group('buyer', ['filter' => 'auth'], function ($routes) {
    $routes->get('shop', 'ShopController::index');
});

$routes->group('seller', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'AdminController::index');
 	$routes->get('create', 'AdminController::create');
	$routes->get('formCreate', 'AdminController::formCreate');
	$routes->post('save', 'AdminController::save');
	$routes->get('edit/(:num)', 'AdminController::edit/$1');
	$routes->post('update/(:num)', 'AdminController::update/$1');
	$routes->get('delete/(:num)', 'AdminController::delete/$1');

});



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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
