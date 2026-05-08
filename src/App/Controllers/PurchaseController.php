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
        $purchase->supplierName = $request->supplierName;
        $purchase->purchaseDate = $request->purchaseDate;
        $purchase->paymentStatus = $request->paymentStatus;
        $purchase->totalAmount = $request->totalAmount;

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
