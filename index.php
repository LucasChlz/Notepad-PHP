<?php

require __DIR__."/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(URL);
$router->namespace('App\Controllers');

$router->group('/');
$router->get('/', 'AppController:homeNote', 'homeNote');
$router->get('/logout', 'AppController:logoutUser', 'logoutNote');

$router->group('/notes');
$router->get('/create', 'NotesController:createNote', 'createNote');
$router->post('/create', 'NotesController:createNotePost', 'createNotePost');
$router->get('/delete/{id}', 'NotesController:noteDelete', 'deletePost');

$router->group('/new');
$router->get('/', 'AppController:newUser', 'newUserPage');
$router->post('/', 'AppController:newUserPost', 'newUserPost');

$router->group('/login');
$router->get('/', 'AppController:loginUserPage', 'loginUserPage');
$router->post('/', 'AppController:loginUserPost', 'loginUserPost');

$router->dispatch();