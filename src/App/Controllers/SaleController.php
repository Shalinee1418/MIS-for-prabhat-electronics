<?php

namespace Sarma\MisForPrabhatElectronics\App\Controllers;

use Sarma\MisForPrabhatElectronics\App\Models\Sale;

class SaleController
{
    private $connection;

    public function create()
    {
        $name = $_POST['name'];
        $brand = $_POST['brand'];


        $sql = "INSERT INTO product(name, brand) VALUES('$name', '$brand')";

        $this->connection->query($sql);

        header('location:/product');
    }

    public function get($id) {
        $sale = new Sale();
        return $sale->get($id);
    }

    public function getAll()
    {
        $sale = new Sale();
        return $sale->getAll();
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
