<?php

namespace App\Models;

use Exception;

class NotesModel
{
    private $database;

    public function __construct()
    {
        $this->database = new \App\Database\Sql;
    }

    public function createNote($title, $text): void
    {
        if (empty($title)) {
            throw new Exception('You need to add a title to save');
        }

        $token = $_SESSION['token'];

        $insertNote = $this->database->connect()->prepare("INSERT INTO `notes` VALUES (null, ?, ?, ?)");
        if ($insertNote->execute(array($title, $text, $token))) {
            throw new Exception('Note sucessfully saved');
        };
    }
}