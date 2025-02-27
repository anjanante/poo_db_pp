<?php

namespace Classes;

class Db {

    public static $host = "localhost";

    public static $db_name = "poo_db_pp";

    public static $user = "root";

    public static $password = "";

    public static $port = "3306";

    public static function connect()
    {

        try {

            $connexion = new \PDO('mysql:host='.self::$host.';port='.self::$port.';dbname='.self::$db_name.'', self::$user, self::$password);
             
            $connexion->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
         
            return $connexion;

        } catch(\PDOException $e)
        {
            echo "An error has occurred during connection :".$e->getMessage();
        }

    }
}