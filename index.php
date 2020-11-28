<?php

require __DIR__."/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(URL);
$router->namespace('App\Controllers');

$router->group('/');
$router->get('/new', 'AppController:newUser', 'newUserPage');
$router->post('/new', 'AppController:newUserPost', 'newUserPost');

$router->dispatch();