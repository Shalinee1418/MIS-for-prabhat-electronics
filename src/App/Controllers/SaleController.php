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
        $sale->saleid = $request->saleid;
        $sale->save();
    }
    public function update()
    {
       
    }
    public function delete($id)
    {
        $sale = new Sale();
        $sale->id = $id;
        $sale->delete();
    }
}
