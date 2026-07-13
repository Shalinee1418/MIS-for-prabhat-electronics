<?php

namespace Sarma\MisForPrabhatElectronics\App\Controllers;

use Sarma\MisForPrabhatElectronics\App\Core\Request;
use Sarma\MisForPrabhatElectronics\App\Models\Sale;
use Sarma\MisForPrabhatElectronics\App\Models\SaleItem;

class SaleController
{
    public function store(Request $request)
    {
        $sale = new Sale();
        $sale->saleDate = $request->sale_date;
        $sale->invoiceNumber = $request->invoice_number ?? 0;
        $sale->discount = $request->discount ?? 0;
        $sale->taxAmount = $request->tax_amount ?? 0;
        $sale->unitPrice = $request->unit_price ?? 0; // x
        $sale->totalAmount = $request->total_amount ?? 0;
        $sale->save();

        $count = count($request->product_id);

        // print_r($request);
        for ($i = 0; $i < $count; $i++) {
            $saleItem = new SaleItem();
            $saleItem->saleId = $sale->saleId;
            $saleItem->quantity = $request->quantity[$i];
            $saleItem->price = $request->price[$i];
            $saleItem->subTotal = $request->sub_total[$i];
            $saleItem->save();
        }

        header('Location: /sale');
        exit;
    }

    public function update(Request $request)
    {
        $sale = new Sale();
        $sale->saleId = $request->sale_id;
        $sale->saleDate = $request->sale_date;
        $sale->invoiceNumber = $request->invoice_number;
        $sale->discount = $request->discount;
        $sale->taxAmount = $request->tax_amount;
        $sale->unitPrice = $request->unit_price;
        $sale->totalAmount = $request->total_amount;
        $sale->update();

        

        header('Location: /sale');
        exit;
    }
   
    public function getAll()
    {
        $sale = new Sale();
        return $sale->getAll();
    }

    public function get(int $id)
    {
        $sale = new Sale();
        return $sale->get($id);
    }

    // public function delete($id)
    // {
    //     $sale = new Sale();
    //     $sale->saleId = $id;
    //     $sale->delete();

    //     header('Location: /sale');
    //     exit;
    // }
}
