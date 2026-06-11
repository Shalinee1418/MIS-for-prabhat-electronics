<?php

namespace Sarma\MisForPrabhatElectronics\App\Models;

use Sarma\MisForPrabhatElectronics\App\Config\DbConfig;

class SaleItem
{
    public $saleItemId;
    public $saleId;
    public $productId;
    public $quantity;
    public $price;
    public $subTotal;

    private $connection;
    public function __construct()
    {
        $this->connection = DbConfig::getConnection();
    }
    public function create()
    {
        include $_SERVER['DOCUMENT_ROOT'] . "/pages/sale_item/create.php";
    }
    public function getaAll()
    {
        $query = "SELECT * FROM sales_items";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function save()
    {
        $sql = "INSERT INTO sales_items(sale_id, product_id, quantity, price, subtotal) VALUES($this->saleId, '$this->productId', $this->quantity, $this->price, $this->subTotal)";
        echo $sql;
        $this->connection->query($sql);
    }
}
