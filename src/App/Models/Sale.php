<?php

namespace Sarma\MisForPrabhatElectronics\App\Models;

use Sarma\MisForPrabhatElectronics\App\Config\DbConfig;

class Sale
{
    public $saleId;
    public $saleDate;
    public $invoiceNumber;
    public $discount = 0;
    public $taxAmount = 0;
    public $unitPrice = 0;
    public $totalAmount = 0;
    private $connection;

    public function __construct()
    {
        $this->connection = DbConfig::getConnection();
    }

    public function fill(array $data)
    {
        $this->saleId = $data['sale_id'];
        $this->saleDate = $data['sale_date'];
        $this->invoiceNumber = $data['invoice_number'];
        $this->discount = $data['discount'];
        $this->taxAmount = $data['tax_amount'];
        $this->unitPrice = $data['unit_price'];
        $this->totalAmount = $data['total_amount'];
    }

    public function save()
    {
        $sql = "INSERT INTO sale(sale_date, invoice_number, discount, tax_amount, unit_price, total_amount) VALUES(?,?,?,?,?,?)";
        $stmt = $this->connection->prepare($sql);
        $invoiceNumber = (int) $this->invoiceNumber;
        $discount = (float) $this->discount;
        $taxAmount = (float) $this->taxAmount;
        $unitPrice = (float) $this->unitPrice;
        $totalAmount = (float) $this->totalAmount;
        $stmt->bind_param("sidddd", $this->saleDate, $invoiceNumber, $discount, $taxAmount, $unitPrice, $totalAmount);
        $stmt->execute();
        return $this->connection->insert_id;
    }

    public function getAll()
    {
        $query = "SELECT * FROM sale ORDER BY sale_id ASC";
        $statement = $this->connection->prepare($query);
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function get(int $id)
    {
        $sql = "SELECT * FROM sale WHERE sale_id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function update()
    {
        $sql = "UPDATE sale SET sale_date = ?, invoice_number = ?, discount = ?, tax_amount = ?, unit_price = ?, total_amount = ? WHERE sale_id = ?";
        $stmt = $this->connection->prepare($sql);
        $invoiceNumber = (int) $this->invoiceNumber;
        $discount = (float) $this->discount;
        $taxAmount = (float) $this->taxAmount;
        $unitPrice = (float) $this->unitPrice;
        $totalAmount = (float) $this->totalAmount;
        $saleId = (int) $this->saleId;
        $stmt->bind_param("siddddi", $this->saleDate, $invoiceNumber, $discount, $taxAmount, $unitPrice, $totalAmount, $saleId);
        $stmt->execute();
    }
    public function delete()
    {
        $sql = "DELETE FROM sale WHERE sale_id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $this->saleId);
        $stmt->execute();
    }
}
