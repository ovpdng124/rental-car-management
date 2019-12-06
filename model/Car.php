<?php
require_once "config/Database.php";

class Car
{
    public static function getCars(){
        $connection = Database::connectDB();
        $query = "SELECT * FROM cars";
        try{
            $stmt = $connection->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            Database::closeDB();
            return $result;
        }catch (PDOException $e){
            echo "ERROR: query get Car".$e->getMessage();
            return false;
        }
    }
}