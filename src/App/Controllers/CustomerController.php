<?php

namespace Sarma\MisForPrabhatElectronics\App\Controllers;

use Sarma\MisForPrabhatElectronics\App\Core\Request;
use Sarma\MisForPrabhatElectronics\App\Models\Customer;
class CustomerController
{

    public function create(Request $request)
    {
        $customer = new Customer();
        $customer->customerId = $request->customerId;
        $customer->customerName = $request->customerName;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->gstNumber = $request->gstNumber;
        $customer->city = $request->city;
        $customer->pinCode = $request->pincode;
        $customer->address = $request->address;
        $customer->save();

        header('Location: /customer');
        exit;
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
    // public function update(int $id){
    //     $customer = new Customer();
    //     $customer->   = $_POST['name'];
    //     $customer->update();
    //     header('location:/customer');
    // }

    // public function delete() {
    //     $customer = new Customer();
    //     $customer->delete();
    //     header('location:/customer');
    // }
}
