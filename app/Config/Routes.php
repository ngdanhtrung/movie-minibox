<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->set404Override(function () {
	return view('errors/html/404');
});
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Pages::index');
$routes->match(['get', 'post'], '/account/(:any)', 'Account::$1');
$routes->get('/default/getSeat/(:any)', 'Movie::getSeats/$1');
$routes->get('/default/booking/confirm/', 'Movie::confirm');
$routes->match(['get', 'post'], '/default/booking/confirm/success', 'Movie::confirmSuccess');
$routes->get('/movie/create', 'Movie::create');
$routes->get('/default/getDate/(:any)', 'Movie::getDate/$1');
$routes->get('/default/booking/(:any)', 'Movie::booking/$1');
$routes->get('/default/(:any)', 'Movie::view/$1');
$routes->post('/handleAjax', 'Pages::handleAjax');
$routes->get('(:any)', 'Pages::showme/$1');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
