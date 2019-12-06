<?php
require_once "controller/controllerCar.php";
require_once "controller/controllerRental.php";
require_once "controller/controllerCustomer.php";

$controller = new ControllerCar();
$controller->invoke();
$controller = new ControllerRental();
$controller->invoke();
$controller = new ControllerCustomer();
$controller->invoke();