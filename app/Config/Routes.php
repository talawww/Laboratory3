<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/home', 'ProductController::home');
$routes->get('/MallDetails/(:any)', 'ProductController::MallDetails/$1');


//l-r
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Users');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);


$routes->get('/', 'Users::index', ['Filter' => 'noauth']);
$routes->get('logout', 'Users::logout');
$routes->match(['get','post'],'register', 'Users::register', ['Filter' => 'noauth']);
$routes->get('home', 'mallhome::index',['Filter' => 'auth']);


//ad
$routes->get('/admin', 'ProductController::admin');
$routes->get('/save', 'ProductController::save');
$routes->get('/delete/(:any)', 'ProductController::delete/$1');
$routes->get('/edit/(:any)', 'ProductController::edit/$1');
