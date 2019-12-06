<?php
require_once "model/Car.php";

class ControllerCar
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
            case 'index':
                $carList = Car::getCars();
                include "view/car/carList.php";
                break;
        }
    }
}