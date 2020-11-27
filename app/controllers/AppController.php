<?php

namespace App\Controllers;

use Exception;
use League\Plates\Engine;

class AppController
{

    public $router;
    public $template;
    public $userModel;

    public function __construct($router)
    {
        $this->router = $router;
        $this->userModel = new \App\Models\UserModel;
        $this->template = Engine::create('public/views/', 'php');
    }

    public function newUser()
    {
        echo $this->template->render('newUser');
    }

    public function newUserPost($data)
    {
        $nickname = $data['nickname'];
        $email = $data['email'];
        $password = $data['password'];

        try{
            $this->userModel->registerNewUser($nickname,$email,$password);
        } catch(Exception $e) {
            echo $e->getMessage();  
        }
    }
}