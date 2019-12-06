<?php


class Customer
{
    public static function getCustomers(){
        $connection = Database::connectDB();
        $query = "SELECT * FROM customers";
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