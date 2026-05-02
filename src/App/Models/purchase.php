<?php
class Purchase
{
    private $conn;

    public $id;
    public $product_name;
    public $quantity;
    public $price;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create()
    {
        $query = "INSERT INTO purchases (product_name, quantity, price) VALUES (?, ?, ?)";

        $stmt = $this->conn->prepare($query);

        $stmt->bind_param("sii", $this->product_name, $this->quantity, $this->price);

        return $stmt->execute();
    }
}
