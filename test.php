<?php
include 'src/App/Models/Supplier.php';

use Sarma\MisForPrabhatElectronics\App\Models\Supplier;

$suppliers = Supplier::all();

print_r($suppliers);