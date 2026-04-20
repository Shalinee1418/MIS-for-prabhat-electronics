<?php
class Sale {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function createSale() {
        $this->conn->query("INSERT INTO sales () VALUES ()");
        return $this->conn->insert_id;
    }

    public function updateSaleNo($id, $sale_no) {
        $this->conn->query("UPDATE sales SET sale_no='$sale_no' WHERE id=$id");
    }
}
?>