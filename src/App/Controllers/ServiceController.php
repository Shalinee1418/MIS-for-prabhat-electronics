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
        

    }
}