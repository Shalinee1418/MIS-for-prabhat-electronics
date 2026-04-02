<!-- Front Controller -->
<?php
require __DIR__ . "/vendor/autoload.php";

use Sarma\MisForPrabhatElectronics\App\Controllers\AuthenticationController;

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
    default:
        include $page_path . "error.php";
}
