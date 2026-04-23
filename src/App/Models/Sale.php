<?php

class Sale
{
    private $id;
    private $name;
    private $brand;

    private $connection;

    public function __construct($db)
    {
        $this->connection = $db;
    }

    public function createSale()
    {
        $this->connection->query("INSERT INTO sales () VALUES ()");
        return $this->connection->insert_id;
    }

    public function updateSaleNo($id, $sale_no)
    {
        $this->connection->query("UPDATE sales SET sale_no='$sale_no' WHERE id=$id");
    }
    public function save()
    {
        $sql = "INSERT INTO sale(id,brand) VALUES('$this->name','$this->brand')";
        $this->connection->query($sql);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM product";
        $result = $this->connection->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }



    public function update() {
        $sql = "UPDATE sale SET name='$this->name', brand='$this->brand' WHERE id=$this->id";
        $this->connection->query($sql);
    }

    public function delete() {
        $sql = "DELETE FROM sale WHERE id=$this->id";
        $this->connection->query($sql);
    }
    public function truncate() {
        $sql = "TRUNCATE TABLE sale";
        $this->connection->query($sql);
    }
}
