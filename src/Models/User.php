<?php

namespace Travel\Models;

/** Class User **/
class User
{

    private $ID_USER;
    private $EMAIL_USER;
    private $PASSWORD_USER;
    private $Admin;

    public function getId_User()
    {
        return $this->ID_USER;
    }

    public function getEmail_User()
    {
        return $this->EMAIL_USER;
    }

    public function getPassword_User()
    {
        return $this->PASSWORD_USER;
    }

    public function getAdmin()
    {
        return $this->Admin;
    }

    public function setId_User(String $ID_USER)
    {
        $this->ID_USER = $ID_USER;
    }

    public function setEmail_User(String $EMAIL_USER)
    {
        $this->EMAIL_USER = $EMAIL_USER;
    }

    public function setPassword_User(Int $PASSWORD_USER)
    {
        $this->PASSWORD_USER = $PASSWORD_USER;
    }

    public function setAdmin(Int $Admin)
    {
        $this->Admin = $Admin;
    }
}
