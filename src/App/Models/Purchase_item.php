<?php
namespace Sarma\MisForPrabhatElectronics\App\Models;

use Dba\Connection;
use Sarma\MisForPrabhatElectronics\App\Config\DbConfig;

class Purchase_items
{
    public $purchase_item_id;
    public $purchase_id;
    public $product_id;
    public $quantity;
    public $price;
    public $subtotal;

    private $connection;
    public function __construct()
    {
        $this->connection = DbConfig::getConnection();

    }

    public function getaAll()
    {
        $query = "SELECT * FROM purchase_items";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

    }
    
}
