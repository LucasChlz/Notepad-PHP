<?php

namespace App\Controllers;

use Exception;
use League\Plates\Engine;

class AppController
{

    public $router;

    public $template;
    public $userModel;
    
    public $sucessMessage;
    public $errorMessage;

    public function __construct($router)
    {
        $this->router = $router;

        $this->userModel = new \App\Models\UserModel;
        $this->template = Engine::create(
            dirname(__DIR__, 2).'/public/views/', 'php'
        );
    }

    public function newUser(): void
    {
        echo $this->template->render('newUser', [
            'router' => $this->router,
            'sucess' => $this->sucessMessage,
            'err' => $this->errorMessage
        ]);
    }

    public function newUserPost($data)
    {
        $nickname = $data['nickname'];
        $email = $data['email'];
        $password = $data['password'];

        try{
            if ($this->userModel->registerNewUser($nickname, $email, $password)) {
                $this->sucessMessage = 'User sucessfully created';
                return $this->newUser();    
            }
        } catch(Exception $e) {
            $this->errorMessage = $e->getMessage();
            return $this->newUser();
        }
    }
}