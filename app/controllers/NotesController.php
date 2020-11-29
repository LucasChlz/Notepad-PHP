<?php

namespace App\Controllers;

use Exception;
use League\Plates\Engine;

class NotesController
{
    public $notesModel;

    public $template;
    public $router;

    public $sucessMessage;
    public $errorMessage;

    public function __construct($router)
    {
        $this->router = $router;

        if (!isset($_SESSION['loginNote'])) {
            $this->router->redirect('loginUserPage');
        }

        $this->notesModel = new \App\Models\NotesModel;


        $this->template = Engine::create(
            dirname(__DIR__, 2).'/public/views/', 'php'
        );
    }

    public function createNote()
    {
        echo $this->template->render('notes/create', [
            'router' => $this->router,
            'sucess' => $this->sucessMessage,
            'err' => $this->errorMessage
        ]);
    }

    public function createNotePost($data)
    {
        $title = filter_var($data['title'], FILTER_SANITIZE_STRING);
        $text = filter_var($data['text'], FILTER_SANITIZE_STRING);
        $characters = filter_var($data['character'], FILTER_SANITIZE_STRING);

        try {
            $this->notesModel->createNote($title, $text, $characters);
            $this->router->redirect('createNote');
        } catch(Exception $e) {
            $this->errorMessage = $e->getMessage();
            $this->createNote();
        }
    }
}