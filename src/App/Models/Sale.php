<?php

class Sale
{
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



    public function update() {}

    public function delete() {}
}
