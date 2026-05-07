<?php

namespace Sarma\MisForPrabhatElectronics\App\Models;

use Sarma\MisForPrabhatElectronics\App\Config\DbConfig;

class Purchase
{
    public $purchase_id;
    public $supplier_id;    
    public $purchase_date;



    private $connection;

    public function __construct()
    {
        $this->connection = DbConfig::getConnection();
    }

    public function getAll()
    {
        $query = "SELECT * FROM purchase";

        $stmt = $this->connection->prepare($query);

        $stmt->execute();

        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function create()
    {
        $query = "INSERT INTO purchase (purchase_id, supplier_id, purchase_date) VALUES (?, ?, ?)";

        $stmt = $this->connection->prepare($query);

        $stmt->bind_param("iii", $this->purchase_id, $this->supplier_id, $this->purchase_date);

        return $stmt->execute();
    }
    public function delete()
    {
        $query = "DELETE FROM purchase WHERE id = ?";

        $stmt = $this->connection->prepare($query);

        $stmt->bind_param("i", $this->id);

        return $stmt->execute();
    }
    public function update()
    {
        $query = "UPDATE purchase SET product_name = ?, quantity = ?, price = ? WHERE id = ?";

        $stmt = $this->connection->prepare($query);

        $stmt->bind_param("siii", $this->product_name, $this->quantity, $this->price, $this->id);

        return $stmt->execute();
    }
    public function getById($id)
    {
        $query = "SELECT * FROM purchase WHERE id = ?";

        $stmt = $this->connection->prepare($query);

        $stmt->bind_param("i", $id);

        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }
}
