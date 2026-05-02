<?php

namespace Sarma\MisForPrabhatElectronics\App\Controllers;

use Sarma\MisForPrabhatElectronics\App\Models\Sale;

class SaleController
{
    public function store()
    {
        $sale = new Sale();
        $sale->saleDate = $_POST['sale_date'];
        $sale->invoiceNumber = $_POST['invoice_number'];

        $sale->create();
    }
}
