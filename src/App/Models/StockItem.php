<?php

declare(strict_types=1);

namespace Sarma\MisForPrabhatElectronics\App\Models;

use Sarma\MisForPrabhatElectronics\App\Config\DbConfig;

class StockItem
{
    private $id;
    public $name;
    public $brand;

    private $connection;

    public function __construct()
    {
        $this->connection = DbConfig::getConnection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function save()
    {
        $sql = "INSERT INTO product(name,brand) VALUES('$this->name','$this->brand')";
        $this->connection->query($sql);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM product";
        $result = $this->connection->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function get()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
