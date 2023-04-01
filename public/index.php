<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Travel\Router($_SERVER["REQUEST_URI"]);
$router->get('/', "TravelController@index");
$router->get('/catalogue', "TravelController@showCatalogue");
$router->post('/catalogue', "TravelController@showCatalogue");
$router->get('/confirmation/show/:travel', "TravelController@showConfirmation");
$router->get('/confirmation/show/error/:travel', "TravelController@reservation");
$router->get('/cart', "TravelController@cart");
$router->get('/cart/error', "TravelController@payment");

$router->get('/login/', "UserController@showLogin");
$router->get('/register/', "UserController@showRegister");
$router->get('/logout/', "UserController@logout");
$router->get('/reservation/', "TravelController@reservation");

$router->post('/login/', "UserController@login");
$router->post('/register/', "UserController@register");
$router->post('/reservation/:travel', "TravelController@reservation");
$router->post('/confirmation/add/', "TravelController@addConfirmation");
$router->post('/cart/payment', "TravelController@payment");
$router->post('/confirm/payment', "TravelController@confirmPayment");
$router->post('/confirm/payment', "TravelController@confirmPayment");

$router->get('/admin/', "AdminController@index");
$router->get('/admin/', "AdminController@store");
$router->post('/ajout/', "AdminController@store");

$router->run();
