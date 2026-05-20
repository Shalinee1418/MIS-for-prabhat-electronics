<!-- Front Controller -->
<?php
require __DIR__ . "/vendor/autoload.php";

use Dotenv\Dotenv;
use Sarma\MisForPrabhatElectronics\App\Controllers\AuthenticationController;
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
    case "/service/index":
        include $page_path . "service/index.php";
        break;
    case "/service/create":
        include $page_path . "service/create.php";
        break;

    default:
        include $page_path . "error.php";
}
