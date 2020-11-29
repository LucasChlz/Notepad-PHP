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

    public function generateToken(): string
    {   
        $token = md5(uniqid(rand(), true));
        return $token;
    }

    public function registerNewUser(string $nickname, string $email, string $password): bool 
    {

        $this->validateData($nickname, $email, $password);
        $token = $this->generateToken();

        $insert = $this->database->connect()->prepare("INSERT INTO `users` VALUES (null, ?, ?, ?, ?)");
        $insert->execute(array($nickname, $email, sha1($password), $token));
       
        return true;
    }

    public function verifyEmail(string $email):bool
    {
        $email = filter_var($email, FILTER_SANITIZE_STRING);

        $verifyEmail = $this->database->connect()->prepare("SELECT * FROM `users` WHERE email = ?");
        $verifyEmail->execute(array($email));

        if ($verifyEmail->rowCount() === 0) {
            return false;
        }

        return true;
    }

    public function loginUser(string $email, string $password)
    {

        if (empty($password) || empty($email)) {
            throw new Exception('Fill all fields');
        }

        if ($this->verifyEmail($email) === false) {
            throw new Exception('No account with that email');
        }

        $checkAccount = $this->database->connect()->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
        $checkAccount->execute(array($email, $password));

        if ($checkAccount->rowCount() === 0) {
            throw new Exception('Invalid password');
        } else {
            $getUserInfo = $checkAccount->fetch();

            $_SESSION['loginNote'] = true;
            $_SESSION['nickname'] = $getUserInfo['nickname'];
            $_SESSION['email'] = $getUserInfo['email'];
        }
       
    }
}