<?php
namespace Sarma\MisForPrabhatElectronics\App\Controllers;

use Sarma\MisForPrabhatElectronics\App\Config\DbConfig;

class ProductController
{
    private $connection;

    public function __construct()
    {
        $this->connection = DbConfig::getConnection();
    }
    public function create()
    {

    }

    public function get()
    {

    }

    public function getAll()
    {
        $sql = "SELECT * FROM product";
        $result = $this->connection->query($sql);
        return $result->fetch_all();
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}