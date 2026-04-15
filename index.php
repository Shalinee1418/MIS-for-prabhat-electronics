<!-- Front Controller -->
<?php
require __DIR__ . "/vendor/autoload.php";

use Sarma\MisForPrabhatElectronics\App\Controllers\AuthenticationController;
use Sarma\MisForPrabhatElectronics\App\Controllers\StockItemController;

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
    default:
        include $page_path . "error.php";
}
