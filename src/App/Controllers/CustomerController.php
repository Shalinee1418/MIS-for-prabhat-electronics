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
    public function getAll()
    {
        $customer = new Customer();
        return $customer->getAll();
    }

    public function get(int $id)
    {
        $customer = new Customer();
        return $customer->get($id);
    }
    public function update(int $id){
        $customer = new Customer();
        $customer->name = $_POST['name'];
        $customer->update();
        header('location:/customer');
    }
    public function delete() {
        $customer = new Customer();
        $customer->delete();
        header('location:/customer');
    }
}


