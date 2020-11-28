<?php

namespace App\Models;

use Exception;

class UserModel
{

    private $database;

    public $sucessMessage;

    public function __construct()
    {
        $this->database = new \App\Database\Sql;
    }

    public function validateData(string $nickname, string $email, string $password): bool
    {   

        if (empty($nickname) || empty($email) || empty($password)) {
            throw new Exception("Fill All Fields");
            return false;
        }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid Email");
            return false;
        } else if (!preg_match("/^[a-zA-Z0-9'-]+$/", $nickname)) {
            throw new Exception('Do not use special characters');
            return false;
        } else if (!preg_match("/^[a-zA-Z0-9'-]+$/", $password)) {
            throw new Exception('Do not use special characters');
            return false;
        }

        $verifyExist = $this->database->connect()->prepare("SELECT * FROM `users` WHERE email = ?");
        $verifyExist->execute(array($email));

        if ($verifyExist->rowCount() === 1) {
            throw new Exception('Email already exist');
            return false;
        }

        return true;
    }

    public function registerNewUser(string $nickname, string $email, string $password): bool 
    {

        $this->validateData($nickname, $email, $password);

        $insert = $this->database->connect()->prepare("INSERT INTO `users` VALUES (null, ?, ?, ?)");
        $insert->execute(array($nickname, $email, sha1($password)));
       
        return true;
    }
}