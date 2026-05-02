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

    public function create()
    {
        $sql = "INSERT INTO sale(sale_date, invoice_number) VALUES(?,?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ss", $this->saleDate, $this->invoiceNumber);
    }
}
