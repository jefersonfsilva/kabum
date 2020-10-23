<?php
namespace Models;

class ClassRegister extends ClassCrud{

    #return all user data
    public function getAllUser()
    {
        $b = $this->selectAllDB(
            "users",
            array()
        );
        $f = $b->fetchAll(\PDO::FETCH_ASSOC);
        return $arrData = [
            "data" => $f
        ];
    }

    #return user data
    public function getUserData($email)
    {
        $b = $this->selectDB(
            "*",
            "users",
            "where email = ?",
            array(
                $email
            )
        );
        $f = $b->fetch(\PDO::FETCH_ASSOC);
        $r = $b->rowCount();
        return $arrData = [
            "data" => $f,
            "rows" => $r
        ];
    }

    public function insertUser($arrUsers)
    {
        $this->insertDB(
            "users",
            "?,?,?,?,?,?,?,?,?",
            array(
                0,
                $arrUsers['nome'],
                $arrUsers['email'],
                $arrUsers['hashSenha'],
                $arrUsers['dataNascimento'],
                $arrUsers['cpf'],
                $arrUsers['dataCriacao'],
                'user',
                'confirmation'
            )
        );

        $this->insertDB(
            "confirmation",
            "?,?,?",
            array(
                0,
                $arrUsers['email'],
                $arrUsers['token']
            )
        );
    }

    #get email from DB
    public function getIssetEmail($email)
    {
        $b = $this->selectDB(
            "id",
            "users",
            "where email = ?",
            array(
                $email
            )
        );

        return $r = $b->rowCount();
    }
}