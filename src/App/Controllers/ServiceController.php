<?php
namespace Sarma\MisForPrabhatElectronics\App\Controllers;
use Sarma\MisForPrabhatElectronics\App\Core\Request;
use Sarma\MisForPrabhatElectronics\App\Models\service;

class ServiceController
{
    public function create(Request $request)
    {
        $service = new Service();
        $service->serviceRequestId = $request->servicerequestId;
        $service->customerId = $request->customerId;
        $service->productId = $request->productId;      
        $service->deliveryDate = $request->deliveryDate;
        $service->warrantyStatus = $request->warrantyStatus;    
        $service->save();
    }
    public function getAll()
    {
        $service = new Service();
        return $service->getAll();
    }
    public function getById($id)
    {
        $service = new Service();
        return $service->getById($id);
    }

    
}