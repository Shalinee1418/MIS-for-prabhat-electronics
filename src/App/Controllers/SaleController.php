<?php

namespace Sarma\MisForPrabhatElectronics\App\Controllers;

use Sarma\MisForPrabhatElectronics\App\Core\Request;
use Sarma\MisForPrabhatElectronics\App\Models\Sale;

class SaleController
{
    public function store(Request $request)
    {
        $sale = new Sale();
        $sale->saleDate = $request->saleDate;
        // $sale->invoiceNumber = $_POST['invoice_number'];
        $sale->save();
    }
    public function update($id)
    {
        $sale = new Sale();
        $sale->id = $id;
        $sale->saleDate = $_POST['sale_date'];
        $sale->update();
    }
    public function delete($id)
    {
        $sale = new Sale();
        $sale->id = $id;
        $sale->delete();
    }
}
