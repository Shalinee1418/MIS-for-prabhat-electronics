<?php

use Sarma\MisForPrabhatElectronics\App\Controllers\SaleController;

$saleController = new SaleController();
$sales = $saleController->getAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
    <link rel="stylesheet" href="/assets/css/style.css">
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
      <h1>Sales</h1>
      <span>Admin</span>
    </div>

    <!-- Cards -->
    <div class="cards">
      <div class="card">
        <h3>Total Sales</h3>
        <p></p>
      </div>
      <div class="card">
        <h3>Orders</h3>
        <p>
        </p>
      </div>
      <div class="card">
        <h3><a href="/sale/create" class="button">New Sale Item</a></h3>
        <p></p>
      </div>
      <div class="card">
        <h3><a href="/sale/edit" class="button">Edit Sale</a></h3>
        <p></p>
      </div>
    </div>

    <!-- Table -->
    <div class="table-container">
      <h3>Recent Sale Item</h3>
      <br>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Discount</th>
            <th>Invoice </th>
            <th>Tax Amount</th>
            <th>Unit Price</th>
            <th>Total Amount </th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($sales as $sale): ?>
            <tr>
              <td><?= $sale['sale_id'] ?? '' ?></td>
              <td><?= $sale['sale_date'] ?? '' ?></td>
              <td><?= $sale['discount'] ?? '' ?></td>
              <td><?= $sale['invoice_number'] ?? '' ?></td>
              <td><?= $sale['tax_amount'] ?? '' ?></td>
              <td><?= $sale['unit_price'] ?? '' ?></td>
              <td><?= $sale['total_amount'] ?? '' ?></td>
              <td><a href="/sale/view?id=<?= $sale['id'] ?? '' ?>">View</a></td>
            </tr>
          <?php endforeach; ?>
          </tr>
          <?php  ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>