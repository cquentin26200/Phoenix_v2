<?php

namespace Travel\Controllers;

use Travel\Models\UserManager;
use Travel\Validator;

/** Class UserController **/
class UserController
{
    private $manager;
    private $validator;

    public function __construct()
    {
        $this->manager = new UserManager();
        $this->validator = new Validator();
    }

    public function showLogin()
    {
        require VIEWS . 'Auth/login.php';
    }

    public function showRegister()
    {
        require VIEWS . 'Auth/register.php';
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: /login/');
    }

    public function register()
    {
        $this->validator->validate([
            "username" => ["required", "min:3", "max:100", "email"],
            "password" => ["required", "min:6", "alphaNum", "confirm"],
            "passwordConfirm" => ["required", "min:6", "alphaNum"]
        ]);
        $_SESSION['old'] = $_POST;

        if (!$this->validator->errors()) {
            $res = $this->manager->find($_POST["username"]);

            if (empty($res)) {
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $this->manager->store($password);

                $_SESSION["user"] = [
                    "ID_USER" => $this->manager->getBdd()->lastInsertId(),
                    "EMAIL_USER" => $_POST["username"]
                ];
                header("Location: /");
            } else {
                $_SESSION["error"]['EMAIL_USER'] = "Le EMAIL_USER choisi est déjà utilisé !";
                header("Location: /register");
            }
        } else {
            header("Location: /register");
        }
    }

    public function login()
    {
        $this->validator->validate([
            "username" => ["required", "min:3", "max:100", "email"],
            "password" => ["required", "min:6", "alphaNum"],
        ]);

        $_SESSION['old'] = $_POST;
        if (!$this->validator->errors()) {
            $res = $this->manager->find($_POST["username"]);
            var_dump($res);
            if ($res && password_verify($_POST['password'], $res->getPassword_User())) {
                $_SESSION["user"] = [
                    "ID_USER" => $res->getId_User(),
                    "EMAIL_USER" => $res->getEmail_User(),
                    "Admin" => $res->getAdmin(),
                ];
                header("Location: /");
            } else {
                $_SESSION["error"]['message'] = "login erreur sur les identifiants";
                header("Location: /login");
            }
        } else {
            header("Location: /login");
        }
    }
}
