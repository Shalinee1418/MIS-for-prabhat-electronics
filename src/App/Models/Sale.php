<?php

namespace Sarma\MisForPrabhatElectronics\App\Models;

use Sarma\MisForPrabhatElectronics\App\Config\DbConfig;

class Sale
{
    public $id;
    public $saleDate;
    public $invoiceNumber;

    private $connection;

    public function __construct()
    {
        $this->connection = DbConfig::getConnection();
    }

    public function save()
    {
        $sql = "INSERT INTO sale(sale_date, invoice_number) VALUES(?,?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ss", $this->saleDate, $this->invoiceNumber);
    }
    public function update()
    {
         $sql = "UPDATE sale SET sale_date = ?, invoice_number = ? WHERE id = ?";
    $stmt = $this->connection->prepare($sql);
    $stmt->bind_param("ssi", $this->saleDate, $this->invoiceNumber, $this->id);
    $stmt->execute();

    }
    public function delete()
    {
        $sql = "DELETE FROM sale WHERE id = ?";
    $stmt = $this->connection->prepare($sql);
    $stmt->bind_param("i", $this->id);
    $stmt->execute();


    }
}
