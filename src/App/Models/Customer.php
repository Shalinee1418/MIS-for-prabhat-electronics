<?php

declare(strict_types=1);

namespace Sarma\MisForPrabhatElectronics\App\Models;

use Sarma\MisForPrabhatElectronics\App\Config\DbConfig;

class Customer
{
    public $customerId;
    public $customerName;
    public $phone;
    public $email;
    public $gstNumber;
    public $city;
    public $pinCode;
    public $address;

    private $connection;

    public function __construct()
    {
        $this->connection = DbConfig::getConnection();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM customers";
        $result = $this->connection->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }


    public function getId()
    {
        return $this->customerId;    
    }
    
    public function save()
    {
        $sql = "INSERT INTO customers(customer_name, phone, email, gst_number, city, pincode, address) VALUES ('$this->customerName', '$this->phone', '$this->email', '$this->gstNumber', '$this->city', '$this->pinCode', '$this->address')";
        $this->connection->query($sql);
        return $this->connection->insert_id;
    }

    public function get(int $id)
    {
        $sql = "SELECT * FROM customers WHERE customer_id=$id";
        $result = $this->connection->query($sql);
        return $result->fetch_assoc();
   }
    // public function update() {
    //         $sql = "UPDATE customer SET name='$this->name' WHERE id=$this->id";
    //         $this->connection->query($sql);
    //     }
    //     public function delete() {
    //         $sql = "DELETE FROM customer WHERE id=$this->id";
    //         $this->connection->query($sql);
    //     }
}
