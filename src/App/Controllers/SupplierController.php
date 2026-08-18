<?php
namespace Sarma\MisForPrabhatElectronics\App\Controllers;

use Sarma\MisForPrabhatElectronics\App\Core\Request;
use Sarma\MisForPrabhatElectronics\App\Models\Supplier; 
class SupplierController

{
    public function create(Request $request)
    {
        $supplier = new Supplier();
        $supplier->supplierId = $request->supplierId;
        $supplier->supplierName = $request->supplierName;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
        $supplier->address = $request->address;
        $supplier->save();

        header('Location: /supplier');
        exit;
    }
    public function getAll()
    {
        $supplier = new Supplier();
        return $supplier->getAll();
    }
    public function get(int $id)
    {
        $supplier = new Supplier();
        return $supplier->get($id);
    }
}