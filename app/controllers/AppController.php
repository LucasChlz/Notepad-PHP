<?php

namespace App\Controllers;

use League\Plates\Engine;

class AppController
{

    public $router;
    public $template;

    public function __construct($router)
    {
        $this->router = $router;
        $this->template = Engine::create('public/views/', 'php');
    }

    public function newUser()
    {
        echo $this->template->render('newUser');
    }
}