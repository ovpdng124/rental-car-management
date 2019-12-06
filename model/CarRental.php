<?php


class CarRental
{
    public static function getRentalRecords()
    {
        $connection = Database::connectDB();
        $query = "SELECT r.*,c.customerName FROM rentalRecords r INNER JOIN customers c ON c.customerID = r.customerID";
        try {
            $stmt = $connection->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            Database::closeDB();
            return $result;
        } catch (PDOException $e) {
            date_default_timezone_set("Asia/Bangkok");
            $date = date("d:m:y h:i:s");
            file_put_contents('getRentalRecordLog.txt', $date." ".$e->getMessage()."\n\n", 8);
            return false;
        }
    }

    public static function getRentalCar($carNo)
    {
        $connection = Database::connectDB();
        $query = "SELECT r.*,c.customerName FROM rentalRecords r INNER JOIN customers c ON c.customerID = r.customerID WHERE carRegNo = ?";
        try {
            $stmt = $connection->prepare($query);
            $stmt->bindParam(1, $carNo);
            $stmt->execute();
            $result = $stmt->fetchAll(2);
            $stmt->closeCursor();
            Database::closeDB();
            return $result;
        } catch (PDOException $e) {
            date_default_timezone_set("Asia/Bangkok");
            $date = date("d:m:y h:i:s");
            file_put_contents('getRentalCarLog.txt', $date." ".$e->getMessage()."\n\n", 8);
            return false;
        }
    }

    public static function addRentalRecord($carRegNo, $customerID,$startDate,$endDate,$lastUpdate,&$errorMessage){
        $connection = Database::connectDB();
        $rentalList = self::getRentalRecords();
        $recordExisted = false;
        if (isset($rentalList)){
            foreach ($rentalList as $item) {
                if ($item['carRegNo'] == $carRegNo && $item['customerID'] == $customerID){
                    $recordExisted = true;
                    break;
                }
            }
        }else return $errorMessage = 'failed';
        if(!$recordExisted){
            try{
                $query = "INSERT INTO rentalrecords (carRegNo,customerID,startDate,endDate,lastUpdate) VALUES (?,?,?,?,?)";
                $stmt = $connection->prepare($query);
                $stmt->bindParam(1,$carRegNo);
                $stmt->bindParam(2,$customerID);
                $stmt->bindParam(3,$startDate);
                $stmt->bindParam(4,$endDate);
                $stmt->bindParam(5,$lastUpdate);
                $stmt->execute();
                $stmt->closeCursor();
                Database::closeDB();
                return true;
            }catch (PDOException $e){
                date_default_timezone_set("Asia/Bangkok");
                $date = date("d:m:y h:i:s");
                file_put_contents('addRentalRecordLog.txt', $date." ".$e->getMessage()."\n\n", 8);
                return $errorMessage = 'failed';
            }
        }else return $errorMessage = 'existed';


    }
}