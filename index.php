<!-- Front Controller -->
<?php
require __DIR__ . "/vendor/autoload.php";

use Dotenv\Dotenv;
use Sarma\MisForPrabhatElectronics\App\Controllers\AuthenticationController;
use Sarma\MisForPrabhatElectronics\App\Controllers\StockItemController;

$env = Dotenv::createImmutable(__DIR__);
$env->load();

$request = $_SERVER['REQUEST_URI'];

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
    case "/purchase":
        include $page_path . "purchase/index.php";
        break;
    case "/purchase/create":
        include $page_path . "purchase/create.php";
        break;
    case "/sale":
        include $page_path . "sales/index.php";
        break;
    case "/sale/create":
        include $page_path . "sales/create.php";
        break;
    case "/sale/save":
        // $saleController = new saleController();
        // $saleController->create();
        break;

    default:
        include $page_path . "error.php";
}
