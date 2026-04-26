<?php

use Sarma\MisForPrabhatElectronics\App\Controllers\SaleController;

$id = $_REQUEST['id'];
$saleController = new SaleController();
$sale = $saleController->get($id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="/assets/images/favicon.ico" type="image/x-icon">
</head>

<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/pages/include/aside.php" ?>
    </aside>

    <!-- Main Content -->
    <div class="main">

        <!-- Header -->
        <div class="header">
            <h1>Edit sale </h1>
            <span>Admin</span>
        </div>
        <div class="form-container">
            <form method="POST" action="/sales/edit">
                <input type="hidden" name="id" value="<?php echo $sale ? $sale['id'] : ''; ?>" />
                <input type="text" name="name" value="<?php echo $sale ? $sale['name'] : ''; ?>" />
                <input type="number" name="price" value="<?php echo $sale ? $sale['price'] : ''; ?>" />
                <input type="number" name="quantity" value="<?php echo $sale ? $sale['quantity'] : ''; ?>" />
                <input type="number" name="total_price" value="<?php echo $sale ? $sale['total_price'] : ''; ?>" />
                <input type="date" name="sale_date" value="<?php echo $sale ? $sale['sale_date'] : ''; ?>" />
                <button type="submit">Update</button>
            </form>
        </div>
    </div>
</body>

</html>