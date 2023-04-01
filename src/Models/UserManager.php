<?php

namespace Travel\Models;

use Travel\Models\User;

/** Class UserManager **/
class UserManager
{

    private $bdd;

    public function __construct()
    {
        $this->bdd = new \PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=utf8;', USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function getBdd()
    {
        return $this->bdd;
    }

    public function find($username)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM user WHERE EMAIL_USER = ?");
        $stmt->execute(array(
            $username
        ));
        $stmt->setFetchMode(\PDO::FETCH_CLASS, "Travel\Models\User");

        return $stmt->fetch();
    }

    public function all()
    {
        $stmt = $this->bdd->query('SELECT * FROM user');

        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Travel\Models\User");
    }

    public function store($password)
    {
        $stmt = $this->bdd->prepare("INSERT INTO user(ID_USER, EMAIL_USER, PASSWORD_USER) VALUES (?, ?, ?)");
        $stmt->execute(array(
            uniqid(),
            $_POST["username"],
            $password
        ));
    }
}
