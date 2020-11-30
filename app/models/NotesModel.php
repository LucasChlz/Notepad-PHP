<?php

namespace App\Models;

use Exception;

class NotesModel
{
    private $database;
    private $token;

    public function __construct()
    {
        $this->database = new \App\Database\Sql;
        if (isset($_SESSION['loginNote'])) {
            $this->token = $_SESSION['token'];
        }
    }

    public function createNote(string $title, string $text, string $characters): void
    {
        if (empty($title)) {
            throw new Exception('You need to add a title to save');
        }

        $created_at = date('Y-m-d H:i:s');

        $insertNote = $this->database->connect()->prepare("INSERT INTO `notes` VALUES (null, ?, ?, ?, ?, ?)");
        if ($insertNote->execute(array($title, $text, $characters, $created_at, $this->token))) {
            throw new Exception('Note sucessfully saved');
        };
    }

    public function listAllNotes(): array
    {
        $allNotes = $this->database->connect()->prepare("SELECT * FROM `notes` WHERE user_token = ?");
        $allNotes->execute(array($this->token));

        $fetchNotes = $allNotes->fetchAll();

        return $fetchNotes;
    }

    public function singleNote(int $id): array
    {
        $singleNote = $this->database->connect()->prepare("SELECT * FROM `notes` WHERE id = ? AND user_token = ?");
        $singleNote->execute(array($id, $this->token));
        
        if ($singleNote->rowCount() === 0 ) {
            throw new Exception('This note does not exist');
        } else {
            $singleNote = $singleNote->fetch();
            return $singleNote;
        }
        
    }

    public function editSingleNote(int $id, string $title, string $text, string $characters, $router): void
    {   
        if (empty($title)) {
            throw new Exception('Put a title');
        }

        $verifyId = $this->database->connect()->prepare("SELECT * FROM `notes` WHERE id = ? AND user_token = ?");
        $verifyId->execute(array($id, $this->token));

        if ($verifyId->rowCount() === 0) {
            $router->redirect('errorNote');
        }

        $updateNote = $this->database->connect()->prepare("UPDATE `notes` SET title = ?, text = ?, characters = ? WHERE id = ? AND user_token = ? ");
        $updateNote->execute(array($title, $text, $characters, $id, $this->token));
    }

    public function noteDelete(int $id): void
    {
        $noteDelete = $this->database->connect()->prepare("DELETE FROM `notes` WHERE id = ? AND user_token = ?");
        $noteDelete->execute(array($id, $this->token));
    }
}