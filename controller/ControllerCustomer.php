<?php
require_once "model/Customer.php";

class ControllerCustomer
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
            case 'customerList':
                $customerList = Customer::getCustomers();
                include "view/customer/customerList.php";
                break;
        }
    }
}