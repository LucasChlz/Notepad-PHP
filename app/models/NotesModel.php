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

    public function createNote($title, $text): void
    {
        if (empty($title)) {
            throw new Exception('You need to add a title to save');
        }

        $insertNote = $this->database->connect()->prepare("INSERT INTO `notes` VALUES (null, ?, ?, ?)");
        if ($insertNote->execute(array($title, $text, $this->token))) {
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
}