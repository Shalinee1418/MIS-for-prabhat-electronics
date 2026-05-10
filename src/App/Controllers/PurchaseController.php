<?php

namespace Sarma\MisForPrabhatElectronics\App\Controllers;

use Sarma\MisForPrabhatElectronics\App\Core\Request;
use Sarma\MisForPrabhatElectronics\App\Models\Purchase;
use Sarma\MisForPrabhatElectronics\App\Models\PurchaseItems;

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
        $purchase->paymentStatus = 'due';
        $purchaseId = $purchase->create();
        
        $purchaseItems = new PurchaseItems();
        $purchaseItems->purchaseId = $purchaseId;
        $purchaseItems->productId = $request->productId;
        $purchaseItems->quantity = $request->quantity;
        $purchaseItems->price = $request->price;
        $purchaseItems->subTotal = $request->subTotal;
        $purchaseItems->save();

        // header('location:/purchase');
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