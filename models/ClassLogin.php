<?php
namespace Models;

use Traits\TraitGetIp;

class ClassLogin extends ClassCrud{

    private $trait;
    private $dateNow;

    public function __construct()
    {
        $this->trait = TraitGetIp::getUserIp();
        $this->dateNow = date("Y-m-d H:i:s");
    }

    #return user data
    public function getUserData($email)
    {
        $b = $this->selectDB(
            "email, senha",
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

    #count attempt
    public function countAttempt()
    {
        $b = $this->selectDB(
            "*",
            "attempt",
            "where ip = ?",
            array(
                $this->trait
            )
        );

        $r = 0;
        while ($f = $b->fetch(\PDO::FETCH_ASSOC)) {
            if (strtotime($f["date"]) > strtotime($this->dateNow)-1200) { //20min
                $r++;
            }
        }

        return $r;
    }

    #insert
    public function insertAttempt()
    {
        if ($this->countAttempt() < 5) {
            $this->insertDB(
                "attempt",
                "?,?,?",
                array(
                    0,
                    $this->trait,
                    $this->dateNow
                )
            );
        }
    }

    #delete
    public function deleteAttempt()
    {        
        $this->deleteDB(
            "attempt",
            "ip = ?",
            array(
                $this->trait
            )
        );        
    }
}
