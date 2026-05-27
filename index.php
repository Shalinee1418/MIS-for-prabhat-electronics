<!-- Front Controller -->
<?php
require __DIR__ . "/vendor/autoload.php";

use Dotenv\Dotenv;
use Sarma\MisForPrabhatElectronics\App\Controllers\AuthenticationController;
use Sarma\MisForPrabhatElectronics\App\Controllers\CustomerController;
use Sarma\MisForPrabhatElectronics\App\Controllers\SupplierController;
use Sarma\MisForPrabhatElectronics\App\Controllers\PurchaseController;
use Sarma\MisForPrabhatElectronics\App\Controllers\SaleController;
use Sarma\MisForPrabhatElectronics\App\Controllers\StockItemController;
use Sarma\MisForPrabhatElectronics\App\Core\Request;

$env = Dotenv::createImmutable(__DIR__);
$env->load();

$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$page_path = $_SERVER['DOCUMENT_ROOT'] . "/pages/";

switch ($request) {
    case "/":
        include $page_path . "auth/login.php";
        break;
    case "/auth/authenticate":
        AuthenticationController::authenticate();
        break;
    case "/user/admin-dashboard":
        include $page_path . "user/admin-dashboard.php";
        break;
    case "/stock-item":
        include $page_path . "stock_item/index.php";
        break;
    case "/stock-item/create":
        include $page_path . "stock_item/create.php";
        break;
    case "/stock-item/save":
        $stockItemController = new StockItemController();
        $stockItemController->create();
        break;
    case "/stock-item/edit":
        include $page_path . "stock_item/edit.php";
        break;
    case "/purchase":
        include $page_path . "purchase/index.php";
        break;
    case "/purchase/create":
        include $page_path . "purchase/create.php";
        break;
    case "/purchase/store":
        $purchaseController = new PurchaseController();
        $purchaseController->create(new Request());
        break;

    case "/sale":
        include $page_path . "sales/index.php";
        break;
    case "/sale/create":
        include $page_path . "sales/create.php";
        break;
    case "/sale/store":
        $saleController = new SaleController();
        $saleController->store(new Request());
        break;
    case "/sale/edit":
        include $page_path . "sales/edit.php";
        break;
    case "/service":
        include $page_path . "service/index.php";
        break;
    case "/service/create":
        include $page_path . "service/create.php";
        break;
    case "/customer":
        include $page_path . "customer/index.php";
        break;
    case "/customer/create":
        include $page_path . "customer/create.php";
        break;
    case "/customer/store":
        $customerController = new CustomerController();
        $customerController->create(new Request());
        break;
    case "/supplier":
        include $page_path . "supplier/index.php";
        break;  
    case "/supplier/create":
        include $page_path . "supplier/create.php";
        break;
    case "/supplier/store":
        $supplierController = new SupplierController();
        $supplierController->create(new Request());
        break;
    default:
        include $page_path . "error.php";
}
