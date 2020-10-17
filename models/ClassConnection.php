<?php
namespace Models;

abstract class ClassConnection{

    protected function connectDB()
    {
        try {
            $conn = new \PDO("mysql:host=localhost;dbname=kabum", "root", "@iphone#xr");
            return $conn;
        } catch (\PDOException $ex) {
            return $ex->getMessage();
        }
    }
}
