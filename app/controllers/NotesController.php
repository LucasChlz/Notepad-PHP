<?php

namespace App\Controllers;

use Exception;
use League\Plates\Engine;

class NotesController
{
    public $template;
    public $router;

    public function __construct($router)
    {
        $this->router = $router;

        if (!isset($_SESSION['loginNote'])) {
            $this->router->redirect('loginUserPage');
        }


        $this->template = Engine::create(
            dirname(__DIR__, 2).'/public/views/', 'php'
        );
    }

    public function createNote()
    {
        echo $this->template->render('notes/create', [
            'router' => $this->router
        ]);
    }
}