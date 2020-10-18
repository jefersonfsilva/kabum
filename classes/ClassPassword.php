<?php
namespace Classes;

class ClassPassword{

    #make password hash
    public function passwordHash($pass)
    {
        return password_hash($pass, PASSWORD_DEFAULT);
    }
}