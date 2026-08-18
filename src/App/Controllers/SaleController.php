<?php

namespace Sarma\MisForPrabhatElectronics\App\Controllers;

use Sarma\MisForPrabhatElectronics\App\Core\Request;
use Sarma\MisForPrabhatElectronics\App\Models\Sale;
use Sarma\MisForPrabhatElectronics\App\Models\SaleItem;
use Sarma\MisForPrabhatElectronics\App\Config\DbConfig;

class SaleController
{
    public function store(Request $request)
    {

        DbConfig::getConnection()->begin_transaction();
        $sale = new Sale();
        $sale->saleDate = $request->sale_date ?: date('Y-m-d');
        $sale->invoiceNumber = $request->invoice_number ?: $this->generateInvoiceNumber();
        $sale->discount = (float) ($request->discount ?? 0);
        $sale->taxAmount = (float) ($request->cgst ?? 0) + (float) ($request->sgst ?? 0);
        $sale->unitPrice = (float) ($request->total ?? 0);
        $sale->totalAmount = (float) ($request->subtotal ?? 0);
        $sale_id = $sale->save();

        $items = $request->items ?? [];

        foreach ($items as $item) {
            $name = trim($item['name'] ?? '');
            if ($name === '') {
                continue; // skip blank rows added/removed on the client
            }

            $qty = (float) ($item['qty'] ?? 0);
            $rate = (float) ($item['rate'] ?? 0);
            $gst = (float) ($item['gst'] ?? 0);
            $base = $qty * $rate;
            $subTotal = $base + ($base * $gst / 100);

            $saleItem = new SaleItem();
            $saleItem->saleId = $sale_id;
            $saleItem->quantity = $qty;
            $saleItem->price = $rate;
            $saleItem->subTotal = $subTotal;
            $saleItem->save();
        }

        DbConfig::getConnection()->commit();
        header('Location: /sale');
        exit;
    }

    private function generateInvoiceNumber(): string
    {
        return 'INV-' . date('YmdHis');
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
}
