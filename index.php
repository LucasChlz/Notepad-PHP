<?php

require "./vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(URL);
$router->namespace('App\Controllers');

$router->group('/');
$router->get('/', 'AppController:homeNote', 'homeNote');
$router->get('/error', 'AppController:errorPage', 'errorNote');
$router->get('/logout', 'AppController:logoutUser', 'logoutNote');

$router->group('/notes');
$router->get('/create', 'NotesController:createNote', 'createNote');
$router->post('/create', 'NotesController:createNotePost', 'createNotePost');
$router->get('/view/{id}', 'NotesController:viewNote', 'viewNote');
$router->post('/edit/{id}', 'NotesController:editNote', 'editNote');
$router->get('/delete/{id}', 'NotesController:noteDelete', 'deleteNote');

$router->group('/new');
$router->get('/', 'AppController:newUser', 'newUserPage');
$router->post('/', 'AppController:newUserPost', 'newUserPost');

$router->group('/login');
$router->get('/', 'AppController:loginUserPage', 'loginUserPage');
$router->post('/', 'AppController:loginUserPost', 'loginUserPost');

$router->dispatch();

if ($router->error()) {
    $router->redirect("errorNote");
};