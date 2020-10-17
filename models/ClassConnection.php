<?php
namespace Models;

abstract class ClassConnection{

    protected function connectDB()
    {
        try {
            $conn = new \PDO("mysql:host=".HOST.";dbname=".DB."", "".USER."", "".PASS."");
            return $conn;
        } catch (\PDOException $ex) {
            return $ex->getMessage();
        }
    }
}
