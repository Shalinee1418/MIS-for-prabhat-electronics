<?php

namespace Sarma\MisForPrabhatElectronics\App\Controllers;

use Sarma\MisForPrabhatElectronics\App\Core\Request;
use Sarma\MisForPrabhatElectronics\App\Models\Purchase;

class PurchaseController
{
    public function create(Request $request)
    {
        $purchase = new Purchase();
        $purchase-> purchase_id = $request->id;
        $purchase->supplier_id = $request->supplier_id;
        $purchase->purchase_date = $request->purchase_date;

        return $purchase->create();
    }

    public function delete()
    {
        // return $purchase->delete();
    }

    public function getAll()
    {
        $purchase = new Purchase();
        return $purchase->getAll();
    }
}
