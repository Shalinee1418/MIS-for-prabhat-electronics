<?php

namespace Sarma\MisForPrabhatElectronics\App\Controllers;

use Sarma\MisForPrabhatElectronics\App\Helper\Request;
use Sarma\MisForPrabhatElectronics\App\Config\DbConfig;

class StockItemController
{
    private $connection;

    public function __construct()
    {
        $this->connection = DbConfig::getConnection();
    }

    public function create()
    {
        if (empty($_POST['name']) || empty($_POST['brand'])) {
            header('location:/stock-item/create?error=Name+and+brand+are+required');
            exit;
        }

        $name  = trim($_POST['name']);
        $brand = trim($_POST['brand']);

        // FIXED: prepared statement — no raw variables in SQL
        $stmt = $this->connection->prepare("INSERT INTO product(name, brand) VALUES(?, ?)");
        $stmt->bind_param("ss", $name, $brand);
        $stmt->execute();
        $stmt->close();

        // FIXED: redirect to correct route
        header('location:/stock-item');
        exit;
    }

    public function get($id)
    {
        $stmt = $this->connection->prepare("SELECT * FROM product WHERE product_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_assoc();
    }

    public function getAll()
    {
        $result = $this->connection->query("SELECT * FROM product");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function update()
    {
        if (empty($_POST['product_id']) || empty($_POST['name']) || empty($_POST['brand'])) {
            header('location:/stock-item?error=Missing+fields');
            exit;
        }

        $id    = (int) $_POST['product_id'];
        $name  = trim($_POST['name']);
        $brand = trim($_POST['brand']);

        $stmt = $this->connection->prepare("UPDATE product SET name = ?, brand = ? WHERE product_id = ?");
        $stmt->bind_param("ssi", $name, $brand, $id);
        $stmt->execute();
        $stmt->close();

        header('location:/stock-item');
        exit;
    }

    public function delete()
    {
        if (empty($_POST['product_id'])) {
            header('location:/stock-item?error=Missing+product+ID');
            exit;
        }

        $id = (int) $_POST['product_id'];

        $stmt = $this->connection->prepare("DELETE FROM product WHERE product_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();

        header('location:/stock-item');
        exit;
    }
}
