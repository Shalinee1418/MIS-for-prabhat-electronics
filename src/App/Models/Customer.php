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
}