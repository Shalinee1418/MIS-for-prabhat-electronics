<?php

namespace Sarma\MisForPrabhatElectronics\App\Controllers;

use Sarma\MisForPrabhatElectronics\App\Helper\Request;
use Sarma\MisForPrabhatElectronics\App\Models\StockItem;

class StockItemController
{
    public function create()
    {
        $stockItem = new StockItem();
        $stockItem->name = $_POST['name'];
        $stockItem->brand = $_POST['brand'];
        $stockItem->save();
        header('location:/stock-item');
    }

    // TODO: convert to $request->name;

    public function getAll()
    {
        $stockItem = new StockItem();
        return $stockItem->getAll();
    }

    public function get(int $id)
    {
        $stockItem = new StockItem();
        return $stockItem->get($id);
    }
}
