<?php
namespace Models;

class ClassRegister extends ClassCrud{

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