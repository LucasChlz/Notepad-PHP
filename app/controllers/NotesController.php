<?php

namespace App\Controllers;

use Exception;
use League\Plates\Engine;

class NotesController extends AppController
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


        $this->template = Engine::create('public/views/', 'php'
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

    public function viewNote($data)
    {
        $id = filter_var($data['id'], FILTER_SANITIZE_STRING);

        try {
            $singleNote = $this->notesModel->singleNote($id);
        } catch (Exception $e) {
            $this->errorPage();
        }

        echo $this->template->render('notes/singleNote', [
            'sucess' => $this->sucessMessage,
            'err' => $this->errorMessage,
            'router' => $this->router,
            'note' => $singleNote
        ]);
    }

    public function editNote($data)
    {
        $id = filter_var($data['id'], FILTER_SANITIZE_STRING);
        $title = filter_var($data['title'], FILTER_SANITIZE_STRING);
        $text = filter_var($data['text'], FILTER_SANITIZE_STRING);
        $characters = filter_var($data['character'], FILTER_SANITIZE_STRING);
        
        try {
            $this->notesModel->editSingleNote($id, $title, $text, $characters, $this->router);
            $this->sucessMessage = 'Saved successfully';
            $this->viewNote($data);
        } catch (Exception $e) {
            $this->errorMessage = $e->getMessage();
            $this->viewNote($data); 
        }
      
    }

    public function noteDelete($data)
    {
        $id = filter_var($data['id'], FILTER_SANITIZE_STRING);

        try {
            $this->notesModel->noteDelete($id, $this->router);
            $this->router->redirect('homeNote');
        } catch (Exception $e) {
            $this->errorMessage = $e->getMessage();
            $this->homeNote();
        }
    }
}