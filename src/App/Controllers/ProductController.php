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
        $name = $_POST['name'];
        $brand = $_POST['brand'];

        $sql = "INSERT INTO product(name, brand) VALUES('$name', '$brand')";

        $this->connection->query($sql);

        header('location:/product');
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