<?php

declare(strict_types=1);

namespace Sarma\MisForPrabhatElectronics\App\Models;

use Sarma\MisForPrabhatElectronics\App\Config\DbConfig;

class Customer
{
    private $id;
    public $name;

    private $connection;

    public function __construct()
    {
        $this->connection = DbConfig::getConnection();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM customer";
        $result = $this->connection->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getId()
    {
        return $this->id;
        
    }
    
    public function save()
    {
        $sql = "INSERT INTO customer(name) VALUES('$this->name')";
        $this->connection->query($sql);
    }
    public function get(int $id)
    {
        $sql = "SELECT * FROM customer WHERE id=$id";
        $result = $this->connection->query($sql);
        return $result->fetch_assoc();
   }
    public function update() {
            $sql = "UPDATE customer SET name='$this->name' WHERE id=$this->id";
            $this->connection->query($sql);
        }
        public function delete() {
            $sql = "DELETE FROM customer WHERE id=$this->id";
            $this->connection->query($sql);
        }
}