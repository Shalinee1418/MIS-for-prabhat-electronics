<?php

namespace Sarma\MisForPrabhatElectronics\App\Controllers;

use Sarma\MisForPrabhatElectronics\App\Models\Customer;

class CustomerController {
    public function create() {
        $customer = new Customer();
        $customer->name = $_POST['name'];
        $customer->save();
        header('location:/customer');
    }
}