<?php

namespace Sarma\MisForPrabhatElectronics\App\Models;

use Sarma\MisForPrabhatElectronics\App\Config\DbConfig;

class Sale
{
    private $id;
    private $name;
    private $brand;

    private $connection;

    public function __construct()
    {
        $this->connection = DbConfig::getConnection();
    }

    public function createSale()
    {
        $this->connection->query("INSERT INTO sales () VALUES ()");
        return $this->connection->insert_id;
    }

    public function updateSaleNo($id, $sale_no)
    {
        $this->connection->query("UPDATE sales SET sale_no='$sale_no' WHERE sale_id=$id");
    }
    public function save()
    {
        $sql = "INSERT INTO sale(id,brand) VALUES('$this->name','$this->brand')";
        $this->connection->query($sql);
    }

    public function get($id)
    {
        $sql = "SELECT * FROM sale WHERE sale_id='$id'";
        $result = $this->connection->query($sql);
        if ($row = $result->fetch_assoc()) {
            $this->id = $row['id'];
            $this->name = $row['name'];
            $this->brand = $row['brand'];
            return $this;
        } else {
            return null;
        }
    }

    public function getAll()
    {
        $sql = "SELECT * FROM product";
        $result = $this->connection->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }



    public function update()
    {
        $sql = "UPDATE sale SET name='$this->name', brand='$this->brand' WHERE id=$this->id";
        $this->connection->query($sql);
    }

    public function delete()
    {
        $sql = "DELETE FROM sale WHERE id=$this->id";
        $this->connection->query($sql);
    }
    public function truncate()
    {
        $sql = "TRUNCATE TABLE sale";
        $this->connection->query($sql);
    }
}
