<?php

namespace App\Controllers;

use Exception;
use League\Plates\Engine;

class AppController
{

    public $router;

    public $template;
    public $userModel;
    public $noteModel;
    
    public $sucessMessage;
    public $errorMessage;

    public function __construct($router)
    {
        $this->router = $router;

        $this->userModel = new \App\Models\UserModel;
        $this->noteModel = new \App\Models\NotesModel;

        $this->template = Engine::create(
            dirname(__DIR__, 2).'/public/views/', 'php'
        );
    }

    public function homeNote(): void
    {
        if (!isset($_SESSION['loginNote'])) {
            $this->router->redirect('loginUserPage');
        }

        $listNotes = $this->noteModel->listAllNotes();

        echo $this->template->render('notes/home', [
            'router' => $this->router,
            'error' => $this->errorMessage,
            'notes' => $listNotes
        ]);
    }

    public function newUser(): void
    {
        if (isset($_SESSION['loginNote'])) {
            $this->router->redirect('homeNote');
        }
        
        echo $this->template->render('home/newUser', [
            'router' => $this->router,
            'sucess' => $this->sucessMessage,
            'err' => $this->errorMessage
        ]);
    }

    public function newUserPost($data): void
    {
        $nickname = $data['nickname'];
        $email = $data['email'];
        $password = $data['password'];

        try{
            if ($this->userModel->registerNewUser($nickname, $email, $password)) {
                $this->sucessMessage = 'User sucessfully created';
                $this->newUser();    
            }
        } catch(Exception $e) {
            $this->errorMessage = $e->getMessage();
            $this->newUser();
        }
    }

    public function loginUserPage():void
    {
        if (isset($_SESSION['loginNote'])) {
            $this->router->redirect('homeNote');
        }

        echo $this->template->render('home/loginUser', [
            'router' => $this->router,
            'err' => $this->errorMessage
        ]);
    }

    public function loginUserPost($data): void
    {   
        $email = $data['email'];
        $password = sha1($data['password']);

        try {
            $this->userModel->loginUser($email,$password);
            $this->router->redirect('homeNote');
        } catch(Exception $e) {
            $this->errorMessage = $e->getMessage();
            $this->loginUserPage();
        }
    }

    public function logoutUser(): void
    {
        session_unset();
        session_destroy();
        $this->router->redirect('loginUserPage');
    }
}