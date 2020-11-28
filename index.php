<?php

require __DIR__."/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(URL);
$router->namespace('App\Controllers');

$router->group('/');
$router->get('/', 'AppController:homeNote', 'homeNote');
$router->get('/loggout', 'AppController:loggoutUser', 'loggoutNote');

$router->group('/new');
$router->get('/', 'AppController:newUser', 'newUserPage');
$router->post('/', 'AppController:newUserPost', 'newUserPost');

$router->group('/login');
$router->get('/', 'AppController:loginUserPage', 'loginUserPage');
$router->post('/', 'AppController:loginUserPost', 'loginUserPost');

$router->dispatch();