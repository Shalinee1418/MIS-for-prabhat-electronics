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
        $purchase->supplierId    = $request->supplierId;
        $purchase->purchaseDate  = $request->purchaseDate;
        $purchase->totalAmount   = $request->totalAmount;
        $purchase->paymentStatus = 'due';
        $purchaseId = $purchase->create();


        $count = count($request->productId);

        for ($i = 0; $i < $count; $i++) {
            $purchaseItem = new PurchaseItems();
            $purchaseItem->purchaseId = $purchaseId;
            $purchaseItem->productId = $request->productId[$i];
            $purchaseItem->quantity = $request->quantity[$i];
            $purchaseItem->price = $request->price[$i];
            $purchaseItem->subTotal = $request->subTotal[$i];
            $purchaseItem->save();
        }

        // header('Location: /purchase');
        exit;
    }

    public function delete($id)
    {
        $purchase = new Purchase();
        $purchase->delete($id);
        header('Location: /purchase');
        exit;
    }

    public function getAll()
    {
        $purchase = new Purchase();
        return $purchase->getAll();
    }
}
