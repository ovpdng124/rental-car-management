<?php

class Database
{
    static private
        $dsn = "mysql:host=localhost;dbname=car_rental_db",
        $user = 'root',
        $password = '123123',
        $option = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'),
        $connection = null;

    public function __construct()
    {
    }

    public static function connectDB(){
        try
        {
            self::$connection = new PDO(self::$dsn, self::$user, self::$password, self::$option);
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, 2);
        }
        catch
        (PDOException $e) {
            echo "ERROR PDO: Error connection!";
            file_put_contents("PDO_Error_Log.txt", $e->getMessage(), FILE_APPEND);
        }
        return self::$connection;
    }
    static function closeDB(){
        self::$connection = null;
    }

}
