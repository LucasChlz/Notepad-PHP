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

    public function createNote($title, $text, $characters): void
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

    public function singleNote($id): array
    {
        $singleNote = $this->database->connect()->prepare("SELECT * FROM `notes` WHERE id = ? AND user_token = ?");
        $singleNote->execute(array($id, $this->token));
        $singleNote = $singleNote->fetch();

        return $singleNote;
    }

    public function noteDelete($id): void
    {
        $noteDelete = $this->database->connect()->prepare("DELETE FROM `notes` WHERE id = ? AND user_token = ?");
        $noteDelete->execute(array($id, $this->token));
    }
}