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

        <h1>Sale Items</h1>
        <a href="/sale/create" class="btn">Add Sale Item</a>
        <table>
            <thead>
                <tr>
                    <th>Sale Item ID</th>
                    <th>Sale ID</th>
                    <th>Product ID</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Sub Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $saleItem = new SaleItem();
                $saleItems = $saleItem->getaAll();
                foreach ($saleItems as $item) {
                    echo "<tr>";
                    echo "<td>" . $item['sale_item_id'] . "</td>";
                    echo "<td>" . $item['sale_id'] . "</td>";
                    echo "<td>" . $item['product_id'] . "</td>";
                    echo "<td>" . $item['quantity'] . "</td>";
                    echo "<td>" . $item['price'] . "</td>";
                    echo "<td>" . $item['subtotal'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <?php

use Sarma\MisForPrabhatElectronics\App\Models\SaleItem;

$saleItem = new SaleItem();
$saleItems = $saleItem->getAll();

?>

<tbody>

<?php if (empty($saleItems)): ?>

<tr>
    <td colspan="6">No sale items found.</td>
</tr>

<?php else: ?>

<?php foreach ($saleItems as $item): ?>

<tr>
    <td><?= htmlspecialchars($item['sale_item_id']) ?></td>
    <td><?= htmlspecialchars($item['sale_id']) ?></td>
    <td><?= htmlspecialchars($item['product_id']) ?></td>
    <td><?= htmlspecialchars($item['quantity']) ?></td>
    <td><?= number_format($item['price'], 2) ?></td>
    <td><?= number_format($item['subtotal'], 2) ?></td>
</tr>

<?php endforeach; ?>

<?php endif; ?>

</tbody>