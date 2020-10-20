<?php
namespace Classes;

use Models\ClassLogin;

class ClassPassword{

    private $db;

    public function __construct()
    {
        $this->db = new ClassLogin();
    }

    #make password hash
    public function passwordHash($pass)
    {
        return password_hash($pass, PASSWORD_DEFAULT);
    }

    #check hash
    public function verifyHash($email, $pass)
    {
        $hashDB = $this->db->getUserData($email);
        return password_verify($pass, $hashDB["data"]["senha"]);
    }
}
