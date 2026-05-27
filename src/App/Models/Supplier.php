<?php

namespace Sarma\MisForPrabhatElectronics\App\Models;

use Sarma\MisForPrabhatElectronics\App\Config\DbConfig;


class Supplier
{
    public $supplierId;
    public $supplierName;
    public $phone;
    public $email;
    public $address;


    private $connection;

    public function __construct()
    {
        $this->connection = Dbconfig::getConnection();
    }
    public function getAll()
    {
        $query = "SELECT * FROM supplier";
        $statement = $this->connection->prepare($query);
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getId()
    {
        return $this->supplierId;
    }

    public function save()
    {
        $sql = "INSERT INTO supplier(supplier_name, phone, email, address) VALUES ('$this->supplierName', '$this->phone','$this->email', '$this->address')";
         $this->connection->query($sql);
        return $this->connection->insert_id;
    }

    public function get(int $id)
    {
        $sql = "SELECT * FROM supplier WHERE supplier_id=$id";
        $result = $this->connection->query($sql);
        return $result->fetch_assoc();
    }
    public function update()
    {
        $sql = "UPDATE supplier SET supplier_name='$this->supplierName', phone='$this->phone', email='$this->email', address='$this->address' WHERE supplier_id=$this->supplierId";
        $this->connection->query($sql);
    }
    //     public static function all(): array
    //     {
    //         $connection = DbConfig::getConnection();
    //         $sql = "SELECT * FROM supplier";
    //         $result = $connection->query($sql);
    //         $connection->close();
    //         return $result->fetch_all(MYSQLI_ASSOC);
    //     }

    //     // public static function find(int $id): array
    //     // {
    //     //     $connection = DbConfig::getConnection();
    //     //     $sql = "SELECT * FROM supplier WHERE supplier_id=?";
    //     //     $statement = $connection->prepare($sql);
    //     //     $statement->bind_param('i', $id);
    //     //     $statement->execute();
    //     //     $result = $statement->get_result();
    //     //     $connection->close();
    //     //     return $result->fetch_assoc();
    //     // }
}
