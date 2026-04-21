<?php
namespace Sarma\MisForPrabhatElectronics\App\Controllers;

use Sarma\MisForPrabhatElectronics\App\Config\DbConfig;

class SaleController
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

    public function update($id, $name, $price)
{
    $sql = "UPDATE product 
            SET name = '$name', price = '$price' 
            WHERE id = '$id'";

    return $this->connection->query($sql);

    }

    public function delete($id)
{
    $sql = "DELETE FROM product WHERE id = '$id'";
    return $this->connection->query($sql);
}

public function getlast()
    {
      $sql = "SELECT * FROM product ORDER BY product_id DESC LIMIT 1";
    $result = $this->connection->query($sql);

    return $result->fetch_assoc();
    }
}