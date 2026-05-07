<?php

namespace Sarma\MisForPrabhatElectronics\App\Controllers;

use Sarma\MisForPrabhatElectronics\App\Core\Request;
use Sarma\MisForPrabhatElectronics\App\Models\Purchase;

class PurchaseController
{
    public function create(Request $request)
    {
        $purchase = new Purchase();
        $purchase->supplierId = $request->supplierId;

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
