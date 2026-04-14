<?php

namespace Sarma\MisForPrabhatElectronics\App\Controllers;

use Sarma\MisForPrabhatElectronics\App\Helper\Request;
use Sarma\MisForPrabhatElectronics\App\Models\StockItem;

class StockItemController
{
    public function create(Request $request)
    {
        $stockItem = new StockItem();
        $stockItem->name = $_POST['name'];      // convert to $request->name;
        $stockItem->brand = $_POST['brand'];
        $stockItem->save();
        header('location:/stock-item');
    }

    public function getAll()
    {
        $stockItem = new StockItem();
        return $stockItem->getAll();
    }
}
