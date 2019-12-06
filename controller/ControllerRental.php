<?php
require_once "model/CarRental.php";
require_once "model/Car.php";
require_once "model/Customer.php";

class ControllerRental
{
    public function invoke()
    {
        $action = filter_input(INPUT_POST, 'action');
        if (empty($action)) {
            $action = filter_input(INPUT_GET, 'action');
            if (empty($action)) {
                $action = 'index';
            }
        }
        switch ($action) {
            case 'rentalList':
                $rentalList = CarRental::getRentalRecords();
                include "view/rental/rentalList.php";
                break;
            case 'rentalCarList':
                $carRegNo = isset($_GET['carNo']) ? $_GET['carNo'] : '';
                $rentalList = CarRental::getRentalCar($carRegNo);
                include "view/rental/rentalList.php";
                break;
            case 'addRentalForm':
                $carList = Car::getCars();
                $customerList = Customer::getCustomers();
                include "view/rental/addRentalForm.php";
                break;
            case 'addRentalRecord':
                $carRegNo = filter_input(0, 'carRegNo');
                $customerID = filter_input(0, 'customerID');
                $startDate = filter_input(0, 'startDate');
                $endDate = filter_input(0, 'endDate');
                $lastUpdate = filter_input(0, 'lastUpdate');
//                echo "carRegNo: ".$carRegNo."<br>customerID: ".$customerID;
//                echo "<br>startDate: ".$startDate."<br>endDate: ".$endDate."<br>lastUpdate: ".$lastUpdate;
                $errorMessage = '';
                CarRental::addRentalRecord($carRegNo, $customerID, $startDate, $endDate, $lastUpdate, $errorMessage);
                if ($errorMessage == 'existed') {
                    $carList = Car::getCars();
                    $customerList = Customer::getCustomers();
                    include "view/rental/addRentalForm.php";
                    echo "<script>alert(\"This information already exists\");</script>";
                } elseif ($errorMessage == 'failed') {
                    $carList = Car::getCars();
                    $customerList = Customer::getCustomers();
                    include "view/rental/addRentalForm.php";
                    echo "<script>alert(\"SYSTEM ERROR: Adding failed!!!\");</script>";
                } else {
                    $rentalList = CarRental::getRentalRecords();
                    include "view/rental/rentalList.php";
                    echo "<script>alert(\"Adding successfully\");</script>";
                }
                break;
        }
    }
}