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
            <form method="POST" action="/sale/update">
                <input type="hidden" name="sale_id" value="<?php echo $sale ? $sale['sale_id'] : ''; ?>" />
                <label>Sale Date</label>
                <input type="date" name="sale_date" value="<?php echo $sale ? $sale['sale_date'] : ''; ?>" required />
                <label>Invoice Number</label>
                <input type="number" name="invoice_number" value="<?php echo $sale ? $sale['invoice_number'] : ''; ?>" required />
                <label>Discount</label>
                <input type="number" step="0.01" name="discount" value="<?php echo $sale ? $sale['discount'] : '0'; ?>" />
                <label>Tax Amount</label>
                <input type="number" step="0.01" name="tax_amount" value="<?php echo $sale ? $sale['tax_amount'] : '0'; ?>" />
                <label>Unit Price</label>
                <input type="number" step="0.01" name="unit_price" value="<?php echo $sale ? $sale['unit_price'] : '0'; ?>" required />
                <label>Total Amount</label>
                <input type="number" step="0.01" name="total_amount" value="<?php echo $sale ? $sale['total_amount'] : '0'; ?>" required />
                <button type="submit">Update</button>
            </form>
        </div>
    </div>
</body>

</html>