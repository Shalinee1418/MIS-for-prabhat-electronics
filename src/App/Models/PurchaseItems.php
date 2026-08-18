<?php

namespace Sarma\MisForPrabhatElectronics\App\Models;

use Sarma\MisForPrabhatElectronics\App\Config\DbConfig;

class PurchaseItems
{
    public $purchaseItemId;
    public $purchaseId;
    public $productId;
    public $quantity;
    public $price;
    public $subTotal;

    private $connection;
    public function __construct()
    {
        $this->connection = DbConfig::getConnection();
    }

    public function getaAll()
    {
        $query = "SELECT * FROM purchase";
        $stmt = $this->connection->prepare($query);


        $stmt->execute();

        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
    public function find()
    {
        
    }

    public function save()
    {
        $sql = "INSERT INTO purchase_items(purchase_id, product_id, quantity, price, subtotal) VALUES($this->purchaseId, '$this->productId', $this->quantity, $this->price, $this->subTotal)";
        echo $sql;
        $this->connection->query($sql);
    }
}
